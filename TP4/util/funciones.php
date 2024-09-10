<?php

function data_submitted(){
    $datos=array();
    if(!empty($_POST)){
        $datos=$_POST;
    }else{
        if(!empty($_GET)){
            $datos=$_GET;
        }
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

function verEstructura($e){
    echo "<pre>";
    print_r($e);
    echo "<pre>";
}

function my_autoloader($class_name){
    //Directorios donde se buscaran las clases
    $directories=array(
        $_SESSION['ROOT'].'control/',
        $_SESSION['ROOT'].'modelo/',
        $_SESSION['ROOT'].'modelo/conector/',
    );
    foreach($directories as $directory){
        if(file_exists($directory.$class_name.'.php')){
            require_once($directory.$class_name.'.php');
            return;
        }
    }
}
spl_autoload_register('my_autoloader');

?>