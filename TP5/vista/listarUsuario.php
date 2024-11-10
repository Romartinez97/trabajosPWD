<?php
$titulo = "TP5 - Listado de usuarios";
include_once '../util/funciones.php';
include 'estructura/header.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensaje'])) {
    echo '<div class="alert alert-info">' . $_SESSION['mensaje'] . '</div>';
    unset($_SESSION['mensaje']);
}

$objUsuario = new AbmUsuario();
$listadoUsuarios = $objUsuario->buscar(null);
?>

<div class="container p-4 my-4 d-flex justify-content-center">
    <div class="div-form">
        <?php if (empty($listadoUsuarios)): ?>
            <p class="display-6" id="tituloEjercicio">Usuarios no encontrados</p>
            <p>No hay usuarios cargadas en la base de datos.</p>
        <?php else: ?>
            <p class="display-6" id="tituloEjercicio">Listado de usuarios:</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Mail</th>
                        <th>Rol</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listadoUsuarios as $usuario): ?>
                        <tr>
                            <td><?php echo $usuario->getUsNombre(); ?></td>
                            <td><?php echo $usuario->getUsMail(); ?></td>
                            <td><?php echo implode(', ', $objUsuario->obtenerRolesPorUsuario($usuario->getIdUsuario())); ?></td>
                            <td>
                                <form action="accion/actualizarLogin.php" method="post">
                                    <input type="hidden" name="idusuario" value="<?php echo $usuario->getIdUsuario(); ?>">
                                    <button type="submit" class="btn bg-secondary text-white" id="modificarUsuario">Modificar
                                        usuario</button>
                                </form>
                            </td>
                            <td>
                                <form action="accion/eliminarLogin.php" method="post">
                                    <input type="hidden" name="idusuario" value="<?php echo $usuario->getIdUsuario(); ?>">
                                    <button type="submit" class="btn bg-danger text-white" id="eliminarUsuario">Eliminar
                                        usuario</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <a class="btn mt-3 text-white" href="index.php" id="botonMenu">Volver atrás</a>
        <a class="btn mt-3 text-white bg-dark" href="../../index.php">Volver al menú principal</a>
    </div>
</div>

<?php
include '../../estructura/footer.php';
?>

</body>


</html>