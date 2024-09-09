<?php

$titulo = "Archivo copiado";
include '../estructura/header.php';
include "../../utils/funciones.php";
include "../../controller/Archivotxt.php";

$datos = dataSubmitted();

$archivotxt = new Archivotxt();

$contArchivo = $archivotxt->textoArchivo($datos);
$dir = $archivotxt->getDir();

?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="display-4" id="tituloEjercicio">Estado de archivo:</p>
            <textarea name="archivotxt" id="archivotxt" cols="60" rows="20">
            <?php
            if ($contArchivo != 1) {
                echo $contArchivo;
            } else {
                echo file_get_contents($dir . $datos["texto"]["name"]);
            }
            ?>
        </textarea><br>
            <a href="../indexEj2.php" class="btn btn-dark btn-block">Volver al formulario</a>
            <a class="btn m-2 text-white" href="../../../index.php" id="botonMenu">Volver al
                menú</a>
        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>

</body>

</html>