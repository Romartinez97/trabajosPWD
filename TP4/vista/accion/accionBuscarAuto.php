<?php
$titulo = "TP4 - Buscar auto";
include '../estructura/header.php';
include_once('../../util/funciones.php');
//include_once '../../control/AbmAuto.php';
//include_once '../../control/AbmPersona.php';

$datos = data_submitted();
$objAuto = new AbmAuto();
$objPersona = new AbmPersona();
$param = ["Patente" => $datos["Patente"]];
$autoBuscado = $objAuto->buscar($param);
?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <?php if (empty($listadoAutos)): ?>
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
                        <?php foreach ($listadoAutos as $auto): ?>
                            <?php
                            $dueno = $objPersona->buscar(["NroDni" => $auto->getObjPersona()]);
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
            <a class="btn mt-3 text-white" href="../buscarAuto.php" id="botonMenu">Volver atrás</a>
            <a class="btn mt-3 text-white bg-dark" href="../../../index.php">Volver al menú principal</a>
        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>

</body>