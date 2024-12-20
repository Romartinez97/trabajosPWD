<?php
$titulo = "TP4 - Ver autos asociados";
include '../../estructura/header.php';
include_once '../util/funciones.php';

$datos=data_submitted();
$dni = $datos["dni"];
//$dni = isset($datos["dni"]) ? $datos["dni"] : null;
//$dni = isset($_GET["dni"]) ? $_GET["dni"] : null;

if ($dni) {
    $objPersona = new AbmPersona();
    $objAuto = new AbmAuto();
    $persona = $objPersona->buscar(["nroDni" => $dni]);
    $listadoAutos = $objAuto->buscar(["dniDuenio" => $dni]);
} else {
    $persona = [];
    $listadoAutos = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <?php if (empty($persona)): ?>
            <p class="display-6" id="tituloEjercicio">Persona no encontrada</p>
                <p>No se encontró una persona registrada con ese DNI en la base de datos.</p>
            <?php else: ?>
                <p class="display-6" id="tituloEjercicio">Datos de la persona:</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha de nacimiento</th>
                            <th>Teléfono</th>
                            <th>Domicilio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $persona[0]->getNroDni(); ?></td>
                            <td><?php echo $persona[0]->getNombre(); ?></td>
                            <td><?php echo $persona[0]->getApellido(); ?></td>
                            <td><?php echo $persona[0]->getFechaNac(); ?></td>
                            <td><?php echo $persona[0]->getTelefono(); ?></td>
                            <td><?php echo $persona[0]->getDomicilio(); ?></td>
                        </tr>
                    </tbody>
                </table>

                <?php if (empty($listadoAutos)): ?>
                    <p class="display-6" id="tituloEjercicio">Autos no encontrados:</p>
                    <p>No hay autos asociados a esta persona.</p>
                <?php else: ?>
                    <p class="display-6" id="tituloEjercicio">Autos asociados:</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Patente</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listadoAutos as $auto): ?>
                                <tr>
                                    <td><?php echo $auto->getPatente(); ?></td>
                                    <td><?php echo $auto->getMarca(); ?></td>
                                    <td><?php echo $auto->getModelo(); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            <?php endif; ?>
            <a class="btn mt-3 text-white" href="listaPersonas.php" id="botonMenu">Volver atrás</a>
            <a class="btn mt-3 text-white bg-dark" href="../../index.php">Volver al menú principal</a>
        </div>
    </div>

    <?php
    include '../../estructura/footer.php';
    ?>

</body>


</html>