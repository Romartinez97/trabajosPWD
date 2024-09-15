<?php

$titulo = "TP4 - Cambio Dueño";
include '../estructura/header.php';
include_once '../../util/funciones.php';

$datos=data_submitted();
//print_r($datos);
$autoExiste=false;
$personaExiste=false;
$objAuto=new AbmAuto();
$objPersona=new AbmPersona();
$paramA=["patente" => $datos["patente"]];
$paramP=["nroDni" => $datos["dni"]];
if($auto=$objAuto->buscar($paramA)){
    $autoExiste=true;
    $id=$auto[0]->getId();
    $patente=$auto[0]->getPatente();
    $marca=$auto[0]->getMarca();
    $modelo=$auto[0]->getModelo();
}
if($persona=$objPersona->buscar($paramP)){
    $personaExiste=true;
    $duenio=$persona[0]->getNombre()." ".$persona[0]->getApellido();
}
if($autoExiste && $personaExiste){
    $paramModif=["id" => $id,
                "patente" => $patente,
                "marca" => $marca,
                "modelo" => $modelo,
                "dniDuenio" => $datos["dni"]
                ];
    $nuevoDuenio=$objAuto->modificacion($paramModif);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <?php if(!$personaExiste){?>
                <p class="display-6" id="tituloEjercicio">ERROR</p>
                <p>No existe ninguna persona registrada con este numero de DNI</p>
            <?php }?>
            <?php if (!$autoExiste){?>
                <p class="display-6" id="tituloEjercicio">ERROR</p>
                <p>No existe un auto registrado con esta patente, intente nuevamente.</p>
            <?php }  if($personaExiste && $autoExiste){?>
                <?php  ?>
                <p class="display-6" id="tituloEjercicio">Dueño cambiado</p>
                <p>Datos nuevos del auto:</p>
                <ul>
                    <li>Patente: <?php echo $datos["patente"]; ?></li>
                    <li>Marca: <?php echo $marca; ?></li>
                    <li>Modelo: <?php echo $modelo; ?></li>
                    <li>Nuevo dueño: <?php echo $duenio; ?></li>
                </ul>
            <?php }?>
            <a class="btn mt-3 text-white" href="../cambioDuenio.php" id="botonMenu">Volver atrás</a>
            <a class="btn mt-3 text-white bg-dark" href="../../../index.php">Volver al menú principal</a>
        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>
    
</body>