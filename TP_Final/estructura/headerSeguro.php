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
    <script src="assets/js/validacion.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>

    <style>
        nav {
            background-color: #A5B68D;
        }
    </style>
</head>


<body>
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="/trabajosPWD/TP_Final/vista/pagsPublicas/index.php">El Refugio
                Literario</a>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown">Géneros</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="../pagsPublicas/pagGenero.php?genero=aventura">Aventura</a></li>
                                <li><a class="dropdown-item"
                                        href="../pagsPublicas/pagGenero.php?genero=cienciaFiccion">Ciencia
                                        ficción</a></li>
                                <li><a class="dropdown-item"
                                        href="../pagsPublicas/pagGenero.php?genero=contemporanea">Contemporánea</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="../pagsPublicas/pagGenero.php?genero=fantasia">Fantasía</a></li>
                                <li><a class="dropdown-item"
                                        href="../pagsPublicas/pagGenero.php?genero=historia">Historia</a></li>
                                <li><a class="dropdown-item"
                                        href="../pagsPublicas/pagGenero.php?genero=infantil">Infantil</a></li>
                                <li><a class="dropdown-item"
                                        href="../pagsPublicas/pagGenero.php?genero=poesia">Poesía</a></li>
                                <li><a class="dropdown-item"
                                        href="../pagsPublicas/pagGenero.php?genero=romance">Romance</a></li>
                                <li><a class="dropdown-item"
                                        href="../pagsPublicas/pagGenero.php?genero=terror">Terror</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../pagsPublicas/listadoLibros.php" role="button">Todos los
                                libros</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../pagsPublicas/contacto.php" role="button">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="ms-auto">
                <ul class="navbar-nav ml-auto">
                    <!--Opciones solo para usuarios con rol admin-->
                    <?php
                    if ($sesion->estaLogueado() && $sesion->getRol() == 1) {
                        ?>
                        <li class="nav-item active"><a class="nav-link m-1" href="../pagsRestringidas/verUsuarios.php">Ver
                                Usuarios</a></li>
                        <li class="nav-item active"><a class="nav-link m-1"
                                href="../pagsRestringidas/generador.php">Generador</a></li>
                        <?php
                    }
                    ?>
                    <!--Opciones solo para usuarios con rol admin o depósito-->
                    <?php
                    if ($sesion->estaLogueado() && in_array($sesion->getRol(), [1, 3])) {
                        ?>
                        <li class="nav-item active"><a class="nav-link m-1"
                                href="../pagsRestringidas/deposito.php">Depósito</a></li>
                        <li class="nav-item active"><a class="nav-link m-1"
                                href="../pagsRestringidas/verPedidos.php">ver Pedidos</a></li>
                        <?php
                    }
                    ?>
                    <li class="nav-item active"><a class="nav-link m-1" href="../pagsRestringidas/perfil.php">Perfil</a>
                    </li>
                    <li class="nav-item active"><a class="nav-link m-1" href="../accion/cerrarSesion.php">Cerrar
                            sesión</a></li>
                    <li class="nav-item"><a href="#" class="btn rounded-pill btn-dark py-2 px-4 m-1">
                            <i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>