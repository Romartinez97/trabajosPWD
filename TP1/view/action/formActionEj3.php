<?php

$titulo = "TP1 - Ejercicio 3";
include '../estructura/header.php';
include "../../controller/Persona.php";
include "../../utils/funciones.php";

$datos = dataSubmitted();
$personaObj = new Persona($datos);

?>

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
            <a href="../indexEj3.php" class="btn btn-dark mt-3">Volver a la página anterior</a>
            <a class="btn mt-3 text-white botonMenu" href="../../index.php" id="botonMenu">Volver al
                menú</a>
        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>

</body>

</html>