<?php
include_once '../util/funciones.php';
$sesion = new Session();
$titulo = "Pagina segura";
include "estructura/header.php";

?>

<div class="container p-4 my-4 d-flex justify-content-center">
    <div class="div-form">
        <p class="display-6" id="tituloEjercicio">Página segura</p>
        <p class="h4">Bienvenido
            <?php
            $objUsuario = $sesion->getUsuario();
            if (!empty($objUsuario)) {
                echo $objUsuario->getUsNombre();
            } else {
                echo "Usuario no encontrado";
            }
            ?>
        </p>
        <a class="btn m-3 text-white" href="index.php" id="botonMenu">Volver atrás</a>
        <a class="btn m-3 text-white bg-dark" href="../../index.php" id="botonMenu">Volver al menú principal</a>
    </div>
</div>

<?php
include 'estructura/footer.php';
?>
</body>

</html>