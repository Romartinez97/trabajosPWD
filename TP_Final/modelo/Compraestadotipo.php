<?php

class Compraestadotipo{
    private $idcompraestadotipo;
    private $cetdescripcion;
    private $cetdetalle;
    private $mensajeoperacion;

    public function __construct(){
        $this->idcompraestadotipo="";
        $this->cetdescripcion="";
        $this->cetdetalle="";
        $this->mensajeoperacion="";
    }

    public function setear($idcompraestadotipo, $cetdescripcion, $cetdetalle){
        $this->setidcompraestadotipo($idcompraestadotipo);
        $this->setcetdescripcion($cetdescripcion);
        $this->setcetdetalle($cetdetalle);
    }

    //metodos de acceso

    public function getidcompraestadotipo(){
        return $this->idcompraestadotipo;
    }
    public function setidcompraestadotipo($param){
        $this->idcompraestadotipo=$param;
    }

    public function getcetdescripcion(){
        return $this->cetdescripcion;
    }
    public function setcetdescripcion($param){
        $this->cetdescripcion=$param;
    }

    public function getcetdetalle(){
        return $this->cetdetalle;
    }
    public function setcetdetalle($param){
        $this->cetdetalle=$param;
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
        $sql="SELECT * FROM compraestadotipo WHERE idcompraestadotipo = ".$this->getidcompraestadotipo();
        if($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    $this->setear($row['idcompraestadotipo'], $row['cetdescripcion'], $row['cetdetalle']);
                    $resp=true;//se setea la resp como true para demostrar que la carga fue exitosa
                }
            }
        }else{
            $this->setmensajeoperacion("compraestadotipo->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base = new BaseDatosPDO();
        $sql="INSERT INTO compraestadotipo (idcompraestadotipo, cetdescripcion, cetdetalle)
                VALUES ('".$this->getidcompraestadotipo()."', '".$this->getcetdescripcion()."', '".$this->getcetdetalle()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("compraestadotipo->insertar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("compraestadotipo->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="UPDATE compraestadotipo SET
            cetdescripcion='".$this->getcetdescripcion()."', cetdetalle='".$this->getcetdetalle()."' WHERE idcompraestadotipo='".$this->getidcompraestadotipo()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("compraestadotipo->modificar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("compraestadotipo->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM compraestadotipo WHERE idcompraestadotipo=".$this->getidcompraestadotipo();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("compraestadotipo->eliminar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("compraestadotipo->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo=array();
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM compraestadotipo ";
        if($parametro!=""){
            $sql.='WHERE '.$parametro;
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Compraestadotipo();
                    $obj->setear( $row['idcompraestadotipo'], $row['cetdescripcion'], $row['cetdetalle']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setmensajeoperacion("compraestadotipo->listar: ".$base->getError());
        }
        return $arreglo;
    }
}