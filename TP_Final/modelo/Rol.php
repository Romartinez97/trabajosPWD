<?php

class Rol{
    private $idrol;
    private $rodescripcion;
    private $mensajeoperacion;

    public function __construct(){
        $this->idrol="";
        $this->rodescripcion="";
        $this->mensajeoperacion="";
    }

    public function setear($idrol, $rodescripcion){
        $this->setidrol($idrol);
        $this->setrodescripcion($rodescripcion);
    }

    //metodos de acceso

    public function getIdRol(){
        return $this->idrol;
    }
    public function setidrol($param){
        $this->idrol=$param;
    }

    public function getrodescripcion(){
        return $this->rodescripcion;
    }
    public function setrodescripcion($param){
        $this->rodescripcion=$param;
    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
    }
    public function setmensajeoperacion($param){
        $this->mensajeoperacion=$param;
    }

    public function cargar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM rol WHERE idrol = ".$this->getidrol();
        if($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    $this->setear($row['idrol'], $row['rodescripcion']);
                    $resp=true;//se setea la resp como true para demostrar que la carga fue exitosa
                }
            }
        }else{
            $this->setmensajeoperacion("rol->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base = new BaseDatosPDO();
        $sql="INSERT INTO rol (idrol, rodescripcion)
                VALUES ('".$this->getidrol()."', '".$this->getrodescripcion()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("rol->insertar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("rol->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="UPDATE rol SET
            rodescripcion='".$this->getrodescripcion()."' WHERE idrol='".$this->getidrol()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("rol->modificar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("rol->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM rol WHERE idrol=".$this->getidrol();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("rol->eliminar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("rol->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo=array();
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM rol ";
        if($parametro!=""){
            $sql.='WHERE '.$parametro;
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Rol();
                    $obj->setear( $row['idrol'], $row['rodescripcion']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setmensajeoperacion("rol->listar: ".$base->getError());
        }
        return $arreglo;
    }
}