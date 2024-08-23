<?php

include "../../utils/funciones.php";
include "../../control/archivo.php";

$datos=datos_submitted();

$archivo = new Archivo();
$tipo = $archivo->verifArchivo($datos);
$tamanio = $archivo->verifTamanio($datos);
$archivoSubido= $archivo->subirArchivo($datos, $tipo, $tamanio);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/ej1.css">
    <title>Archivo</title>
</head>
<body>
    <div class="file">
        <h3>Estado de archivo:</h3><br>
        <h5><?php  echo $archivoSubido ?></h5><br>
        <a href="../ej1.php">VOLVER</a>
    </div>
</body>
</html>