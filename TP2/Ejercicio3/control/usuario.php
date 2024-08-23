<?php

class Usuario{

    public function ingreso($datos, $usuarios){
        $user=$datos['usuario'];
        $pass=$datos['contrasenia'];
        $i=0;
        $userEncontrado=null;
        while($i<count($usuarios) && $userEncontrado==null){
            if($user == $usuarios[$i]['usuario'] && $pass == $usuarios[$i]['clave']){
                $userEncontrado=$usuarios[$i]['usuario'];
            }else{
                $i++;
            }
        }
        return $userEncontrado;
    }
}