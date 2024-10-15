<?php

$titulo = "TP1 - Ejercicio 1";
include '../../../estructura/header.php';
include "../../utils/funciones.php";
include "../../controller/Numero.php";

$datos = dataSubmitted();
$numero = new Numero($datos);

?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <p class="display-6 text-success">¿Es positivo o negativo?</p>
            <p class="h4">Resultado: </p>
            <p> <?php echo $numero->devolverSigno(); ?> </p>
            <a href="../indexEj1.php" class="btn btn-dark mt-3">Volver a la página anterior</a>
            <a class="btn mt-3 text-white" href="../../../index.php" id="botonMenu">Volver al
                menú</a>
        </div>
    </div>

    <?php
    include '../../../estructura/footer.php';
    ?>
</body>

</html>