<?php

class BaseDatosPDO extends PDO{

    private $engine; //motor de la Base de Datos
    private $host; //servidor de la Base de Datos
    private $database; //nombre de la Base de Datos
    private $user; //usuario con el que nos conectaremos
    private $pass; //clave del usuario
    private $debug; //valor booleano que indicara si queremos que nos muestre las consultas o no
    
    //-----------
    private $error;
    private $sql;
    //-----------
    private $conec;
    private $indice;
    private $resultado;

    /**
     * Constructor de la clase que inicia las variables instancias de la clase
     * vinculadas a la coneccion con el Servidor de BD
     */
    public function __construct(){
        $this->engine = "mysql";
        $this->host = "localhost";
        $this->database = "infoautos";
        $this->user = "root";
        $this->pass = "";
        $this->debug = true;
        $this->error = "";
        $this->sql = "";
        $this->indice =0;

        $dns = $this->engine.":dbname=".$this->database.";host=".$this->host;
        try{
            parent::__construct($dns, $this->user, $this->pass, /*array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8")*/);
            $this->conec=true;
        }catch(PDOException $e){
            $this->sql = $e->getMessage();
            $this->conec=false;
        }
    }
    /**
     * Inicia la coneccion con el Servidor y la Base Datos MySQL.
     * Retorna true si la coneccion con el servidor se pudo establecer y false en caos contrario
     * 
     * @return boolean
     */
    public function Iniciar(){
        return $this->getConec();
    }


    public function getConec(){
        return $this->conec;
    }

    public function setDebug($debug){
        $this->debug=$debug;
    }

    public function getDebug(){
        return $this->debug;
    }

    private function setIndice($indice){
        $this->indice = $indice;
    }

    private function getIndice(){
        return $this->indice;
    }

    private function setResultado($resultado){
        $this->resultado=$resultado;
    }
    
    private function getResultado(){
        return $this->resultado;
    }
    /**
     * Funcion que setea la variable instancia error
     * @param mixed $e
     * @return void
     */
    public function setError($e){
        $this->error=$e;
    }

    /**
     * Funcion que retorna una cadena con descripcion del ultimo error seteado
     * @return string
     */
    public function getError(){
        return "\n".$this->error;
    }

    /**
     * Funcion que setea la variable instancia sql
     * @param mixed $e
     * @return void
     */
    public function setSQL($e){
        $this->sql=$e;
    }

    /**
     * Funcion que retorna uan cadena con el ultimo sql seteado
     * @return string
     */
    public function getSQL(){
        return "\n".$this->sql;
    }


    public function Ejecutar($sql){
        $this->setError("");
        $this->setSQL($sql);
        if(stristr($sql, "insert")){ // se desea INSERT ?
            $resp = $this->EjecutarInsert($sql);
        }
        // se desea UPDATE o DELETE ?
        if(stristr($sql, "update")|| stristr($sql, "delete")){
            $resp = $this->EjecutarDeleteUpdate($sql);
        }
        // se desea ejecutar un select
        if(stristr($sql, "select")){
            $resp = $this->EjecutarSelect($sql);
        }
        return $resp;
    }

    /**
     * Si se inserta en una tabla que tiene una columna autoincrement
     * se retorna el id con el que se inserto el registro
     * en caso contrario se retorna -1
     * @param mixed $sql
     * @return bool|int|string
     */
    private function EjecutarInsert($sql){
        $resultado=parent::query($sql);
        if(!$resultado){
            $this->analizarDebug();
            $id=0;
        }else{
            $id=$this->lastInsertId();
            if($id==0){
                $id=-1;
            }
        }
        return $id;
    }

    /**
     * Decuelve la cantidad de filas afectadas por la ejecucion SQL.
     * Si el valor es < 0 no se pudo realizar la operacion
     * @param mixed $sql
     * @return int
     */
    private function EjecutarDeleteUpdate($sql){
        $cantFilas =-1;
        $resultado=parent::query($sql);
        if(!$resultado){
            $this->analizarDebug();
        }else{
            $cantFilas=$resultado->rowCount();
        }
        return $cantFilas;
    }

    /**
     * Retorna cada uno de los registros de uan consulta select
     * @param mixed $sql
     * @return int
     */
    private function EjecutarSelect($sql){
        $cant = -1;
        $resultado=parent::query($sql);
        if(!$resultado){
            $this->analizarDebug();
        }else{
            $arregloResult=$resultado->fetchAll();
            $cant = count($arregloResult);
            $this->setIndice(0);
            $this->setResultado($arregloResult);
        }
        /*
        echo "<br>La cantidad es ".$cant;
        */
        return $cant;
    }

    /**
     * Devuelve un registro retornado por la ejecucion de una consulta
     * el puntero de desplaza al siguiente registro de la consulta
     * @return mixed
     */
    public function Registro(){
        $filaActual=false;
        $indiceActual=$this->getIndice();
        if($indiceActual>=0){
            $filas=$this->getResultado();
            if($indiceActual<count($filas)){
                $filaActual=$filas[$indiceActual];
                $indiceActual++;
                $this->setIndice($indiceActual);
            }else{
                $this->setIndice(-1);
            }
        }
        /*
        echo "<br>El valor de la fila actual es: ";
        print_r($filaActual);
        */
        return $filaActual;
    }

    /**
     * Esta funcion si esta seteado la variable instancia $this->debug
     * visualiza el debug
     * @return void
     */
    private function analizarDebug(){
        $e=$this->errorInfo();
        $this->setError($e);
        if($this->getDebug()){
            echo "<pre>";
            print_r($e);
            echo "<pre>";
        }
    }
}