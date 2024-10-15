<?php
$titulo = "patrickschur/language-detection";
include "../../../estructura/header.php";
include "../../util/funciones.php";

require '../../../vendor/autoload.php';
use LanguageDetection\Language;
use LanguageDetection\Trainer;

$datos = data_submitted();
$textoIngresado = $datos["textoIngresado"];
print_r($datos);

$ld = new Language();
$ld->setMaxNgrams(9000);
$resultado = $ld->detect($textoIngresado)->bestResults()->close();
print_r($resultado);
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <?php
            if (empty($datos)) {
                echo "<p>Texto ingresado: " . $textoIngresado . "</p>";

                foreach ($resultado as $idioma => $probabilidad) {
                    echo "<p>Idioma detectado: " . $idioma . " con una probabilidad de: " . $probabilidad . "</p>";
                }
            } else {
                echo "<p>Error: No se ingresó ningún texto.</p>";
            }
            ?>
            <a class="btn mt-3 text-white" href="../languageDetectionEjemplos.php" id="botonMenu">Volver atrás</a>
            <a class="btn mt-3 text-white bg-dark" href="../../../index.php">Volver al menú principal</a>
        </div>
    </div>

    <?php
    include '../../../estructura/footer.php';
    ?>

</body>