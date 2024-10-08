<?php

class Persona{
    //private $idPersona;
    private $nroDni;
    private $apellido;
    private $nombre;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $colAutos;
    private $mensajeOperacion;

    public function __construct(){
        //$this->idPersona="";
        $this->nroDni="";
        $this->apellido="";
        $this->nombre="";
        $this->fechaNac="";
        $this->telefono="";
        $this->domicilio="";
        $this->colAutos=[];
        $this->mensajeOperacion="";
    }

    public function setear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio, $colAutos){
        //$this->setId($id);
        $this->setNroDni($nroDni);
        $this->setApellido($apellido);
        $this->setNombre($nombre);
        $this->setFechaNac($fechaNac);
        $this->setTelefono($telefono);
        $this->setDomicilio($domicilio);
        $this->setColAutos($colAutos);
    }

    //metodos de acceso

    //public function getId(){
    //    return $this->idPersona;
    //}
    //public function setId($id){
    //    $this->idPersona=$id;
    //}

    public function getNroDni(){
        return $this->nroDni;
    }
    public function setNroDni($nroDni){
        $this->nroDni=$nroDni;
    }

    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function getFechaNac(){
        return $this->fechaNac;
    }
    public function setFechaNac($fechaNac){
        $this->fechaNac=$fechaNac;
    }

    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }

    public function getDomicilio(){
        return $this->domicilio;
    }
    public function setDomicilio($domicilio){
        $this->domicilio=$domicilio;
    }

    public function getColAutos(){
        return $this->colAutos;
    }
    public function setColAutos($newColAutos){
        $this->colAutos=$newColAutos;
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
        $sql="SELECT * FROM persona WHERE nroDni = ".$this->getNroDni();
        if ($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    $this->setear($row['nroDni'], $row['apellido'], $row['nombre'], $row['fechaNac'], $row['telefono'], $row['domicilio'], "");
                    $resp=true;//se setea la resp como true para demostrar que la carga fue exitosa
                }
            }
        }else{
            $this->setMensajeOperacion("persona->listar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base = new BaseDatosPDO();
        $sql="INSERT INTO persona (nroDni, apellido, nombre, fechaNac, telefono, domicilio)
                VALUES ('".$this->getNroDni()."', '".$this->getApellido()."', '".$this->getNombre()."', '".$this->getFechaNac()."', '".$this->getTelefono()."', '".$this->getDomicilio()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                //$this->setId($elid);
                $resp=true;
            }else{
                $this->setMensajeOperacion("persona->insertar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("persona->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="UPDATE persona SET
            nroDni='".$this->getNroDni()."', apellido='".$this->getApellido()."', nombre='".$this->getNombre()."', fechaNac='".$this->getFechaNac()."', telefono='".$this->getTelefono()."', domicilio='".$this->getDomicilio()."' WHERE nroDni='".$this->getNroDni()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setMensajeOperacion("persona->modificar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("persona->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM persona WHERE nroDni=".$this->getNroDni();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setMensajeOperacion("persona->eliminar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("persona->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo=array();
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM persona ";
        if($parametro!=""){
            $sql.='WHERE '.$parametro;
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Persona();
                    $objAuto=new Auto();
                    $autosPersona = $objAuto->listar("dniDuenio =".$row['nroDni']);
                    $obj->setear( $row['nroDni'], $row['apellido'], $row['nombre'], $row['fechaNac'], $row['telefono'], $row['domicilio'], $autosPersona);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setMensajeOperacion("persona->listar: ".$base->getError());
        }
        return $arreglo;
    }
}
?>