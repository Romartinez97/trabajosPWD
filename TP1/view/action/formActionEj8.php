<?php

$titulo = "TP1 - Ejercicio 8";
include '../estructura/header.php';
include "../../controller/Cliente.php";
include "../../utils/funciones.php";

$datos = dataSubmitted();
$clienteObj = new Cliente($datos);
$precio = $clienteObj->calcularPrecio();

?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="display-6" id="tituloEjercicio">Cine Cinem@s</p>
            <p class="h4"><?php echo "La entrada cuesta $$precio.\n"; ?></p>
            <a href="../indexEj8.php" class="btn btn-dark mt-3">Volver a la calculadora</a>
            <a class="btn mt-3 text-white" href="../../../index.php" id="botonMenu">Volver al
                menú</a>
        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>

</body>



</html>