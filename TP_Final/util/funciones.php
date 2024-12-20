<?php

if(file_exists('../configuracion.php')){
    include_once '../configuracion.php';
}elseif(file_exists('../../configuracion.php')){
    include_once '../../configuracion.php';
}

function data_submitted(){
    $datos=array();
    if(!empty($_POST)){
        foreach($_POST as $clave => $valor){
            $datos[$clave] = $valor;
            if($valor==""){
                $datos[$clave]='null';
            }
        }
    }
    if(!empty($_GET)){
        foreach($_GET as $clave => $valor){
            $datos[$clave] = $valor;
            if($valor==""){
                $datos[$clave]='null';
            }
        }
    }
    if(!empty($_FILES)){
        foreach($_FILES as $clave => $valor){
            $datos[$clave]=$valor;
            if($valor==""){
                $datos[$clave]='null';
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
    //echo $_SESSION['ROOT']."<br>";//linea para ver si funciona (borrar luego)
    $directories=array(
        $GLOBALS['ROOT'].'control/',
        $GLOBALS['ROOT'].'modelo/',
        $GLOBALS['ROOT'].'modelo/conector/',
        $GLOBALS['ROOT'].'util/',
    );
    foreach($directories as $directory){
        if(file_exists($directory.$class_name.'.php')){
            require_once($directory.$class_name.'.php');
            //echo $directory.$class_name.'.php'."<br>"; //linea para ver si funciona (borrar luego)
        }
    }
    return;
}
spl_autoload_register('my_autoloader');

?>