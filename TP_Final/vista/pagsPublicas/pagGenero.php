<?php
include_once '../../util/funciones.php';
$sesion = new Session();
$genero = strtolower($_GET['genero']);

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

$titulo = "Libros de $genero";

if ($sesion->estaLogueado()) {
    include "../../estructura/headerSeguro.php";
} else {
    include "../../estructura/header.php";
}

$abmProducto = new AbmProducto();
$listaProductos = $abmProducto->buscar(null);
?>

<div id="page-container">

    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="text-center p-4">
            <p class="display-5">Libros de <?php echo $genero; ?></p>
        </div>
    </div>

    <div class="container">
        <?php
        if (!empty($listaProductos)) {
            foreach ($listaProductos as $producto):
                if ($producto->getprogenero() == $genero) {
                    ?>
                    <div class="d-flex pb-4">
                        <img src="../assets/imgs/libros/Libro1.jpg" alt="" class="imgLibroListado">
                        <div class="detLibroListado">
                            <p class="h4 txtNaranja"><?php echo $producto->getpronombre(); ?></p>
                            <p class="h5"><?php echo $producto->getprodetalle(); ?></p>
                            <p class="h6"><?php echo "$" . $producto->getproprecio(); ?></p>
                            <a href="#" class="btn btnAgregar">Agregar</a>
                        </div>
                    </div>
                    <?php
                }
            endforeach;
            ?>
        <?php }