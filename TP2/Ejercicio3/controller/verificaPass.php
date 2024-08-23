<?php

include "../utils/funciones.php";
include "Usuario.php";

$usuarios = [
    ["usuario" => "admin", "clave" => "a1234!5678"],
    ["usuario" => "usuario1", "clave" => "b1234!5678"],
    ["usuario" => "usuario2", "clave" => "c1234!5678"],
    ["usuario" => "usuario3", "clave" => "d1234!5678"],
];

$datos = dataSubmitted();
$usuarioObj = new Usuario($datos);
$usuarioIngresado = $usuarioObj->getUsuario();
$claveIngresada = $usuarioObj->getClave();

//Comparo los datos ingresados con el arreglo de usuarios para ver si coincide con alguno
$usuarioValido = false;
foreach ($usuarios as $usuario) {
    if ($usuario = ["usuario"] === $usuarioIngresado && $usuario["clave"] === $claveIngresada) {
        $usuarioValido = true;
        break;
    }
}

//Determino qué mensaje se arroja si el usuario es válido
$mensaje = "";
$usuarioValido ? $mensaje .= "Los datos ingresados no corresponden a ninguna combinación usuario/clave en nuestro sistema, intente nuevamente.\n"
    : $mensaje .= "!Bienvenido, " . $usuarioIngresado . "!\n";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TP2 - Ejercicio 3</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="display-6 text-success">INGRESO</p>
            <p class="h4"> <?php echo $mensaje; ?></p>
            <a href="../view/index.html" class="btn btn-primary mt-3">Volver al ingreso</a>
        </div>
    </div>
</body>

</html>