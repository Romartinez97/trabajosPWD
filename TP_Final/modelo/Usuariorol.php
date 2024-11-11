<?php

class Usuariorol{
    private $objusuario;
    private $objrol;
    private $mensajeoperacion;

    public function __construct(){
        $this->objusuario=null;
        $this->objrol=null;
        $this->mensajeoperacion="";
    }

    public function setear($objusuario, $objrol){
        $this->setobjusuario($objusuario);
        $this->setobjrol($objrol);
    }

    //metodos de acceso

    public function getobjusuario(){
        return $this->objusuario;
    }
    public function setobjusuario($param){
        $this->objusuario=$param;
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
        $sql="SELECT * FROM usuariorol WHERE idusuario = ".$this->getobjusuario()->getidusuario()." AND idrol =".$this->getobjrol()->getidrol();
        if($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    //--
                    $objusuario=new Usuario();
                    $objusuario->setidusuario($row['idusuario']);
                    $objusuario->cargar();
                    //--
                    $objrol=new Rol();
                    $objrol->setidrol($row['idrol']);
                    $objrol->cargar();
                    //--
                    $this->setear($objusuario, $objrol);
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
                VALUES ('".$this->getobjusuario()->getidusuario()."', '".$this->getobjrol()->getidrol()."')";
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
            idusuario='".$this->getobjusuario()->getidusuario()."', idrol='".$this->getobjrol()->getidrol()."' WHERE idusuario='".$this->getobjusuario()->getidusuario()."' AND idrol='".$this->getobjrol()->getidrol();
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
        $sql="DELETE FROM usuariorol WHERE idusuario=".$this->getobjusuario()->getidusuario()." AND idrol=".$this->getobjrol()->getidrol();
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
                    //--
                    $objusuario=new Usuario();
                    $objusuario->setidusuario($row['idusuario']);
                    $objusuario->cargar();
                    //--
                    $objrol=new Rol();
                    $objrol->setidrol($row['idrol']);
                    $objrol->cargar();
                    //--
                    $obj->setear( $objusuario, $objrol);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setmensajeoperacion("usuariorol->listar: ".$base->getError());
        }
        return $arreglo;
    }
}
