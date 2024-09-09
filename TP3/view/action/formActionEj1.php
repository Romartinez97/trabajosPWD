<?php

$titulo = "Archivo copiado";
include '../estructura/header.php';
include "../../utils/funciones.php";
include "../../controller/Archivo.php";

$datos = dataSubmitted();

$archivo = new Archivo();
$tipo = $archivo->verifArchivo($datos);
$tamanio = $archivo->verifTamanio($datos);
$archivoSubido = $archivo->subirArchivo($datos, $tipo, $tamanio);

?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="display-4" id="tituloEjercicio">Estado de archivo:</p>
            <h5><?php echo $archivoSubido ?></h5>
            <a href="../indexEj3.php" class="btn btn-dark btn-block">Volver al formulario</a>
            <a class="btn m-2 text-white" href="../../../index.php" id="botonMenu">Volver al
                menú</a>
        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>

</body>

</html>