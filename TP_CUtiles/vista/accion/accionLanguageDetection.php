<?php
$titulo = "patrickschur/language-detection";
include "../../../estructura/header.php";
include "../../util/funciones.php";
require '../../vendor/autoload.php';
require "../../control/Idioma.php";

$datos = data_submitted();
$textoIngresado = $datos["textoIngresado"];

use LanguageDetection\Trainer;
$t = new Trainer();
$t->setMaxNgrams(9000);
$t->learn();
$idioma = new Idioma();
$idioma->setMaxNgrams(9000);

?>


<div class="container p-4 my-4 d-flex justify-content-center">
    <div>
        <p class="h1 mb-4" style="color:#295F98">patrickschur/language-detection</p>
        <p class="h2 mb-4" style="color:#295F98">Resultado de la detección de idioma:</p>
        <?php if (empty($textoIngresado)): ?>
            <p class="h2 text-danger">ERROR: no se ingresó ningún texto</p>
            <p>Vuelva atrás e intente nuevamente</p>
        <?php else: ?>
            <div>
                <p class="h5 mb-3" style="color:#295F98">Mostrando solo el primer resultado (el de mayor probabilidad):</p>
                <div class="ms-3">
                    <?php
                    $resultado = $idioma->mostrarPrimerResultado($textoIngresado);
                    echo "<p class='h6'>Texto: " . $textoIngresado . "</p>";
                    foreach ($resultado as $idiomaDetectado => $probabilidad) {
                        echo "<p>" . ucfirst($idiomaDetectado) . ", con una probabilidad de acierto del " . $probabilidad . "%</p>";
                    }
                    ?>
                </div>
                <br>
                <p class="h5 mb-3" style="color:#295F98">Mostrando todos los posibles idiomas y su probabilidad:</p>
                <div class="ms-3">
                    <?php
                    $resultados = $idioma->mostrarTodosLosResultados([$textoIngresado]);
                    foreach ($resultados as $resultado) {
                        echo "<div style='max-height: 200px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;'>";
                        echo "<p class='h6'>Texto: " . $resultado['texto'] . "</p>";
                        foreach ($resultado['resultados'] as $idiomaProbabilidad) {
                            foreach ($idiomaProbabilidad as $idiomaDetectado => $probabilidad) {
                                echo "<p>" . ucfirst($idiomaDetectado) . ": " . $probabilidad . "%</p>";
                            }
                        }
                        echo "</div><br>";
                    }
                    ?>
                </div>
                <a class="btn mt-3 text-white" href="../languageDetectionEjemplos.php" id="botonMenu">Volver atrás</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
include '../../../estructura/footer.php';
?>
</body>