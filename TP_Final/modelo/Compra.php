<?php

class Compra{
    private $idcompra;
    private $cofecha;
    private $idusuario;
    private $mensajeoperacion;

    public function __construct(){
        $this->idCompra="";
        $this->cofecha="";
        $this->idUsuario="";
        $this->mensajeoperacion="";
    }

    public function setear($idcompra, $cofecha, $idusuario){
        $this->setidcompra($idcompra);
        $this->setcofecha($cofecha);
        $this->setidusuario($idusuario);
    }

    //metodos de acceso

    public function getidcompra(){
        return $this->idcompra;
    }
    public function setidcompra($param){
        $this->idcompra=$param;
    }

    public function getcofecha(){
        return $this->cofecha;
    }
    public function setcofecha($param){
        $this->cofecha=$param;
    }

    public function getidusuario(){
        return $this->idusuario;
    }
    public function setidusuario($param){
        $this->idusuario=$param;
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
        $sql="SELECT * FROM compra WHERE idcompra = ".$this->getidcompra();
        if($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    $this->setear($row['idcompra'], $row['cofecha'], $row['idusuario']);
                    $resp=true;
                }
            }
        }else{
            $this->setmensajeoperacion("compra->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="INSERT INTO compras(cofecha, idusuario)
                VALUES ('".$this->getcofecha()."', '".$this->getidusuario()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("compra->insertar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("compra->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM compra WHERE idcompra=".$this->getidcompra();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("compra->eliminar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("compra->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo=array();
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM compra ";
        if($parametro!=""){
            $sql.="WHERE ".$parametro;
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Compra();
                    $obj->setear($row['idcompra'], $row['cofecha'], $row['idusuario']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setmensajeoperacion("compra->listar ".$base->getError());
        }
        return $arreglo;
    }
}