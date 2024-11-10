<?php
include_once '../../util/funciones.php';

$sesion = new Session();
$titulo = "Sesión iniciada";

$datos = data_submitted();
$usmail = $datos['usmail'];
$uspass = $datos['uspass'];

// Verificar los datos de entrada
if (empty($usmail) || empty($uspass)) {
    error_log("Correo electrónico o contraseña no proporcionados.");
    header("Location: ../login.php?error=1");
    exit();
}

error_log("Datos recibidos: usmail = $usmail, uspass = $uspass");

$sesion->iniciar($usmail, $uspass);

// Verificar si la autenticación fue exitosa
if ($sesion->validar()) {
    error_log("Login exitoso. Redirigiendo a paginaSegura.php...");
    header("Location: ../paginaSegura.php");
    exit();
} else {
    error_log("Login fallido. Redirigiendo a login.php...");
    header("Location: ../login.php?error=1");
    exit();
}
?>