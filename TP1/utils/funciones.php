<?php

function dataSubmitted()
{
    $datos = [];
    if (!empty($_GET)) {
        $datos = $_GET;
    } elseif (!empty($_POST)) {
        $datos = $_POST;
    } elseif (!empty($_FILES)){
        $datos = $_FILES;
    }

    foreach ($datos as $indice => $valor) {
        if ($valor === "") {
            $datos[$indice] = null;
        }
    }

    return $datos;
}

function fileSubmitted(){
    $datos = [];
    if (!empty($_FILES)){
        $datos = $_FILES;
    }

    foreach ($datos as $indice => $valor) {
        if ($valor === "") {
            $datos[$indice] = null;
        }
    }

    return $datos;
}