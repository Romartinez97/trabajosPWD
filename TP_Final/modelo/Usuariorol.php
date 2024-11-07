<?php

class Usuariorol{
    private $idusuario;
    private $idrol;
    private $mensajeoperacion;

    public function __construct(){
        $this->idusuario="";
        $this->idrol="";
        $this->mensajeoperacion="";
    }

    public function setear($idusuario, $idrol){
        $this->setidusuario($idusuario);
        $this->setidrol($idrol);
    }

    //metodos de acceso

    public function getidusuario(){
        return $this->idusuario;
    }
    public function setidusuario($param){
        $this->idusuario=$param;
    }

    public function getidrol(){
        return $this->idrol;
    }
    public function setidrol($param){
        $this->idrol=$param;
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
        $sql="SELECT * FROM usuariorol WHERE idusuario = ".$this->getidusuario()." AND idrol =".$this->getidrol();
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
            $this->setmensajeoperacion("usuariorol->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base = new BaseDatosPDO();
        $sql="INSERT INTO usuariorol (idusuario, idrol)
                VALUES ('".$this->getidusuario()."', '".$this->getidrol()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("usuariorol->insertar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("usuariorol->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="UPDATE usuariorol SET
            idusuario='".$this->getidusuario()."', idrol='".$this->getidrol()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("usuariorol->modificar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("usuariorol->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM usuariorol WHERE idusuario=".$this->getidusuario()." AND idrol=".$this->getidrol();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("usuariorol->eliminar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("usuariorol->eliminar: ".$base->getError());
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
            $this->setmensajeoperacion("usuariorol->listar: ".$base->getError());
        }
        return $arreglo;
    }
}