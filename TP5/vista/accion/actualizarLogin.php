<?php
$titulo = "TP5 - Actualizar usuario";
include_once '../../util/funciones.php';
include '../estructura/header.php';

$datos = data_submitted();
$objUsuario = new AbmUsuario();
$idUsuario = $datos["idusuario"];
$usuarioEncontrado = $objUsuario->obtenerUsuarioPorId($idUsuario);
print_r($usuarioEncontrado);
?>

<div class="container p-4 my-4 d-flex justify-content-center">
    <div class="div-form">
        <?php if (empty($usuarioEncontrado)): ?>
            <p class="display-6" id="tituloEjercicio">Usuario no encontrado</p>
            <p>No se encontró el usuario solicitado.</p>
        <?php else: ?>

            <p class="display-6" id="tituloEjercicio">Modificar usuario</p>
            <p class="display-6" id="tituloEjercicio">Modifique los datos del usuario a continuación:</p>

            <form form action="actualizarDatosUsuario.php" method="post" name="formActualizarUsuario"
                id="formActualizarUsuario">

                <label class="form-label" for="usnombre">Cambiar nombre (opcional):</label>
                <input class="form-control" type="text" name="usnombre" id="usnombre"
                    value="<?php echo $usuarioEncontrado->getUsNombre(); ?>">

                <label class="form-label" for="usmail">Cambiar mail (opcional):</label>
                <input class="form-control" type="email" name="usmail" id="usmail"
                    value="<?php echo $usuarioEncontrado->getUsMail(); ?>">

                <label class="form-label" for="uspass">Cambiar contraseña (opcional):</label>
                <input class="form-control" type="password" name="uspass" id="uspass">
                <input type="hidden" name="uspassactual" value="<?php echo $usuarioEncontrado->getUsPass(); ?>">

                <input type="hidden" name="idusuario" value="<?php echo $usuarioEncontrado->getIdUsuario(); ?>">

                <input type="hidden" name="usdeshabilitado" value="<?php echo $usuarioEncontrado->getUsDeshabilitado(); ?>">

                <input type="submit" class="btn mt-3 bg-success text-white" value="Actualizar datos">

            </form>

        <?php endif; ?>
        <a class="btn mt-3 text-white" href="../listarUsuario.php" id="botonMenu">Volver atrás</a>
        <a class="btn mt-3 text-white bg-dark" href="../../../index.php">Volver al menú principal</a>
    </div>
</div>

<?php
include '../estructura/footer.php';
?>

</body>


</html>