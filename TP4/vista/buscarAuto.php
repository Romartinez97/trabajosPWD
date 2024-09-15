<?php
$titulo = "TP4 - Buscar auto";
include 'estructura/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <p class="display-6" id="tituloEjercicio">Buscar un auto (patente):</p>

            <form action="accion/accionBuscarAuto.php" method="post" name="formBuscarAuto" id="formBuscarAuto">
                <input class="form-control" type="text" name="patente" id="patente" required>
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn m-3 bg-success text-white" value="Buscar">
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