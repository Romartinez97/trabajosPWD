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

?>

<div id="page-container">

    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="text-center p-4">
            <p class="display-5">Todos nuestros libros</p>
        </div>
    </div>

    <div class="container">
        <?php
        if (!empty($listaProductos)) {
            foreach ($listaProductos as $producto): ?>
                <div class="d-flex pb-4">
                    <img src="../assets/imgs/libros/Libro1.jpg" alt="" class="imgLibroListado">
                    <div class="detLibroListado">
                        <p class="h4 txtNaranja"><?php echo $producto->getpronombre(); ?></p>
                        <p class="h5"><?php echo $producto->getprodetalle(); ?></p>
                        <p class="h5"><?php echo "Género:" . $producto->getprogenero(); ?></p>
                        <p class="h6"><?php echo "$".$producto->getproprecio(); ?></p>
                        <a href="#" class="btn btnAgregar">Agregar</a>
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