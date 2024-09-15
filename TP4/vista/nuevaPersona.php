<?php
$titulo = "TP4 - Nueva persona";
include 'estructura/header.php';
include_once '../util/funciones.php';
//include_once '../control/AbmAuto.php';
//include_once '../control/AbmPersona.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <p class="display-6" id="tituloEjercicio">Agregar una persona:</p>
            <form action="accion/accionNuevaPersona.php" method="post" name="formNuevaPersona" id="formNuevaPersona">
                <label class="form-label" for="NroDni">DNI:</label>
                <input class="form-control" type="number" name="nroDni" id="NroDni">
                <label class="form-label" for="Nombre">Nombre:</label>
                <input class="form-control" type="text" name="nombre" id="Nombre">
                <label class="form-label" for="Apellido">Apellido:</label>
                <input class="form-control" type="text" name="apellido" id="Apellido">
                <label class="form-label" for="fechaNac">Fecha de nacimiento (AAAA-MM-DD):</label>
                <input class="form-control" type="date" name="fechaNac" id="fechaNac">
                <label class="form-label" for="codigoArea">Código de área (sin 0):</label>
                <input class="form-control" type="number" name="codigoArea" id="codigoArea">
                <label class="form-label" for="Telefono">Teléfono:</label>
                <input class="form-control" type="number" name="telefono" id="Telefono">
                <label class="form-label" for="Domicilio">Domicilio:</label>
                <input class="form-control" type="text" name="domicilio" id="Domicilio">
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