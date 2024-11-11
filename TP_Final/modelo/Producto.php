<?php

class Producto{
    private $idproducto;
    private $pronombre;
    private $prodetalle;
    private $procantstock;
    private $mensajeoperacion;

    public function __construct(){
        $this->idproducto="";
        $this->pronombre="";
        $this->prodetalle="";
        $this->procantstock="";
        $this->mensajeoperacion="";
    }

    public function setear($idproducto, $pronombre, $prodetalle, $procantstock){
        $this->setidproducto($idproducto);
        $this->setpronombre($pronombre);
        $this->setprodetalle($prodetalle);
        $this->setprocantstock($procantstock);
    }

    //metodos de acceso

    public function getidproducto(){
        return $this->idproducto;
    }
    public function setidproducto($param){
        $this->idproducto=$param;
    }

    public function getpronombre(){
        return $this->pronombre;
    }
    public function setpronombre($param){
        $this->pronombre=$param;
    }

    public function getprodetalle(){
        return $this->prodetalle;
    }
    public function setprodetalle($param){
        $this->prodetalle=$param;
    }

    public function getprocantstock(){
        return $this->procantstock;
    }
    public function setprocantstock($param){
        $this->procantstock=$param;
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
        $sql="SELECT * FROM producto WHERE idproducto = ".$this->getidproducto();
        if($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    $this->setear($row['idproducto'], $row['pronombre'], $row['prodetalle'], $row['procantstock']);
                    $resp=true;//se setea la resp como true para demostrar que la carga fue exitosa
                }
            }
        }else{
            $this->setmensajeoperacion("producto->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base = new BaseDatosPDO();
        $sql="INSERT INTO producto (pronombre, prodetalle, procantstock)
                VALUES ('".$this->getpronombre()."', '".$this->getprodetalle()."', '".$this->getprocantstock()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("producto->insertar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("producto->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="UPDATE producto SET
            pronombre='".$this->getpronombre()."', prodetalle='".$this->getprodetalle()."', procantstock='".$this->getprocantstock()."' WHERE idproducto='".$this->getidproducto()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("producto->modificar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("producto->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM producto WHERE idproducto=".$this->getidproducto();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("producto->eliminar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("producto->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo=array();
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM producto ";
        if($parametro!=""){
            $sql.='WHERE '.$parametro;
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Producto();
                    $obj->setear( $row['idproducto'], $row['pronombre'], $row['prodetalle'], $row['procantstock']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setmensajeoperacion("producto->listar: ".$base->getError());
        }
        return $arreglo;
    }
}