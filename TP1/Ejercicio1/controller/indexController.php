<?php

include "../utils/funciones.php";
include "Numero.php";

$datos = dataSubmitted();
$numero = new Numero($datos);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP1 - Ejercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <p class="display-6 text-success">¿Es positivo o negativo?</p>
            <p class="h4">Resultado: </p>
            <p> <?php echo $numero->devolverSigno(); ?> </p>
            <a href="../view/index.php" class="btn btn-primary mt-3">Volver a la página anterior</a>
        </div>
    </div>
</body>

</html>