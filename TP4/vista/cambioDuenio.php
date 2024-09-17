<?php

$titulo = "TP4 - Cambio Dueño";
include 'estructura/header.php';
include_once '../util/funciones.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <p class="display-6" id="tituloEjercicio">Cambiar de dueño:</p>
            <form action="accion/accionCambioDuenio.php" method="post" name="formCambioDuenio" id="formCambioDuenio">
                <label class="form-label" for="patente">Patente:</label>
                <input class="form-control" type="text" name="patente" id="patente">
                <label class="form-label" for="dni">DNI nuevo Dueño:</label>
                <input class="form-control" type="text" name="dni" id="dni">
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn m-3 bg-success text-white" value="Cambiar">
                    <a class="btn m-3 text-white" href="index.php" id="botonMenu">Volver atrás</a>
                    <a class="btn m-3 text-white bg-dark" href="../../index.php" id="botonMenu">Volver al
                        menú principal</a>
                </div>
            </form>
        </div>
    </div>
    <?php
    include 'estructura/footer.php';
    ?>
</body>
</html>