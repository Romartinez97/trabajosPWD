<?php

include_once("../../util/funciones.php");
include_once("../../control/imagen.php");
include_once("../../vendor/autoload.php");

$datos=data_submitted();
$imagen=$datos["imagen"];
$controlImg=new Imagen($imagen);
$controlImg->subirImagen();
$imagenOptimizada=$controlImg->optimizarImg();
$tamanioOpt=filesize($imagenOptimizada);
$porcentaje=$controlImg->porcentaje();

$titulo = "Spatie/image-Optimizer";
include '../../../estructura/header.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
        <p class="h1" style="color:#295F98">Resultado de optimizacion:</p>
        <p class="h3 ms-3">Resultado:</p>
                <div class="d-flex justify-content-center">
                    <div>
                        <?php
                        echo "<img  class='ms-5' src='".$imagenOptimizada."' alt='IMG_Original' height='700px'>";
                        ?>
                        <p class="h3 ms-5">Tamaño: <?php echo $tamanioOpt ?> Bytes (-<?php echo 100-$porcentaje ?>%)</p>
                    </div>
                </div>
        </div>
    </div>
    <?php
    include '../../../estructura/footer.php';
    ?>
</body>
</html>

