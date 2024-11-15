<?php
include_once '../../util/funciones.php';
$sesion = new Session();

$titulo = "Página principal";
include "../../estructura/header.php";

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
        $genero = "Literatura Contemporanea";
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
?>

<div id="page-container">

    <?php
    echo
        "<div class=\"container-fluid d-flex align-items-center justify-content-center\">
            <div class=\"text-center p-4\">
                <p class=\"display-5\">Libros de $genero</p>
            </div>
        </div>";
    ?>

    <div class="container-fluid d-flex align-items-center justify-content-center\">
        <div class="text-center p-4">
            <p class="h3">Todos nuestros libros:</p>
        </div>
    </div>

    <div class="container">
        <div class="d-flex">
            <div class="d-flex flex-fill">
                <img src="../assets/imgs/libros/Libro1.jpg" alt="" class="imgLibroListado">
                <div class="detLibroListado">
                    <p class="h4">Titulo del libro</p>
                    <p class="h5">Autor</p>
                    <p class="h6">Precio</p>
                    <?php
                    if ($sesion->estaLogueado()) {
                        echo '<a href="#" class="btn">Agregar</a>';
                    }
                    ?>
                </div>
            </div>
            <div class="d-flex flex-fill">
                <img src="../assets/imgs/libros/Libro1.jpg" alt="" class="imgLibroListado">
                <div class="detLibroListado">
                    <p class="h4">Titulo del libro</p>
                    <p class="h5">Autor</p>
                    <p class="h6">Precio</p>
                    <?php
                    if ($sesion->estaLogueado()) {
                        echo '<a href="#" class="btn">Agregar</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    include '../../estructura/footer.php';
    ?>
</div>

</body>

</html>