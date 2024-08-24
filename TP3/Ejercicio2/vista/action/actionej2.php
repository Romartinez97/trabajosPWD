<?php

include "../../utils/funciones.php";
include "../../control/archivotxt.php";

$datos=datos_submitted();

$archivotxt=new Archivotxt();

$contArchivo=$archivotxt->textoArchivo($datos);
$dir=$archivotxt->getDir();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/ej2.css">
    <title>texto</title>
</head>
<body>
    <div class="file">
        <h1>Estado de archivo: </h1><br><br>
        <textarea name="archivotxt" id="archivotxt" cols="60" rows="20">
            <?php
                if($contArchivo != 1){
                    echo $contArchivo;
                }else{
                    echo file_get_contents($dir.$datos["texto"]["name"]);
                }
            ?>
        </textarea><br>
        <a href="../ej2.php">VOLVER</a>
    </div>
    
</body>
</html>