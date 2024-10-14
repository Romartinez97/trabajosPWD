<?php

function data_submitted(){
    $datos=array();
    if(!empty($_POST)){
        $datos=$_POST;
    }elseif(!empty($_GET)){
        $datos=$_GET;
    }elseif(!empty($_FILES)){
        $datos=$_FILES;
    }
    if(count($datos)){
        foreach($datos as $indice => $valor){
            if($valor==""){
                $datos[$indice]='null';
            }
        }
    }
    return $datos;
}