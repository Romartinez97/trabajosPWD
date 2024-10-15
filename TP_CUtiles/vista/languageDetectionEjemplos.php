<?php
$titulo = "patrickschur/language-detection Ejemplos";
include '../../estructura/header.php';

//Verifico si existe el archivo autoload
$composer = '../../vendor/autoload.php';
$libreriaDisponible = file_exists($composer);
if ($libreriaDisponible) {
    require $composer;
    require "../modelo/Idioma.php";
}

use LanguageDetection\Language;

?>

<div class="container p-4 my-4 d-flex justify-content-center">
    <?php if (!$libreriaDisponible): ?>
        <p class="h2 text-danger">ERROR: no está instalada la librería</p>
        <p>Vuelva atrás y revise los requerimientos nuevamente</p>
        <a href="../" class="btn  text-white" id="botonMenu">Volver atrás</a>
    <?php else: ?>
        <div>
            <p class="h1" style="color:#295F98">patrickschur/language-detection</p>
            <p class="h2" style="color:#295F98">Ejemplos</p>
            <br>

            ---------------
            <br>
            <p class="h5" style="color:#295F98">Mostrando solo el primer resultado (el de mayor probabilidad):</p>
            <br>
            <div class="ms-3">
                <?php
                $idioma = new Idioma();
                $ejemplos = [
                    "La amistad es un regalo que debemos cuidar y valorar.",
                    "Traveling opens our minds and helps us understand different cultures.",
                    "Le chocolat chaud est parfait pour se réchauffer en hiver.",
                    "Freundschaft ist wichtig, um in schwierigen Zeiten Unterstützung zu finden.",
                ];
                foreach ($ejemplos as $textoEjemplo) {
                    $resultado = $idioma->mostrarPrimerResultado($textoEjemplo);
                    foreach ($resultado as $idiomaDetectado => $probabilidad) {
                        echo "<p class='h6'>Texto: " . $textoEjemplo . "</p>";
                        echo "<p>Idioma detectado: " . $idiomaDetectado . ", con una probabilidad de acierto del " . $probabilidad . "%</p>";
                    }
                }

                ?>
            </div>
            <p class="h5" style="color:#295F98">Mostrando todos los posibles idiomas y su probabilidad:</p>
            <br>
            <div class="ms-3">
                <?php
                echo "<div style='max-height: 200px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;'>";
                $ejemploMostrarTodo = ["La musica unisce le persone e crea momenti indimenticabili insieme."];
                $idioma->mostrarTodosLosResultados($ejemploMostrarTodo);
                echo "</div>";
                ?>
            </div>
            <br>
            ---------------
            <br>

            <p class="h2" style="color:#295F98">Identificar un idioma:</p>
            <form action="accion/accionLanguageDetection.php" method="post">
                <label class="form-label" for="textoIngresado">Ingrese un texto para detectar su idioma (mínimo 5
                    palabras):</label>
                <input class="form-control" type="text" name="textoIngresado" id="textoIngresado">
                <input type="submit" class="btn m-2 bg-success text-white" value="Identificar">
                <input type="reset" class="btn m-2 bg-danger text-white" value="Borrar">
            </form>
            <a class="btn mt-3 text-white" href="languageDetection.php" id="botonMenu">Volver atrás</a>
        </div>
    <?php endif; ?>
</div>
</div>
<?php
include '../../estructura/footer.php';
?>
</body>

</html>