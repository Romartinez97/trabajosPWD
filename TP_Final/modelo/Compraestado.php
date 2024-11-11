<?php

class Compraestado{
    private $idcompraestado;
    private $objcompra;
    private $objcompraestadotipo;
    private $cefechaini;
    private $cefechafin;
    private $mensajeoperacion;

    public function __construct(){
        $this->idcompraestado="";
        $this->objcompra=null;
        $this->objcompraestadotipo=null;
        $this->cefechaini=null;
        $this->cefechafin=null;
        $this->mensajeoperacion="";
    }

    public function setear($idcompraestado, $objcompra, $objcompraestadotipo, $cefechaini, $cefechafin){
        $this->setidcompraestado($idcompraestado);
        $this->setobjcompra($objcompra);
        $this->setobjcompraestadotipo($objcompraestadotipo);
        $this->setcefechaini($cefechaini);
        $this->setcefechafin($cefechafin);
    }

    //metodos de acceso

    public function getidcompraestado(){
        return $this->idcompraestado;
    }
    public function setidcompraestado($param){
        $this->idcompraestado=$param;
    }

    public function getobjcompra(){
        return $this->objcompra;
    }
    public function setobjcompra($param){
        $this->objcompra=$param;
    }

    public function getobjcompraestadotipo(){
        return $this->objcompraestadotipo;
    }
    public function setobjcompraestadotipo($param){
        $this->objcompraestadotipo=$param;
    }

    public function getcefechaini(){
        return $this->cefechaini;
    }
    public function setcefechaini($param){
        $this->cefechaini=$param;
    }

    public function getcefechafin(){
        return $this->cefechafin;
    }
    public function setcefechafin($param){
        $this->cefechafin=$param;
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
        $sql="SELECT * FROM compraestado WHERE idcompraestado = ".$this->getidcompraestado();
        if($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    //--
                    $objcompra=new Compra();
                    $objcompra->setidcompra($row['idcompra']);
                    $objcompra->cargar();
                    //--
                    $objcet=new Compraestadotipo();
                    $objcet->setidcompraestadotipo($row['idcompraestadotipo']);
                    $objcet->cargar();
                    //--
                    $this->setear($row['idcompraestado'], $objcompra, $objcet, $row['cefechaini'], $row['cefechafin']);
                    $resp=true;//se setea la resp como true para demostrar que la carga fue exitosa
                }
            }
        }else{
            $this->setmensajeoperacion("compraestado->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base = new BaseDatosPDO();
        $sql="INSERT INTO compraestado (idcompra, idcompraestadotipo, cefechaini, cefechafin)
                VALUES ('".$this->getobjcompra()->getidcompra()."', '".$this->getobjcompraestadotipo()->getidcompraestadotipo()."', '".$this->getcefechaini()."', '".$this->getcefechafin()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("compraestado->insertar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("compraestado->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="UPDATE compraestado SET
            idcompra='".$this->getobjcompra()->getidcompra()."', idcompraestadotipo='".$this->getobjcompraestadotipo()->getidcompraestadotipo()."', '".$this->getcefechaini()."', '".$this->getcefechafin()."' WHERE idcompraestado='".$this->getidcompraestado()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("compraestado->modificar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("compraestado->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM compraestado WHERE idcompraestado=".$this->getidcompraestado();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("compraestado->eliminar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("compraestado->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo=array();
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM compraestado ";
        if($parametro!=""){
            $sql.='WHERE '.$parametro;
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Compraestado();
                    //--
                    $objcompra=new Compra();
                    $objcompra->setidcompra($row['idcompra']);
                    $objcompra->cargar();
                    //--
                    $objcet=new Compraestadotipo();
                    $objcet->setidcompraestadotipo($row['idcompraestadotipo']);
                    $objcet->cargar();
                    //--
                    $obj->setear( $row['idcompraestado'], $objcompra, $objcet, $row['cefechaini'], $row['cefechafin']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setmensajeoperacion("compraestado->listar: ".$base->getError());
        }
        return $arreglo;
    }
}