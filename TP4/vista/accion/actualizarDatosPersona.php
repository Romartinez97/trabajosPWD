<?php
$titulo = "TP4 - Datos actualizados";
include '../estructura/header.php';
include "../../configuracion.php";
include_once('../../util/funciones.php');
//include_once '../../control/AbmAuto.php';
//include_once '../../control/AbmPersona.php';

$datos = data_submitted();
$objPersona = new AbmPersona();
$nroDni = $datos["nroDni"];
$nombre = $datos["nombre"];
$apellido = $datos["apellido"];
$fechaNac = $datos["fechaNac"];
$telefono = $datos["telefono"];
$domicilio = $datos["domicilio"];

$paramModif = [
    "nroDni" => $datos["nroDni"],
    "nombre" => $datos["nombre"],
    "apellido" => $datos["apellido"],
    "fechaNac" => $datos["fechaNac"],
    "telefono" => $datos["telefono"],
    "domicilio" => $datos["domicilio"],
];
$objPersona->modificacion($paramModif);

//Busco a la persona de nuevo en la BD para chequear si se actualizaron los datos correctamente
$param = ["nroDni" => $datos["dni"]];
$personaBuscada = $objPersona->buscar($param);
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
                <p class="display-6" id="tituloEjercicio">Datos actualizados</p>

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
                                <td><?php echo $personaBuscada[0]->getNroDni(); ?></td>
                                <td><?php echo $personaBuscada[0]->getNombre(); ?></td>
                                <td><?php echo $personaBuscada[0]->getApellido(); ?></td>
                                <td><?php echo $personaBuscada[0]->getFechaNac(); ?></td>
                                <td><?php echo $personaBuscada[0]->getTelefono(); ?></td>
                                <td><?php echo $personaBuscada[0]->getDomicilio(); ?></td>
                            </tr>
                    </tbody>
                </table>

            <a class="btn mt-3 text-white" href="../buscarPersona.php" id="botonMenu">Volver atrás</a>
            <a class="btn mt-3 text-white bg-dark" href="../../../index.php">Volver al menú principal</a>
        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>

</body>