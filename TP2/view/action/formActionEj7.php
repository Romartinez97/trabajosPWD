<?php

$titulo = "TP1 - Ejercicio 7";
include '../estructura/header.php';
include "../../controller/Operacion.php";
include "../../utils/funciones.php";

$datos = dataSubmitted();
$operacionObj = new Operacion($datos);
$resultado = $operacionObj->realizarOperacion();

?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="display-6 text-success">Calculadora</p>
            <p class="h4"> <?php echo $resultado; ?></p>
            <a href="../indexEj7.php" class="btn btn-dark mt-3">Volver a la página anterior</a>
            <a class="btn mt-3 text-white botonMenu" href="../../../index.php" id="botonMenu">Volver al
                menú</a>
        </div>
    </div>
    
<?php
    include '../estructura/footer.php';
    ?>

</body>

</html>