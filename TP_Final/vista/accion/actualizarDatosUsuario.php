<?php
$titulo = "Actualizar datos";
include_once '../../util/funciones.php';
include '../estructura/header.php';

$datos = data_submitted();
$objUsuario = new AbmUsuario();

$idUsuario = $datos["idusuario"];
$nombreUsuario = $datos["usnombre"];
$mailUsuario = $datos["usmail"];
$passUsuario = md5($datos['uspass']);
$deshabilitadoUsuario = $datos["usdeshabilitado"];
$mensaje = "Contraseña modificada correctamente";

// Convertir string "null" a una constante null
if ($passUsuario === 'null') {
    $passUsuario = null;
}

// Si la contraseña no se ha cambiado, usa la contraseña actual
if ($passUsuario === null || $passUsuario === '') {
    $passUsuario = $datos["uspassactual"];
    $mensaje = "No se modificó la contraseña";
}

$paramModif = [
    "idusuario" => $idUsuario,
    "usnombre" => $nombreUsuario,
    "usmail" => $mailUsuario,
    "uspass" => $passUsuario,
    "usdeshabilitado" => $deshabilitadoUsuario,
];

if ($objUsuario->modificacion($paramModif)){
    header("Location: ../pagsRestringidas/perfil.php?estado=1");
    exit();
} else {
    header("Location: ../pagsRestringidas/perfil.php?estado=2");
    exit();
};



?>