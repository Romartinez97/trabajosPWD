<?php
$titulo = "TP4 - Modificar datos persona";
include '../estructura/header.php';
include "../../configuracion.php";
include_once('../../util/funciones.php');
//include_once '../../control/AbmAuto.php';
//include_once '../../control/AbmPersona.php';

$datos = data_submitted();
$objPersona = new AbmPersona();
$param = ["nroDni" => $datos["dni"]];
if ($personaBuscada = $objPersona->buscar($param)) {
    $nroDni = $personaBuscada[0]->getNroDni();
    $nombre = $personaBuscada[0]->getNombre();
    $apellido = $personaBuscada[0]->getApellido();
    $fechaNac = $personaBuscada[0]->getFechaNac();
    $telefono = $personaBuscada[0]->getTelefono();
    $domicilio = $personaBuscada[0]->getDomicilio();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <?php if (empty($autoBuscado)): ?>
                <p class="display-6" id="tituloEjercicio">Persona no encontrada</p>
                <p>No se encontró una persona registrada con ese DNI.</p>
            <?php else: ?>
                <p class="display-6" id="tituloEjercicio">Persona encontrada</p>
                <p class="display-6" id="tituloEjercicio">En caso de desearlo, puede modificar los datos personales:</p>

                <form form action="accion/actualizarDatosPersona.php" method="post" name="formActualizarPersona"
                    id="formActualizarPersona">

                    <label class="form-label" for="nroDni">DNI:</label>
                    <input class="form-control" type="text" name="nroDni" id="nroDni" value="<?php echo $nroDni; ?>" disabled>

                    <label class="form-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>">

                    <label class="form-label" for="apellido">Apellido:</label>
                    <input class="form-control" type="text" name="apellido" id="apellido" value="<?php echo $apellido; ?>">

                    <label class="form-label" for="fechaNac">Fecha de nacimiento:</label>
                    <input class="form-control" type="date" name="fechaNac" id="fechaNac" value="<?php echo $fechaNac; ?>">

                    <label class="form-label" for="telefono">Teléfono:</label>
                    <input class="form-control" type="text" name="telefono" id="telefono" value="<?php echo $telefono; ?>">

                    <label class="form-label" for="domicilio">Domicilio:</label>
                    <input class="form-control" type="text" name="domicilio" id="domicilio" value="<?php echo $nombre; ?>">
                </form>
            <?php endif; ?>
            <a class="btn mt-3 text-white" href="../buscarPersona.php" id="botonMenu">Volver atrás</a>
            <a class="btn mt-3 text-white bg-dark" href="../../../index.php">Volver al menú principal</a>
        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>

</body>