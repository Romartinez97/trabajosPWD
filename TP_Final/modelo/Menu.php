<?php

class Menu{
    private $idmenu;
    private $menombre;
    private $medescripcion;
    private $objmenu; // ($idpadre)
    private $medeshabilitado;
    private $mensajeoperacion;

    public function __construct(){
        $this->idmenu="";
        $this->menombre="";
        $this->medescripcion="";
        $this->objmenu=null;
        $this->medeshabilitado=null;
        $this->mensajeoperacion="";
    }

    public function setear($idmenu, $menombre, $medescripcion, $objmenu, $medeshabilitado){
        $this->setidmenu($idmenu);
        $this->setmenombre($menombre);
        $this->setmedescripcion($medescripcion);
        $this->setobjmenu($objmenu);
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

    public function getobjmenu(){
        return $this->objmenu;
    }
    public function setobjmenu($param){
        $this->objmenu=$param;
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
                    $objmenupadre=null;
                    if($row['idpadre']!=null || $row['idpadre']!=''){
                        $objmenupadre=new Menu();
                        $objmenupadre->setidmenu($row['idpadre']);
                        $objmenupadre->cargar();
                    }
                    $this->setear($row['idmenu'], $row['menombre'], $row['medescripcion'], $objmenupadre, $row['medeshabilitado']);
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
                VALUES ('".$this->getmenombre()."', '".$this->getmedescripcion()."', '".$this->getmedeshabilitado()."', ";
        if($this->getobjmenu()!= null){
            $sql.=$this->getobjmenu()->getidmenu().", ";
        }else{
            $sql.="null, ";
        }
        if($this->getmedeshabilitado()!=null){
            $sql.="'".$this->getmedeshabilitado()."');";
        }else{
            $sql.="null);";
        }
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
            menombre='".$this->getmenombre()."', medescripcion='".$this->getmedescripcion()."', ";
        if($this->getobjmenu()!=null){
            $sql.="idpadre= ".$this->getobjmenu()->getidmenu().", ";
        }else{
            $sql.="idpadre= null, ";
        }
        if($this->getmedeshabilitado()!=null){
            $sql.="medeshabilitado='".$this->getmedeshabilitado()."'";
        }else{
            $sql.="medeshabilitado= null";
        }
        $sql.=" WHERE idmenu= ".$this->getidmenu();
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
                    $obj=new Menu();
                    $objmenupadre=null;
                    if($row['idpadre']!=null){
                        $objmenupadre=new Menu();
                        $objmenupadre->setidmenu($row['idpadre']);
                        $objmenupadre->cargar();
                    }
                    $obj->setear( $row['idmenu'], $row['menombre'], $row['medescripcion'], $objmenupadre, $row['medeshabilitado']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setmensajeoperacion("menu->listar: ".$base->getError());
        }
        return $arreglo;
    }
}