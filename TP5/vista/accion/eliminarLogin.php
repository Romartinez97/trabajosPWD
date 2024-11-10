<?php
include_once '../../util/funciones.php';

session_start();

$datos = data_submitted();
$idUsuario = $datos["idusuario"];
$objAbmUsuario = new AbmUsuario();
$mensaje = $objAbmUsuario->borradoLogico($idUsuario);

$_SESSION['mensaje'] = $mensaje;

header("Location: ../listarUsuario.php");
exit();
?>