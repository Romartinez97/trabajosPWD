<?php

class Menurol{
    private $objmenu;
    private $objrol;
    private $mensajeoperacion;

    private function __construct(){
        $this->objmenu=null;
        $this->objrol=null;
        $this->mensajeoperacion="";
    }

    public function setear($objmenu, $objrol){
        $this->setobjmenu($objmenu);
        $this->setobjrol($objrol);
    }

    public function getobjmenu(){
        return $this->objmenu;
    }
    public function setobjmenu($param){
        $this->objmenu=$param;
    }

    public function getobjrol(){
        return $this->objrol;
    }
    public function setobjrol($param){
        $this->objrol=$param;
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
        $sql="SELECT * FROM menurol WHERE idmenu = ".$this->getobjmenu()->getidmenu()." AND idrol = ".$this->getobjrol()->getidrol().";";
        if($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    //--
                    $objmenu=new Menu();
                    $objmenu->setidmenu($row['idmenu']);
                    $objmenu->cargar();
                    //--
                    $objrol=new Rol();
                    $objrol->setidrol($row['idrol']);
                    $objrol->cargar();
                    //--
                    $this->setear( $objmenu, $objrol);
                    $resp=true;//se setea la resp como true para demostrar que la carga fue exitosa
                }
            }
        }else{
            $this->setmensajeoperacion("menurol->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base = new BaseDatosPDO();
        $sql="INSERT INTO menurol (idmenu, idrol)
                VALUES ('".$this->getobjmenu()->getidmenu()."', '".$this->getobjrol()->getidrol()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("menurol->insertar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("menurol->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="UPDATE menurol SET
            idmenu='".$this->getobjmenu()->getidmenu()."', idrol='".$this->getobjrol()->getidrol()."' WHERE idmenu='".$this->getobjmenu()->getidmenu()."', idrol='".$this->getobjrol()->getidrol()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("menurol->modificar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("menurol->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM menurol WHERE idmenu=".$this->getobjmenu()->getidmenu()." AND idrol=".$this->getobjrol()->getidrol().";";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("menurol->eliminar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("menurol->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo=array();
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM menurol ";
        if($parametro!=""){
            $sql.='WHERE '.$parametro;
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Menurol();
                    //--
                    $objmenu=new Menu();
                    $objmenu->setidmenu($row['idmenu']);
                    $objmenu->cargar();
                    //--
                    $objrol=new Rol();
                    $objrol->setidrol($row['idrol']);
                    $objrol->cargar();
                    //--
                    $obj->setear( $objmenu, $objrol);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setmensajeoperacion("menurol->listar: ".$base->getError());
        }
        return $arreglo;
    }
}