<?php
if (session_status() == PHP_SESSION_NONE) {
    $sesion = new Session();
}

//Verifico si el usuario está logueado y si tiene permisos para acceder a la página
if (!$sesion->esPaginaPublica()) {
    if (!$sesion->puedeIngresar()) {
        exit();
    }
}

//Para actualizar la cantidad de items del carrito
$totalProductos = 0;
if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $item) {
        $totalProductos += $item['cantidad'];
    }
}

$idRolActual = $sesion->getRol();
$abmMenuRol = new AbmMenurol();
$menus = $abmMenuRol->buscar(['idrol' => $idRolActual]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $titulo ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>
    <script src="../assets/js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        nav {
            background-color: #A5B68D;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <div class="dropdown">
                            <button type="button" class="btn btn-link dropdown-toggle" data-bs-toggle="dropdown"
                                id="btnMenu">
                                Menú
                            </button>
                            <ul class="dropdown-menu text-center">
                                <li class="nav-item ">
                                    <a class="nav-link" href="../pagsPublicas/listadoLibros.php" role="button">Todos los
                                        libros</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../pagsPublicas/contacto.php" role="button">Contacto</a>
                                </li>
                                <?php
                                foreach ($menus as $menu) {
                                    echo '<li class="nav-item">';
                                    echo '<a class="nav-link" href="' . $menu->getObjMenu()->getMedescripcion() . '">' . $menu->getObjMenu()->getMenombre() . '</a>';
                                    echo '</li>';
                                }
                                ?>
                            </ul>

                        </div>
                    </li>
                </ul>

                <span class="navbar-brand mx-auto">
                    <a id="tituloPagina" href="/trabajosPWD/TP_Final/vista/pagsPublicas/index.php">
                        El Refugio Literario
                    </a>
                </span>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link m-1 linkPerfil" href="../pagsRestringidas/perfil.php">Perfil</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link m-1 linkPerfil" href="../accion/cerrarSesion.php">Cerrar sesión</a>
                    </li>
                    <li class="nav-item"><a href="../pagsRestringidas/carrito.php"
                            class="btn rounded-pill btn-dark py-2 px-4 m-1">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <?php if ($totalProductos > 0): ?>
                                <span><sup><?php echo $totalProductos; ?></sup></span>
                            <?php endif; ?>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>