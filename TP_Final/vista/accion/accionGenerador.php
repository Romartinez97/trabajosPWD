<?php
include_once '../../util/funciones.php';

$sesion = new Session();
$titulo = "Acción Generador";

if (!$sesion->estaLogueado() || $sesion->getRol() != 1) {
    header('Location: ../pagsPublicas/login.php');
    exit();
}

$datos = data_submitted();
$opcionGenerador = $datos['opcionGenerador'];

if (!empty($datos)) {
    if ($opcionGenerador == 'usuarios') {
        $cantidad = $datos['cantidadUsuarios'];
        $rol = $datos['rol'];
        $abmUsuario = new AbmUsuario();
        $seGeneraron = $abmUsuario->generarUsuarios($cantidad, $rol);
        if ($seGeneraron) {
            header("Location: ../pagsRestringidas/generador.php?estado=1");
            exit();
        }
    } elseif ($opcionGenerador == 'libros') {
        $cantidad = $datos['cantidadLibros'];
        $accion = 'generarLibros';
        $abmProducto = new AbmProducto();
        $seGeneraron = $abmProducto->generarProductos($cantidad);
        if ($seGeneraron) {
            header("Location: ../pagsRestringidas/generador.php?estado=1");
            exit();
        }
    }
}

// Si llega a este punto es porque no se generaron los datos
header("Location: ../pagsRestringidas/generador.php?estado=2");
exit();



?>