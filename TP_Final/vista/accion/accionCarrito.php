<?php
include_once '../../util/funciones.php';

$sesion = new Session();
$titulo = "Acción carrito";

if (!$sesion->estaLogueado()) {
    header('Location: ../pagsPublicas/login.php');
    exit();
}

$datos = data_submitted();
$accion = $datos['accion'];

switch ($accion) {
    case 'eliminar':
        $idproducto = $datos['idproducto'];
        foreach ($_SESSION['carrito'] as $key => $item) {
            if ($item['idproducto'] == $idproducto) {
                unset($_SESSION['carrito'][$key]);
                header('Location: ../pagsPublicas/carrito.php');
                exit();
            }
        }
    case 'comprar':
        break; // Agregar funcionalidad de compra ingresando a la base de datos
    case 'vaciar':
        unset($_SESSION['carrito']);
        header('Location: ../pagsPublicas/carrito.php');
        exit();
}

?>