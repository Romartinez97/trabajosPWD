<?php

include '../../util/funciones.php';
$titulo = "TP5 - Datos actualizados";
include '../estructura/header.php';


$datos = data_submitted();
print_r($datos);
$objUsuario = new AbmUsuario();

$idUsuario = $datos["idusuario"];
$nombreUsuario = $datos["usnombre"];
$mailUsuario = $datos["usmail"];
$passUsuario = $datos["uspass"];
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
$objUsuario->actualizarUsuario($paramModif);

//Busco a la persona de nuevo en la BD para chequear si se actualizaron los datos correctamente
$param = ["idusuario" => $idUsuario];
$usuarioBuscado = $objUsuario->buscar($param);
?>

<div class="container p-4 my-4 d-flex justify-content-center">
    <div class="div-form">
        <p class="display-6" id="tituloEjercicio">Datos actualizados</p>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Mail</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $usuarioBuscado[0]->getUsNombre(); ?></td>
                    <td><?php echo $usuarioBuscado[0]->getUsMail(); ?></td>
                    <td><?php echo $mensaje; ?></td>
                </tr>
            </tbody>
        </table>

        <a class="btn mt-3 text-white" href="../listarUsuario.php" id="botonMenu">Volver atrás</a>
        <a class="btn mt-3 text-white bg-dark" href="../../index.php">Volver al menú principal</a>
    </div>
</div>

<?php
include '../estructura/footer.php';
?>

</body>