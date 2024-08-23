<?php

function dataSubmitted()
{
    $datos = [];
    if (!empty($_GET)) {
        $datos = $_GET;
    } elseif (!empty($_POST)) {
        $datos = $_POST;
    }

    foreach ($datos as $indice => $valor) {
        if ($valor === "") {
            $datos[$indice] = null;
        }
    }

    return $datos;
}