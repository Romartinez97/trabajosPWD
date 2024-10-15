<?php
$titulo = "patrickschur/language-detection";
include '../../estructura/header.php';
require '../../vendor/autoload.php';

use LanguageDetection\Language;
use LanguageDetection\LanguageResult;
use LanguageDetection\Trainer;

$t = new Trainer();
$t->setMaxNgrams(9000);
$t->learn();

$ld = new Language();
$ld->setMaxNgrams(9000);
$ejemplo1 = "La amistad es un regalo que debemos cuidar y valorar.";
$ejemplo2 = "Traveling opens our minds and helps us understand different cultures.";
$ejemplo3 = "Le chocolat chaud est parfait pour se réchauffer en hiver.";
$ejemplo4 = "Freundschaft ist wichtig, um in schwierigen Zeiten Unterstützung zu finden.";
$ejemplo5 = "La musica unisce le persone e crea momenti indimenticabili insieme.";

$resultado1 = $ld->detect($ejemplo1)->bestResults()->close();
$resultado2 = $ld->detect($ejemplo2)->bestResults()->close();
$resultado3 = $ld->detect($ejemplo3)->bestResults()->close();
$resultado4 = $ld->detect($ejemplo4)->bestResults()->close();
$resultado5 = $ld->detect($ejemplo5)->bestResults()->close();

//
$detector = new LanguageDetection\Language();
$resultado1 = $detector->detect($ejemplo1)->close();
$idiomaDetectado = 'No se pudo detectar el idioma.';
$valorDetectado = 0;
if ($resultado1) {
    $resultArray = (array) $resultado1;
    if (!empty($resultArray['result'])) {
        $idiomas = $resultArray['result'];
        $idiomaDetectado = key($idiomas);
        $valorDetectado = $idiomas[$idiomaDetectado];
    }
}
//
?>

<div class="container p-4 my-4 d-flex justify-content-center">
    <div>
        <p class="h1" style="color:#295F98">patrickschur/language-detection</p>
        <p>patrickschur/language-detection es una librería de PHP que se utiliza para la detección de una cadena de
            texto dada.</p>
        <p>A partir de un texto de prueba en distintos idiomas, se crea una base de datos que se convierte en secuencias
            de n-gramas (subsecuencias de n elementos de una secuencia dada). Estas secuencias se utilizarán
            posteriormente para comparar el texto ingresado y determinar el idioma en el que está escrito.</p>
        <br>
        <div class="ms-2">
            <p class="h2" style="color:#295F98">Requisitos</p>
            <p>Antes de empezar hay que asegurarse de tener instalado lo siguiente:</p>
            <div class="ms-4">
                <p class="h3" style="color:#295F98">PHP:</p>
                <p>Se debe tener PHP instalado en tu sistema. Se puede comprobar fácilmente ejecutando el comando "php
                    -v" en tu terminal.</p>
                <p class="h3" style="color:#295F98">Composer:</p>
                <p>Esta librería se gestiona mediante Composer, así que asegúrate de tener
                    Composer instalado. En caso contrario se puede instalar desde <a
                        href="https://getcomposer.org/">aquí</a>. Para comprobar si está instalado se puede hacer con el
                    comando "composer -v" en la terminal.</p>
                <p class="h3" style="color:#295F98">Extensión Multibyte String:</p>
                <p>Para que la librería funcione se requiere la extensión Multibyte String, la cual no viene habilitada
                    por defecto. Se puede ver cómo habilitarla <a
                        href="https://www.php.net/manual/es/mbstring.installation.php">aquí</a>.
                    <br>
                    Para comprobar si está habilitada, se puede utilizar el comando "php -m | findstr mbstring" en la
                    terminal; si lo está, deberías ver la palabra "mbstring" en la salida.
                </p>
            </div>
            <br>
            <p class="h2" style="color:#295F98">Instalación de la librería:</p>
            <p>Para instalar nuestra librería de optimización de imágenes debemos situarnos en la terminal de nuestro
                proyecto y escribir el comando:</p>
            <div class="container m-3">
                <div class="card border-light rounded-3">
                    <div class="card-header bg-secondary text-black rounded-top">
                        Comando en Terminal
                    </div>
                    <div class="card-body bg-dark text-white rounded-bottom">
                        <pre><code>composer require patrickschur/language-detection</code></pre>
                    </div>
                </div>
            </div>
            <br>
            <p class="h2" style="color:#295F98">Ejemplos:</p>
            <div>
                Texto: <?php echo $ejemplo1 . "\n"; ?>
                <p>Idioma detectado: <?php echo $resultado1["es"] . "\n"; ?></p>
                <?php print_r($resultado1); ?>
                <br>-------------------------<br>
                Texto: <?php echo $ejemplo2 . "\n"; ?>
                <p>Idioma detectado: <?php echo $resultado2 . "\n"; ?></p>
                <?php print_r($resultado2); ?>
                <br>-------------------------<br>
                Texto: <?php echo $ejemplo3 . "\n"; ?>
                <p>Idioma detectado: <?php echo $resultado3 . "\n"; ?></p>
                <?php print_r($resultado3); ?>
                <br>-------------------------<br>
                Texto: <?php echo $ejemplo4 . "\n"; ?>
                <p>Idioma detectado: <?php echo $resultado4 . "\n"; ?></p>
                <?php print_r($resultado4); ?>
                <br>-------------------------<br>
                Texto: <?php echo $ejemplo5 . "\n"; ?>
                <p>Idioma detectado: <?php echo $resultado5 . "\n"; ?></p>
                <?php print_r($resultado5); ?>
                <br>-------------------------<br>

                <div>
                    Texto: <?php echo $ejemplo1 . "\n"; ?>
                    <p>Idioma detectado: <?php echo $idiomaDetectado . " (" . $valorDetectado . ")\n"; ?></p>
                    <?php print_r($resultado1); ?>
                </div>

            </div>
        </div>
        <br>
        <p class="h2" style="color:#295F98">Identificar un idioma:</p>
        <form action="accion/accionLanguageDetection.php" method="post">
            <label class="form-label" for="textoIngresado">Ingrese un texto para detectar su idioma (mínimo 5
                palabras):</label>
            <input class="form-control" type="text" name="textoIngresado" id="textoIngresado">
            <input type="submit" class="btn m-2 bg-success text-white" value="Identificar">
            <input type="reset" class="btn m-2 bg-danger text-white" value="Borrar">
        </form>
    </div>
</div>
<?php
include '../../estructura/footer.php';
?>
</body>

</html>