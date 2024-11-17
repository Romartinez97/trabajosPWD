<?php
$titulo = "Eliminar usuario";
include_once '../../util/funciones.php';
include "../estructura/header.php";

$datos = data_submitted();

$objAbmUsuario = new AbmUsuario();
$idUsuario = $datos['idusuario'];
$usuarioEncontrado = $objAbmUsuario->obtenerUsuarioPorId($idUsuario);
$mensaje = $objAbmUsuario->borradoLogico($idUsuario);

?>

<div class="container p-4 my-4 d-flex justify-content-center">
    <div class="div-form">
        <p class="display-6" id="tituloEjercicio">
            <?php echo $mensaje; ?>
        </p>
        <p class="h4">
            <?php
            if ($mensaje == "Usuario eliminado correctamente.") {
                echo "El usuario " . $usuarioEncontrado->getUsNombre() . " ha sido eliminado correctamente.";
            } else {
                echo "No se ha podido eliminar al usuario " . $usuarioEncontrado->getUsNombre() . ", intente nuevamente.";
            }
            ?>
        </p>
        <a class="btn m-3 text-white" href="../../../index.php" id="botonNaranja">Volver al inicio</a>
    </div>
</div>

<?php
include '../estructura/footer.php';
?>
</body>

</html>