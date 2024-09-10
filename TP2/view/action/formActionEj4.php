<?php

$titulo = "TP2 - Ejercicio 4";
include '../estructura/header.php';
include "../../utils/funciones.php";
include "../../controller/Pelicula.php";

$datos = dataSubmitted();
$peliculaIngresada = new Pelicula($datos);

?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="display-4" id="tituloEjercicio">La película introducida es:</p>
            <div class="container">
                <p><strong>Título:</strong>
                    <?php echo $peliculaIngresada->getTitulo() ?>
                </p>
                <p><strong>Actores:</strong>
                    <?php echo $peliculaIngresada->getActores() ?>
                </p>
                <p><strong>Director: </strong>
                    <?php echo $peliculaIngresada->getDirector() ?>
                </p>
                <p><strong>Guión: </strong>
                    <?php echo $peliculaIngresada->getGuion() ?>
                </p>
                <p><strong>Producción: </strong>
                    <?php echo $peliculaIngresada->getProduccion() ?>
                </p>
                <p><strong>Año: </strong>
                    <?php echo $peliculaIngresada->getAnio() ?>
                </p>
                <p><strong>Nacionalidad: </strong>
                    <?php echo $peliculaIngresada->getNacionalidad() ?>
                </p>
                <p><strong>Género: </strong>
                    <?php echo ucfirst($peliculaIngresada->getGenero()) ?>
                </p>
                <p>
                    <strong>Duración: </strong>
                    <?php echo $peliculaIngresada->getDuracion() ?>
                </p>
                <p><strong>Restricción de edad: </strong>
                    <?php echo $peliculaIngresada->getMensajeRestriccion() ?>
                </p>
                <p><strong>Sinopsis: </strong>
                    <?php echo $peliculaIngresada->getSinopsis() ?>
                </p>
            </div>
            <a href="../indexEj4.php" class="btn btn-dark mt-3">Volver al formulario</a>
            <a class="btn mt-3 text-white" href="../../../index.php" id="botonMenu">Volver al
                menú</a>
        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>

</body>

</html>