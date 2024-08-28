<?php

include "../../controller/Persona.php";
include "../../utils/funciones.php";

$datos = dataSubmitted();
$personaObj = new Persona($datos);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TP1 - Ejercicio 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="display-6 text-info">Datos personales:</p>
            <p>
                <?php echo "Hola, yo soy " . $personaObj->getNombre() . " " . $personaObj->getApellido() . ", tengo " . $personaObj->getEdad() . " años (" . $personaObj->mayorEdad() . ") y vivo en " . $personaObj->getDireccion() . "."; ?>
            </p>
            <p>
                <?php echo $personaObj->mensajeNivelEstudios() . " y mi sexo es " . $personaObj->getSexo() . "."; ?>
            </p>
            <p>
                <?php
                if ($personaObj->totalDeportes() == 0) {
                    echo "No practico deportes.";
                } else {
                    echo "Practico en total " . $personaObj->totalDeportes() . " deportes: " . $personaObj->mostrarDeportes();
                } ?>
            </p>
            <a href="../index.php" class="btn btn-primary mt-3">Volver a la página anterior</a>
        </div>
    </div>
</body>

</html>