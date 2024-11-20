<?php
include_once '../../util/funciones.php';
$sesion = new Session();
$genero = strtolower($_GET['genero']);

function arreglarNombreGenero($genero)
{
    switch ($genero) {
        case "aventura":
            $genero = "Aventura";
            return $genero;
        case "cienciaficcion":
            $genero = "Ciencia Ficción";
            return $genero;
        case "fantasia":
            $genero = "Fantasía";
            return $genero;
        case "contemporanea":
            $genero = "Literatura Contemporánea";
            return $genero;
        case "historia":
            $genero = "Historia";
            return $genero;
        case "infantil":
            $genero = "Literatura Infantil";
            return $genero;
        case "poesia":
            $genero = "Poesía";
            return $genero;
        case "romance":
            $genero = "Romance";
            return $genero;
        case "terror":
            $genero = "Terror";
            return $genero;
    }
}

$titulo = "Libros de " . arreglarNombreGenero($genero);

if ($sesion->estaLogueado()) {
    include "../../estructura/headerSeguro.php";
} else {
    include "../../estructura/header.php";
}

$abmProducto = new AbmProducto();
$listaProductos = $abmProducto->buscar(null);

$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';

if ($mensaje == 1) {
    $mensaje = "El producto ya se encuentra en el carrito, puede modificar la cantidad ingresando al mismo.";
} elseif ($mensaje == 2) {
    $mensaje = "Producto agregado al carrito.";
}
?>

<div id="page-container">

    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="text-center p-4">
            <p class="display-5">Libros de <?php echo arreglarNombreGenero($genero); ?></p>
        </div>
    </div>

    <div class="container">
        <!-- Mensaje de alerta si ya se agregó el ítem -->
        <div class="text-center pb-4">
            <?php if ($mensaje) { ?>
                <div class="alert alert-warning" role="alert">
                    <b><?php echo $mensaje; ?></b>
                </div>
            <?php } ?>
        </div>

        <?php
        if (!empty($listaProductos)) {
            foreach ($listaProductos as $producto):
                if ($producto->getprogenero() == arreglarNombreGenero($genero)) {
                    ?>
                    <div class="d-flex pb-4">
                        <img src="../assets/imgs/libros/<?php echo $producto->getidproducto() ?>.jpg" alt=""
                            class="imgLibroListado">
                        <div class="detLibroListado">
                            <form action="carrito.php" method="post">
                                <p class="h4 txtNaranja"><?php echo $producto->getpronombre(); ?></p>
                                <p class="h5"><?php echo $producto->getprodetalle(); ?></p>
                                <p class="h6"><?php echo "$" . $producto->getproprecio(); ?></p>
                                <input type="hidden" name="idproducto" value="<?php echo $producto->getidproducto(); ?>">
                                <input type="hidden" name="pronombre" value="<?php echo $producto->getpronombre(); ?>">
                                <input type="hidden" name="proprecio" value="<?php echo $producto->getproprecio(); ?>">
                                <input type="hidden" name="origen" value="pagGenero">
                                <input type="hidden" name="genero" value="<?php echo $genero; ?>">
                                <input type="submit" class="btn btnAgregar" value="Agregar al carrito">
                            </form>
                        </div>
                    </div>
                    <?php
                }
            endforeach;
            ?>
        <?php } else { ?>
            <div class="d-flex pb-4">
                <p class="h4 txtNaranja">No hay stock de libros de <?php echo $genero; ?></p>
            </div>
        </div>
    <?php } ?>
</div>

</div>

<?php
include '../../estructura/footer.php';
?>
</body>

</html>