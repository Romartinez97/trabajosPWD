<?php
include_once '../../util/funciones.php';

$sesion = new Session();
$titulo = "Depósito";

if (!$sesion->estaLogueado() || ($sesion->getRol() != 'deposito' && $sesion->getRol() != 'admin')) {
    header('Location: ../pagsPublicas/login.php');
    exit();
} else {
    include "../../estructura/headerSeguro.php";
}

$abmProducto = new AbmProducto();
$listaProductos = $abmProducto->buscar(null);
?>

<div id="page-container">
    <div class="container">
        <h1 class="text-center my-4">Listado de Productos</h1>
        <?php if (!empty($listaProductos)) { ?>
            <?php foreach ($listaProductos as $producto) { ?>
                <div class="d-flex pb-4">
                    <div class="detLibroListado">
                        <form method="post" action="editarProducto.php">
                            <input type="hidden" name="idproducto" value="<?php echo $producto->getidproducto(); ?>">
                            <div class="mb-3">
                                <label for="pronombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="pronombre" name="pronombre"
                                    value="<?php echo $producto->getpronombre(); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="prodetalle" class="form-label">Detalle:</label>
                                <input type="text" class="form-control" id="prodetalle" name="prodetalle"
                                    value="<?php echo $producto->getprodetalle(); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="procantstock" class="form-label">Cantidad:</label>
                                <input type="number" class="form-control" id="procantstock" name="procantstock"
                                    value="<?php echo $producto->getprocantstock(); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="progenero" class="form-label">Género:</label>
                                <input type="text" class="form-control" id="progenero" name="progenero"
                                    value="<?php echo $producto->getprogenero(); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="proprecio" class="form-label">Precio:</label>
                                <input type="number" class="form-control" id="proprecio" name="proprecio"
                                    value="<?php echo $producto->getproprecio(); ?>" required>
                            </div>
                            <button type="submit" class="btn" id="botonVerde">Actualizar</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="d-flex pb-4">
                <p class="h4 txtNaranja">No hay stock de productos</p>
            </div>
        <?php } ?>
    </div>
</div>

<?php include '../../estructura/footer.php'; ?>