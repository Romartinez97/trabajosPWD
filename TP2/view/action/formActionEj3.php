<?php

$titulo = "TP2 - Ejercicio 3";
include '../estructura/header.php';
include '../../utils/funciones.php';
include '../../controller/Usuario.php';

$datos=dataSubmitted();
$usuarios=[
    ["usuario" => "pedro182", "clave" => "12345678a"],
    ["usuario" => "usuarioGenerico", "clave" => "c0ntraseña"],
    ["usuario" => "ISSPEED", "clave" => "applejuice98"],
    ["usuario" => "Laura", "clave" => "pedcoNeuquen8"],
];

$user= new Usuario();
$login = $user->ingreso($datos, $usuarios);

$titulo = "Ingreso exitoso";
include '../estructura/header.php';


?>

<body>
    <div class="login">
        <h1>Login</h1>
        <p>
            <?php
            if($login != null){
                echo "Bienvenido ".$login."<br>";
            }else{
                echo "Usuario o contraseña incorrecta <br>";
            }
            ?>
        </p>
        <a href="../indexEj3.php" class="btn btn-dark mt-3">Volver a la página anterior</a>
        <a class="btn mt-3 text-white botonMenu" href="../../../index.php" id="botonMenu">Volver al
                menú</a>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>
</body>
</html>