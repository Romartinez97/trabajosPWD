<?php
$titulo = "TP4 - Nueva persona";
include 'estructura/header.php';
include_once '../util/funciones.php';
//include_once '../control/AbmAuto.php';
//include_once '../control/AbmPersona.php';

$datos = data_submitted();
$datos['Telefono'] = $datos['codigoArea'] . '-' . $datos['Telefono'];
unset($datos['codigoArea']);

$yaExiste = true;
$objPersona = new AbmPersona();
$param = ["NroDni" => $datos["NroDni"]];
if (empty($objPersona->buscar($param))) {
    $objPersona->cargarObjeto($datos);
    $objPersona->alta($datos);
    $yaExiste = false;
}

?>

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
                    <li>Nombre: <?php echo $datos["Nombre"]; ?></li>
                    <li>Apellido: <?php echo $datos["Apellido"]; ?></li>
                    <li>DNI: <?php echo $datos["NroDni"]; ?></li>
                    <li>Fecha de nacimiento: <?php echo $datos["fechaNac"]; ?></li>
                    <li>Teléfono: <?php echo $datos["Telefono"]; ?></li>
                    <li>Domicilio: <?php echo $datos["Domicilio"]; ?></li>
                </ul>
            <?php endif; ?>
            <a class="btn mt-3 text-white" href="../buscarAuto.php" id="botonMenu">Volver atrás</a>
            <a class="btn mt-3 text-white bg-dark" href="../../../index.php">Volver al menú principal</a>
        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>
    
</body>