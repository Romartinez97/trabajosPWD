<?php

class Usuario{
    private $idusuario;
    private $usnombre;
    private $uspass;
    private $usmail;
    private $usdeshabilitado;
    private $mensajeoperacion;

    public function __construct(){
        $this->idusuario="";
        $this->usnombre="";
        $this->uspass="";
        $this->usmail="";
        $this->usdeshabilitado="";
        $this->mensajeoperacion="";
    }

    public function setear($idusuario, $usnombre, $uspass, $usmail, $usdeshabilitado){
        $this->setidusuario($idusuario);
        $this->setusnombre($usnombre);
        $this->setuspass($uspass);
        $this->setusmail($usmail);
        $this->setusdeshabilitado($usdeshabilitado);
    }

    //metodos de acceso

    public function getidusuario(){
        return $this->idusuario;
    }
    public function setidusuario($param){
        $this->idusuario=$param;
    }

    public function getusnombre(){
        return $this->usnombre;
    }
    public function setusnombre($param){
        $this->usnombre=$param;
    }

    public function getuspass(){
        return $this->uspass;
    }
    public function setuspass($param){
        $this->uspass=$param;
    }

    public function getusmail(){
        return $this->usmail;
    }
    public function setusmail($param){
        $this->usmail=$param;
    }

    public function getusdeshabilitado(){
        return $this->usdeshabilitado;
    }
    public function setusdeshabilitado($param){
        $this->usdeshabilitado=$param;
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
        $sql="SELECT * FROM usuario WHERE idusuario = ".$this->getidusuario();
        if($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                    $resp=true;//se setea la resp como true para demostrar que la carga fue exitosa
                }
            }
        }else{
            $this->setmensajeoperacion("usuario->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base = new BaseDatosPDO();
        $sql="INSERT INTO usuario (usnombre, uspass, usmail, usdeshabilitado)
                VALUES ('".$this->getusnombre()."', '".$this->getuspass()."', '".$this->getusmail()."', '".$this->getusdeshabilitado()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("usuario->insertar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("usuario->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="UPDATE usuario SET
            usnombre='".$this->getusnombre()."', uspass='".$this->getuspass()."', usmail='".$this->getusmail()."', usdeshabilitado='".$this->getusdeshabilitado()."' WHERE idusuario='".$this->getidusuario()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("usuario->modificar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("usuario->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM usuario WHERE idusuario=".$this->getidusuario();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setmensajeoperacion("usuario->eliminar: ".$base->getError());
            }
        }else{
            $this->setmensajeoperacion("usuario->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo=array();
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM usuario ";
        if($parametro!=""){
            $sql.='WHERE '.$parametro;
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Usuario();
                    $obj->setear( $row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setmensajeoperacion("usuario->listar: ".$base->getError());
        }
        return $arreglo;
    }
}