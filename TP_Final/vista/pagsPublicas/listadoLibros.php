<?php
include_once '../../util/funciones.php';
$sesion = new Session();

$titulo = "Listado de libros";
if ($sesion->estaLogueado()) {
    include "../../estructura/headerSeguro.php";
} else {
    include "../../estructura/header.php";
}

$abmProducto = new AbmProducto();
$listaProductos = $abmProducto->buscar(null);
function arreglarNombreGenero($genero)
{
    switch ($genero) {
        case "aventura":
            $genero = "Aventura";
            break;
        case "cienciaficcion":
            $genero = "Ciencia Ficción";
            break;
        case "fantasia":
            $genero = "Fantasía";
            break;
        case "contemporanea":
            $genero = "Literatura Contemporánea";
            break;
        case "historia":
            $genero = "Historia";
            break;
        case "infantil":
            $genero = "Literatura Infantil";
            break;
        case "poesia":
            $genero = "Poesía";
            break;
        case "romance":
            $genero = "Romance";
            break;
        case "terror":
            $genero = "Terror";
            break;
    }
}

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
            <p class="display-5">Todos nuestros libros</p>
        </div>
    </div>

    <div class="container">
        <div class="text-center pb-4">
            <?php if ($mensaje) { ?>
                <div class="alert alert-warning" role="alert">
                    <b><?php echo $mensaje; ?></b>
                </div>
            <?php } ?>
        </div>

        <?php
        if (!empty($listaProductos)) {
            foreach ($listaProductos as $producto): ?>
                <div class="d-flex pb-4">
                    <img src="../assets/imgs/libros/<?php echo $producto->getidproducto(); ?>.jpg" alt=""
                        class="imgLibroListado">
                    <div class="detLibroListado">
                        <form action="carrito.php" method="post">
                            <p class="h4 txtNaranja"><?php echo $producto->getpronombre(); ?></p>
                            <p class="h5"><?php echo $producto->getprodetalle(); ?></p>
                            <p class="h5"><?php echo "Género: " . $producto->getprogenero(); ?></p>
                            <p class="h6"><?php echo "$" . $producto->getproprecio(); ?></p>
                            <input type="hidden" name="idproducto" value="<?php echo $producto->getidproducto(); ?>">
                            <input type="hidden" name="origen" value="listadoLibros">
                            <input type="submit" class="btn btnRegistro" value="Agregar al carrito">
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php } else { ?>
            <div class="d-flex pb-4">
                <p class="h4 txtNaranja">No hay stock de libros</p>
            </div>
        </div>
    <?php } ?>
</div>

<?php
include '../../estructura/footer.php';
?>
</div>

</body>

</html>