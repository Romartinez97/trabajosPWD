<?php

include_once('../configuracion.php');
function data_submitted(){
    $datos=array();
    if(!empty($_POST)){
        foreach($_POST as $clave => $valor){
            $datos[$clave] = $valor;
            if($valor==""){
                $datos[$clave]='null';
            }
        }
    }else{
        if(!empty($_GET)){
            foreach($_GET as $clave => $valor){
                $datos[$clave] = $valor;
                if($valor==""){
                    $datos[$clave]='null';
                }
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