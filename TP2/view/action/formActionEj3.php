<?php

$titulo = "Ingreso exitoso";
include '../../../estructura/header.php';
include '../../utils/funciones.php';
include '../../controller/Usuario.php';

$datos = dataSubmitted();

$user = new Usuario();
$login = $user->ingreso($datos);

?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="display-6" id="tituloEjercicio">Login</p>
            <p>
                <?php
                if ($login != null) {
                    echo "Bienvenido " . $login . "<br>";
                } else {
                    echo "Usuario o contraseña incorrecta <br>";
                }
                ?>
            </p>
            <a href="../indexEj3.php" class="btn btn-dark mt-3">Volver a la página anterior</a>
            <a class="btn mt-3 text-white" href="../../../index.php" id="botonMenu">Volver al
                menú</a>
        </div>
    </div>

    <?php
    include '../../../estructura/footer.php';
    ?>
</body>

</html>