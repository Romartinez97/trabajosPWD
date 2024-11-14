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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <style>
        #navbar {
            background-color: #A5B68D;
        }
    </style>
</head>


<body>
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top" id="navbar">
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
                                <li><a class="dropdown-item" href="#">Aventura</a></li>
                                <li><a class="dropdown-item" href="#">Ciencia ficción</a></li>
                                <li><a class="dropdown-item" href="#">Fantasía</a></li>
                                <li><a class="dropdown-item" href="#">Contemporánea</a></li>
                                <li><a class="dropdown-item" href="#">Historia</a></li>
                                <li><a class="dropdown-item" href="#">Infantil</a></li>
                                <li><a class="dropdown-item" href="#">Poesía</a></li>
                                <li><a class="dropdown-item" href="#">Romance</a></li>
                                <li><a class="dropdown-item" href="#">Terror</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="contacto.php" role="button">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="ms-auto">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="login.php">Ingresar</a></li>
                    <li class="nav-item"><a class="btn rounded-pill btn-dark py-2 px-4" href="registro.php">Registrarse</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>