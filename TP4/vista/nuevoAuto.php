<?php
$titulo = "TP4 - Nuevo auto";
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
            <p class="display-6" id="tituloEjercicio">Agregar un auto:</p>
            <form action="accion/accionNuevoAuto.php" method="post" name="formNuevoAuto" id="formNuevoAuto">
                <label class="form-label" for="patente">Patente:</label>
                <input class="form-control" type="text" name="patente" id="patente">
                <label class="form-label" for="marca">Marca:</label>
                <input class="form-control" type="text" name="marca" id="marca">
                <label class="form-label" for="modelo">Modelo:</label>
                <input class="form-control" type="number" name="modelo" id="modelo">
                <label class="form-label" for="dniDuenio">DNI Dueño:</label>
                <input class="form-control" type="number" name="dniDuenio" id="dniDuenio">
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn m-3 bg-success text-white" value="Agregar">
                    <a class="btn m-3 text-white" href="index.php" id="botonMenu">Volver atrás</a>
                    <a class="btn m-3 text-white bg-dark" href="../../index.php" id="botonMenu">Volver al
                        menú</a>
                </div>
            </form>
        </div>
    </div>

    <?php
    include 'estructura/footer.php';
    ?>

</body>


</html>