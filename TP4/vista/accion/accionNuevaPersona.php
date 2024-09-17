<?php
$titulo = "TP4 - Nueva persona";
include '../estructura/header.php';
include_once '../../util/funciones.php';
//include_once '../control/AbmAuto.php';
//include_once '../control/AbmPersona.php';

$datos = data_submitted();
$datos['telefono'] = $datos['codigoArea'] . '-' . $datos['telefono'];
unset($datos['codigoArea']);

$yaExiste = true;
$objPersona = new AbmPersona();
$param = ["nroDni" => $datos["nroDni"]];
if (empty($objPersona->buscar($param))) {
    //$objPersona->cargarObjeto($datos);
    $objPersona->alta($datos);
    $objPersona = $objPersona->buscar($datos)[0];
    $yaExiste = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <?php if ($yaExiste): ?>
                <p class="display-6" id="tituloEjercicio">ERROR</p>
                <p>Ya existe una persona registrada con ese DNI, intente nuevamente.</p>
            <?php else: ?>
                <p class="display-6" id="tituloEjercicio">Persona ingresada</p>
                <p>Datos de la persona ingresada:</p>
                <ul>
                    <li>Nombre: <?php echo $objPersona->getNombre(); ?></li>
                    <li>Apellido: <?php echo $objPersona->getApellido(); ?></li>
                    <li>DNI: <?php echo $objPersona->getNroDni(); ?></li>
                    <li>Fecha de nacimiento: <?php echo $objPersona->getFechaNac(); ?></li>
                    <li>Teléfono: <?php echo $objPersona->getTelefono(); ?></li>
                    <li>Domicilio: <?php echo $objPersona->getDomicilio(); ?></li>
                </ul>
            <?php endif; ?>
            <a class="btn mt-3 text-white" href="../nuevaPersona.php" id="botonMenu">Volver atrás</a>
            <a class="btn mt-3 text-white bg-dark" href="../../../index.php">Volver al menú principal</a>
        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>

</body>