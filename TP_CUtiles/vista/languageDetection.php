<?php
$titulo = "patrickschur/language-detection";
include '../../estructura/header.php';
?>

<div class="container p-4 my-4 d-flex justify-content-center">
    <div>
        <p class="h1" style="color:#295F98">patrickschur/language-detection</p>
        <div class="container">
            <p><a
                    href="https://packagist.org/packages/patrickschur/language-detection">patrickschur/language-detection</a>
                es una librería de PHP que se utiliza para la detección del idioma de una cadena de texto dada.</p>
            <p>Esta librería está basada en el concepto de n-gramas, secuencias de "n" elementos consecutivos de un
                conjunto de elementos, generalmente de palabras o caracteres, y se utilizan en el procesamiento de
                lenguaje natural para análisis y modelado de texto. En este caso, los n-gramas son solo de caracteres,
                con n=1 (unigrama), n=2 (bigrama), y n=3 (trigrama).</p>
            <p>A partir de un texto base, la librería utiliza modelos de n-gramas para los distintos idiomas, los cuales
                son colecciones de los n-gramas más representativos de cada idioma. Cuando se proporciona un texto para
                analizar, la librería extrae n-gramas del texto para luego compararlos con los modelos de cada idioma.
                Se cuenta cuántos coinciden, y mientras mayor sea esa coincidencia, mayor la probabilidad de que ese
                texto pertenezca a ese idioma.
            </p>
            <p>Por ejemplo, para el texto "Hola mundo" podemos generar los siguientes n-gramas:
            <ul>
                <li><b>Unigrama (n=1):</b> ["H", "o", "l", "a", " ", "M", "u", "n", "d", "o"]</li>
                <li><b>Bigrama (n=2):</b> ["Ho", "ol", "la", "a ", " M", "Mu", "un", "nd", "do"]</li>
                <li><b>Trigrama (n=3):</b> ["Hol", "ola", "la ", "a M", " Mu", "Mun", "und", "ndo"]</li>
            </ul>
            El programa luego compara estos n-gramas con los modelos de todos los idiomas previamente generados para ver
            con cuál hay mayor coincidencia.</p>
        </div>
        <div class="container">
            <p class="h2" style="color:#295F98">Requisitos:</p>
            <p>Antes de empezar hay que asegurarse de tener instalado lo siguiente:</p>
            <div class="container">
                <p class="h3" style="color:#295F98">PHP:</p>
                <p>Se debe tener PHP instalado en tu sistema. Se puede comprobar fácilmente ejecutando el comando "php
                    -v" en tu terminal. En caso de no tenerlo instalado, se deben seguir las instrucciones descriptas en
                    la <a href="https://www.php.net/manual/es/install.php">página oficial</a>. </p>
                <p class="h3" style="color:#295F98">Composer:</p>
                <p>Esta librería se gestiona mediante Composer, así que asegúrate de tener
                    Composer instalado. En caso contrario se puede instalar desde <a
                        href="https://getcomposer.org/">aquí</a>. Para comprobar si está instalado se puede hacer con el
                    comando "composer -v" en la terminal.</p>
                <p class="h3" style="color:#295F98">Extensión Multibyte String:</p>
                <p>Para que la librería funcione se requiere la extensión Multibyte String, la cual no viene habilitada
                    por defecto.
                    Para comprobar si está habilitada, se puede utilizar el comando "php -m | findstr mbstring" en la
                    terminal; si lo está, deberías ver la palabra "mbstring" en la salida.
                    <br>
                    En caso de no obtener una salida en la consola, se puede ver cómo habilitar la extensión <a
                        href="https://www.php.net/manual/es/mbstring.installation.php">aquí</a>.
                </p>
            </div>
        </div>
        <br>
        <div class="container">
            <p class="h2" style="color:#295F98">Instalación de la librería:</p>
            <p>Para instalar nuestra librería de detección de idiomas, en primer lugar debemos situarnos en la
                carpeta
                de nuestro
                proyecto. Luego, en la terminal se debe escribir el comando:</p>
            <div class="container">
                <div class="card border-light rounded-3">
                    <div class="card-header bg-secondary text-black rounded-top">
                        Comando en Terminal
                    </div>
                    <div class="card-body bg-dark text-white rounded-bottom">
                        <pre>composer require patrickschur/language-detection</pre>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <p class="h2" style="color:#295F98">Ejemplos:</p>
            <p class="text-danger">Verificar que la librería esté instalada para continuar</p>
            <a href="languageDetectionEjemplos.php" class="btn  text-white" id="botonMenu">Ir a ejemplos</a>
            <a class="btn text-white bg-dark" href="../../index.php">Volver al menú principal</a>
        </div>
    </div>
</div>
</div>
<?php
include '../../estructura/footer.php';
?>
</body>

</html>