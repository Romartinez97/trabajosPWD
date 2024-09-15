<?php
$titulo = "TP4 - Ver autos";
include 'estructura/header.php';
include "../configuracion.php";
include_once '../util/funciones.php';
//include_once '../control/AbmAuto.php';
//include_once '../control/AbmPersona.php';

$objAuto = new AbmAuto();
$objPersona = new AbmPersona();
$listadoAutos = $objAuto->buscar(null);
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <?php if (empty($listadoAutos)): ?>
                <p class="display-6" id="tituloEjercicio">Autos no encontrados</p>
                <p>No hay autos cargados en la base de datos.</p>
            <?php else: ?>
                <p class="display-6" id="tituloEjercicio">Listado de autos:</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Patente</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Dueño</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listadoAutos as $auto): ?>
                            <?php
                            $dueno = $objPersona->buscar(["nroDni" => $auto->getObjPersona()]);
                            $duenoNombre = $dueno ? $dueno[0]->getNombre() . " " . $dueno[0]->getApellido() : "Desconocido";
                            ?>
                            <tr>
                                <td><?php echo "Patente: " . $auto->getPatente(); ?></td>
                                <td><?php echo "Marca: " . $auto->getMarca(); ?></td>
                                <td><?php echo "Modelo: " . $auto->getModelo(); ?></td>
                                <td><?php echo "Dueño: " . $duenoNombre; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
            <a class="btn mt-3 text-white" href="index.php" id="botonMenu">Volver atrás</a>
            <a class="btn mt-3 text-white bg-dark" href="../../index.php">Volver al menú principal</a>
        </div>
    </div>

    <?php
    include 'estructura/footer.php';
    ?>

</body>


</html>