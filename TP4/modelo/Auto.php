<?php

class Auto{
    private $idAuto;
    private $patente;
    private $marca;
    private $modelo;
    private $objPersona;
    private $mensajeOperacion;

    public function __construct(){
        $this->idAuto="";
        $this->patente="";
        $this->marca="";
        $this->modelo="";
        $this->objPersona="";
        $this->mensajeOperacion="";
    }

    public function setear($id, $patente, $marca, $modelo, $objPersona){
        $this->setId($id);
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setmodelo($modelo);
        $this->setObjPersona($objPersona);
    }

    //metodos de acceso

    public function getId(){
        return $this->idAuto;
    }
    public function setId($id){
        $this->idAuto=$id;
    }

    public function getPatente(){
        return $this->patente;
    }
    public function setPatente($patente){
        $this->patente=$patente;
    }

    public function getMarca(){
        return $this->marca;
    }
    public function setMarca($marca){
        $this->marca=$marca;
    }

    public function getModelo(){
        return $this->modelo;
    }
    public function setModelo($modelo){
        $this->modelo=$modelo;
    }

    public function getObjPersona(){
        return $this->objPersona;
    }
    public function setObjPersona($objPersona){
        $this->objPersona=$objPersona;
    }

    public function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }
    public function setMensajeOperacion($mensajeOperacion){
        $this->mensajeOperacion=$mensajeOperacion;
    }

    public function cargar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM auto WHERE id = ".$this->getId();
        if ($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    $this->setear($row['id'], $row['patente'], $row['marca'], $row['modelo'], $row['dniDuenio']);
                    $resp=true;//se setea la resp como true para demostrar que la carga fue exitosa
                }
            }
        }else{
            $this->setMensajeOperacion("auto->listar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base = new BaseDatosPDO();
        $sql="INSERT INTO auto (patente, marca, modelo, dniDuenio)
                VALUES ('".$this->getPatente()."', '".$this->getMarca()."', '".$this->getModelo()."', '".$this->getObjPersona()."')";
        if($base->Iniciar()){
            if($elid=$base->Ejecutar($sql)){
                $this->setId($elid);
                $resp=true;
            }else{
                $this->setMensajeOperacion("auto->insertar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("auto->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="UPDATE auto SET
            patente='".$this->getPatente()."', marca='".$this->getMarca()."', modelo='".$this->getModelo()."', dniDuenio='".$this->getObjPersona();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setMensajeOperacion("auto->modificar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("auto->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM auto WHERE id=".$this->getId();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setMensajeOperacion("auto->eliminar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("auto->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo=array();
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM auto ";
        if($parametro!=""){
            $sql.='WHERE '.$parametro;
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Auto();
                    $obj->setear($row['id'], $row['patente'], $row['marca'], $row['modelo'], $row['dniDuenio']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setMensajeOperacion("auto->listar: ".$base->getError());
        }
        return $arreglo;
    }
}
?>