<?php

//FUNCION GLOBAL PARA CUALQUIER FORM
function datos_submitted(){
    $datos=[];
    
    //suponiendo que clave seria el name="" del form y valor lo que ingrese el usuario
    foreach($_GET as $clave => $valor){ 
        $datos[$clave] = $valor;
    }
    foreach($_POST as $clave => $valor){
        $datos[$clave] = $valor;
    }
    return $datos;
}