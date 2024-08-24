<?php

include "Cliente.php";
include "../utils/funciones.php";

$datos = dataSubmitted();
$clienteObj = new Cliente($datos);
$precio = $clienteObj->calcularPrecio();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP1 - Ejercicio 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="display-6 text-success">Cine Cinem@s</p>
            <p class="h4"><?php echo "La entrada cuesta $$precio.\n"; ?></p>
            <a href="../view/index.php" class="btn btn-primary mt-3">Volver a la calculadora</a>
        </div>
    </div>
</body>



</html>