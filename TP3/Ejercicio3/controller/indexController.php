<?php

include "../utils/funciones.php";
include "Pelicula.php";

$datos = dataSubmitted();
$datosImagen = fileSubmitted();

$peliculaIngresada = new Pelicula($datos, $datosImagen);
$peliculaIngresada->setArrayImagen($_FILES['archivo']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinem@s</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

</head>

<body class="container-sm text-light bg-dark">
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
                <?php echo $peliculaIngresada->getGenero() ?>
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
            <p><strong>Imagen de la película: </strong>
                <img src="<?php echo $peliculaIngresada->verArchivo() ?>" alt="Imagen de la película"
                    class="img-thumbnail">
            </p>

        </div>
        <div class="d-flex justify-content-center">
            <a href="../view/index.php" class="btn btn-dark btn-block">Volver al formulario</a>
        </div>
    </div>

</body>

</html>