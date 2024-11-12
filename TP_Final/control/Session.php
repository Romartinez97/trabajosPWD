<?php

class Session{

    public function __construct(){
        session_start();
    }

    /**
     * Actualiza las variables de sesion con los valores ingresados.
     */
    public function iniciar($nombreUsuario,$psw){
        $resp=false;
        $obj= new AbmUsuario();
        $param['usnombre']=$nombreUsuario;
        $param['uspass']=$psw;
        $param['usdeshabilitado']='0000-00-00 00:00:00';
        $resultado = $obj->buscar($param);
        if(count($resultado)>0){
            $usuario=$resultado[0];
            $_SESSION['idusuario']=$usuario->getIdUsuario();
            $resp=true;
        }else{
            $this->cerrar();
        }
        return $resp;
    }

    /**
     * valida si la seison actual tiene usuario y psw validos.
     */
    public function validar(){
        $resp=false;
        if($this->activa() && isset($_SESSION['idusuario'])){
            $resp=true;
        }
        return $resp;
    }

    /**
     * devuelve true o false si la sesion esta activa o no.
     */
    public function activa(){
        $resp=false;
        if(session_status()==PHP_SESSION_ACTIVE){
            $resp=true;
        }
        return $resp;
    }

    /**
     * devuelve el usuario logeado.
     */
    public function getUsuario(){
        $usuario=null;
        if($this->validar()){
            $obj=new AbmUsuario();
            $param['idusuario']=$_SESSION['idusuario'];
            $resultado=$obj->buscar($param);
            if(count($resultado)>0){
                $usuario=$resultado[0];
            }
        }
        return $usuario;
    }

    /**
     * devuelve el rol del usuario logeado.
     */
    public function getRol(){
        $rol=null;
        if($this->validar()){
            $obj=new AbmUsuariorol();
            $param['idusuario']=$_SESSION['idusuario'];
            $resultado=$obj->buscar($param);
            if(count($resultado)>0){
                $rol=$resultado;
            }
        }
        return $rol;
    }

    public function cerrar(){
        session_destroy();
        $resp=true;
        return $resp;
    }
}