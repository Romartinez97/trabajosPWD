<?php
include_once '../../util/funciones.php';

$sesion = new Session();
$titulo = "Modificar menús";

if (!$sesion->estaLogueado()) {
    header('Location: ../pagsPublicas/login.php');
    exit();
} else {
    $idRolActual = $sesion->getRol();
    $abmMenuRol = new AbmMenurol();
    $menusPorRol = $abmMenuRol->listarIdsMenusPorRol($idRolActual);

    $idMenuModificarMenus = 6;
    if (!in_array($idMenuModificarMenus, $menusPorRol)) {
        header('Location: ../pagsPublicas/login.php');
        exit();
    }

    include "../../estructura/headerSeguro2.php";
}

$abmRol = new AbmRol();
$abmMenu = new AbmMenu();
$abmMenuRol = new AbmMenurol();

$roles = $abmRol->buscar(null);
$menus = $abmMenu->buscar(null);

$estado = isset($_GET['estado']) ? $_GET['estado'] : '';
$mensaje = '';

if ($estado == 1) {
    $mensaje = "Menú modificado con éxito.";
}
?>

<div id="page-container">
    <div class="container">
        <h1 class="text-center my-4 display-5">Modificar Menús</h1>

        <div class="text-center pb-4">
            <?php if ($mensaje) { ?>
                <div class="alert alert-warning" role="alert">
                    <b><?php echo $mensaje; ?></b>
                </div>
            <?php } ?>
        </div>
        <div class="container px-5 py-2">
            <form action="../accion/accionModificarMenus.php" method="post">
                <div class="row">
                    <?php foreach ($roles as $rol): ?>
                        <div class="col mb-3">
                            <h3><?php echo ucfirst($rol->getrodescripcion()); ?></h3>
                            <?php foreach ($menus as $menu): ?>
                                <div class="form-check">
                                    <input class="form-check-input " type="checkbox"
                                        style="background-color:#83b33f; border-color:#83b33f;"
                                        name="menus[<?php echo $rol->getidrol(); ?>][]"
                                        value="<?php echo $menu->getidmenu(); ?>" <?php echo in_array($menu->getidmenu(), $abmMenuRol->listarIdsMenusPorRol($rol->getidrol())) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">
                                        <?php echo $menu->getmenombre(); ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button type="submit" class="btn btnAgregar mt-2 mb-5">Guardar cambios</button>
            </form>
        </div>
    </div>
</div>

<?php include '../../estructura/footer.php'; ?>
</body>

</html>