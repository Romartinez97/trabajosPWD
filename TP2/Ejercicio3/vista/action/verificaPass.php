<?php


include '../../utils/funciones.php';
include '../../control/usuario.php';

$datos=datos_submitted();
$usuarios=[
    ["usuario" => "pedro182", "clave" => "12345678a"],
    ["usuario" => "usuarioGenerico", "clave" => "c0ntraseña"],
    ["usuario" => "ISSPEED", "clave" => "applejuice98"],
    ["usuario" => "Laura", "clave" => "pedcoNeuquen8"],
];

$user= new Usuario();
$login = $user->ingreso($datos, $usuarios);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/ej3css.css">
    <title>Usuario</title>
</head>
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
        <button>
            <a href="../ej3.php">VOLVER</a>
        </button>
        
    </div>
</body>
</html>