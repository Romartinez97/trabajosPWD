<?php

$titulo = "TP2 - Ejercicio 4";
include '../estructura/header.php';
include "../../utils/funciones.php";
include "../../controller/Pelicula.php";

$datos = dataSubmitted();
$peliculaIngresada = new Pelicula($datos);

?>

<body class="container-sm text-light">
    <div class="container p-3 my-3" style="background-color: #A63A50; border-radius: 1rem;">
        <p class="display-6">La película introducida es:</p>
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
        <div class="d-flex justify-content-center">
            <a href="../indexEj4.php" class="btn btn-dark btn-block">Volver al formulario</a>
            <a class="btn mt-3 text-white botonMenu" href="../../../index.php" id="botonMenu">Volver al
                menú</a>
        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>

</body>

</html>