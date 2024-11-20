<?php

class Compraitem{
    private $idcompraitem;
    private $objproducto;
    private $objcompra;
    private $cicantidad;
    private $mensajeoperacion;

    public function __construct(){
        $this->idcompraitem="";
        $this->objproducto=null;
        $this->objcompra=null;
        $this->cicantidad="";
        $this->mensajeoperacion="";
    }

    public function setear($idcompraitem, $objproducto, $objcompra, $cicantidad){
        $this->setidcompraitem($idcompraitem);
        $this->setobjproducto($objproducto);
        $this->setobjcompra($objcompra);
        $this->setcicantidad($cicantidad);
    }

    //metodos de acceso

    public function getidcompraitem(){
        return $this->idcompraitem;
    }
    public function setidcompraitem($param){
        $this->idcompraitem=$param;
    }

    public function getobjproducto(){
        return $this->objproducto;
    }
    public function setobjproducto($param){
        $this->objproducto=$param;
    }

    public function getobjcompra(){
        return $this->objcompra;
    }
    public function setobjcompra($param){
        $this->objcompra=$param;
    }

    public function getcicantidad(){
        return $this->cicantidad;
    }
    public function setcicantidad($param){
        $this->cicantidad=$param;
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
        $sql="SELECT * FROM compraitem WHERE idcompraitem = ".$this->getidcompraitem();
        if($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    //--
                    $objproducto=new Producto();
                    $objproducto->setidproducto($row['idproducto']);
                    $objproducto->cargar();
                    //--
                    $objcompra=new Compra();
                    $objcompra->setidcompra($row['idcompra']);
                    $objcompra->cargar();
                    //--
                    $this->setear($row['idcompraitem'], $objproducto, $objcompra, $row['cicantidad']);
                    $resp=true;//se setea la resp como true para demostrar que la carga fue exitosa
                }
            }
        }else{
            $this->setmensajeoperacion("compraitem->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base = new BaseDatosPDO();
        $sql="INSERT INTO compraitem (idcompraitem, idproducto, idcompra, cicantidad)
                VALUES ('".$this->getidcompraitem()."', '".$this->getobjproducto()->getidproducto()."', '".$this->getobjcompra()->getidcompra()."', '".$this->getcicantidad()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("compraitem->insertar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("compraitem->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="UPDATE compraitem SET
            idproducto='".$this->getobjproducto()."', idcompra='".$this->getobjcompra()."', cicantidad='".$this->getcicantidad()."' WHERE idcompraitem='".$this->getidcompraitem()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("compraitem->modificar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("compraitem->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM compraitem WHERE idcompraitem=".$this->getidcompraitem();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("compraitem->eliminar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("compraitem->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo=array();
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM compraitem ";
        if($parametro!=""){
            $sql.='WHERE '.$parametro;
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Compraitem();
                    //--
                    $objproducto=new Producto();
                    $objproducto->setidproducto($row['idproducto']);
                    $objproducto->cargar();
                    //--
                    $objcompra=new Compra();
                    $objcompra->setidcompra($row['idcompra']);
                    $objcompra->cargar();
                    //--
                    $obj->setear( $row['idcompraitem'], $objproducto, $objcompra, $row['cicantidad']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setmensajeoperacion("compraitem->listar: ".$base->getError());
        }
        return $arreglo;
    }
}