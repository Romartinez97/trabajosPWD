<?php
include_once '../../util/funciones.php';

$sesion = new Session();
$titulo = "Verificar login";

$datos = data_submitted();
$usmail = $datos['usmail'];
$uspass = md5($datos['uspass']);

// Verifico si se enviaron los campos vacíos
if (empty($usmail) || empty($uspass)) {
    header("Location: ../pagsPublicas/login.php?error=1");
    exit();
}

// Verifico si el usuario está deshabilitado
$objAbmUsuario = new AbmUsuario();
$listadoUsuarios = $objAbmUsuario->buscar(['usmail' => $usmail]);
if (!empty($listadoUsuarios)) {
    $usuarioEncontrado = $listadoUsuarios[0];
    $usDeshabilitado = $usuarioEncontrado->getUsdeshabilitado();
}

if ($usDeshabilitado == "0000-00-00 00:00:00") {
    header("Location: ../pagsPublicas/login.php?error=2");
    exit();
}


$sesion->iniciar($usmail, $uspass);

// Verificar si la autenticación fue exitosa
if ($sesion->validar()) {
    header("Location: ../pagsRestringidas/perfil.php");
    exit();
} else {
    header("Location: ../pagsPublicas/login.php?error=3");
    exit();
}
?>