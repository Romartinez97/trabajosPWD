<?php
$titulo = "TP4 - Buscar auto";
include '../../../estructura/header.php';
include "../../configuracion.php";
include_once('../../util/funciones.php');

$datos = data_submitted();
$objAuto = new AbmAuto();
$objPersona = new AbmPersona();
$param = ["patente" => $datos["patente"]];
$autoBuscado = $objAuto->buscar($param);
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <?php if (empty($autoBuscado)): ?>
                <p class="display-6" id="tituloEjercicio">Auto no encontrado</p>
                <p>No se encontró un auto registrado con esa patente.</p>
            <?php else: ?>
                <p class="display-6" id="tituloEjercicio">Auto encontrado</p>
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
                            <?php
                            $duenio = $objPersona->buscar(["nroDni" => $autoBuscado[0]->getObjPersona()]);
                            $duenioNombre = $duenio ? $duenio[0]->getNombre() . " " . $duenio[0]->getApellido() : "Desconocido";
                            ?>
                            <tr>
                                <td><?php echo $autoBuscado[0]->getPatente(); ?></td>
                                <td><?php echo $autoBuscado[0]->getMarca(); ?></td>
                                <td><?php echo $autoBuscado[0]->getModelo(); ?></td>
                                <td><?php echo $duenioNombre; ?></td>
                            </tr>
                    </tbody>
                </table>
            <?php endif; ?>
            <a class="btn mt-3 text-white" href="../buscarAuto.php" id="botonMenu">Volver atrás</a>
            <a class="btn mt-3 text-white bg-dark" href="../../../index.php">Volver al menú principal</a>
        </div>
    </div>

    <?php
    include '../../../estructura/footer.php';
    ?>

</body>