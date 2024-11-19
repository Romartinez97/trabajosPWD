<?php
include_once '../../util/funciones.php';

$sesion = new Session();
$datos = data_submitted();

if (!$sesion->estaLogueado() || !in_array($sesion->getRol(), [1, 3])) {
    header('Location: ../pagsPublicas/login.php');
    exit();
}

$abmProducto = new AbmProducto();

if (!empty($datos)) {
    $param = [
        'idproducto' => $datos['idproducto'],
        'pronombre' => $datos['pronombre'],
        'prodetalle' => $datos['prodetalle'],
        'procantstock' => $datos['procantstock'],
        'progenero' => $datos['progenero'],
        'proprecio' => $datos['proprecio']
    ];
    $abmProducto->modificacion($param);
    header('Location: ../pagsRestringidas/deposito.php');
    exit();
}
?>