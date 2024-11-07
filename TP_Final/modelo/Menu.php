<?php

class Menu{
    private $idmenu;
    private $menombre;
    private $medescripcion;
    private $idpadre;
    private $medeshabilitado;
    private $mensajeoperacion;

    public function __construct(){
        $this->idmenu="";
        $this->menombre="";
        $this->medescripcion="";
        $this->idpadre="";
        $this->medeshabilitado="";
        $this->mensajeoperacion="";
    }

    public function setear($idmenu, $menombre, $medescripcion, $idpadre, $medeshabilitado){
        $this->setidmenu($idmenu);
        $this->setmenombre($menombre);
        $this->setmedescripcion($medescripcion);
        $this->setidpadre($idpadre);
        $this->setmedeshabilitado($medeshabilitado);
    }

    //metodos de acceso

    public function getidmenu(){
        return $this->idmenu;
    }
    public function setidmenu($param){
        $this->idmenu=$param;
    }

    public function getmenombre(){
        return $this->menombre;
    }
    public function setmenombre($param){
        $this->menombre=$param;
    }

    public function getmedescripcion(){
        return $this->medescripcion;
    }
    public function setmedescripcion($param){
        $this->medescripcion=$param;
    }

    public function getidpadre(){
        return $this->idpadre;
    }
    public function setidpadre($param){
        $this->idpadre=$param;
    }

    public function getmedeshabilitado(){
        return $this->medeshabilitado;
    }
    public function setmedeshabilitado($param){
        $this->medeshabilitado=$param;
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
        $sql="SELECT * FROM menu WHERE idmenu = ".$this->getidmenu();
        if($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    $this->setear($row['idmenu'], $row['menombre'], $row['medescripcion'], $row['idpadre'], $row['medeshabilitado']);
                    $resp=true;//se setea la resp como true para demostrar que la carga fue exitosa
                }
            }
        }else{
            $this->setmensajeoperacion("menu->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base = new BaseDatosPDO();
        $sql="INSERT INTO menu (menombre, medescripcion, idpadre, medeshabilitado)
                VALUES ('".$this->getmenombre()."', '".$this->getmedescripcion()."', '".$this->getidpadre()."', '".$this->getmedeshabilitado()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("menu->insertar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("menu->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="UPDATE menu SET
            menombre='".$this->getmenombre()."', medescripcion='".$this->getmedescripcion()."', idpadre='".$this->getidpadre()."', medeshabilitado='".$this->getmedeshabilitado()."' WHERE idmenu='".$this->getidmenu()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("menu->modificar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("menu->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM menu WHERE idmenu=".$this->getidmenu();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("menu->eliminar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("menu->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo=array();
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM menu ";
        if($parametro!=""){
            $sql.='WHERE '.$parametro;
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Usuario();
                    $obj->setear( $row['idmenu'], $row['menombre'], $row['medescripcion'], $row['idpadre'], $row['medeshabilitado']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setmensajeoperacion("menu->listar: ".$base->getError());
        }
        return $arreglo;
    }
}