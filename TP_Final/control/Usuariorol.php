<?php

class Usuariorol{
    private $idUsuario;
    private $idRol;
    private $mensajeOperacion;

    public function __construct(){
        $this->idUsuario="";
        $this->idRol="";
        $this->mensajeOperacion="";
    }

    public function setear($idUsuario, $idRol){
        $this->setIdUsuario($idUsuario);
        $this->setIdRol($idRol);
    }

    //metodos de acceso

    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($param){
        $this->idUsuario=$param;
    }

    public function getIdRol(){
        return $this->idRol;
    }
    public function setIdRol($param){
        $this->idRol=$param;
    }

    public function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }
    public function setMensajeOperacion($param){
        $this->mensajeOperacion=$param;
    }

    public function cargar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM usuariorol WHERE idusuario = ".$this->getIdUsuario()." AND idrol =".$this->getIdRol();
        if($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    $this->setear($row['idusuario'], $row['idrol']);
                    $resp=true;//se setea la resp como true para demostrar que la carga fue exitosa
                }
            }
        }else{
            $this->setMensajeOperacion("usuariorol->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base = new BaseDatosPDO();
        $sql="INSERT INTO usuariorol (idusuario, idrol)
                VALUES ('".$this->getIdUsuario()."', '".$this->getIdRol()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setMensajeOperacion("usuariorol->insertar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("usuariorol->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="UPDATE usuariorol SET
            idusuario='".$this->getIdUsuario()."', idrol='".$this->getIdRol()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setMensajeOperacion("usuariorol->modificar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("usuariorol->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM usuariorol WHERE idusuario=".$this->getIdUsuario()." AND idrol=".$this->getIdRol();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setMensajeOperacion("usuariorol->eliminar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("usuariorol->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo=array();
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM usuariorol ";
        if($parametro!=""){
            $sql.='WHERE '.$parametro;
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Usuariorol();
                    $obj->setear( $row['idusuario'], $row['idrol']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setMensajeOperacion("usuariorol->listar: ".$base->getError());
        }
        return $arreglo;
    }
}