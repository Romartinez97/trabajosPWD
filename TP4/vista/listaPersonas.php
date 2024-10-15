<?php
$titulo = "TP4 - Ver personas";
include '../../estructura/header.php';
include_once '../util/funciones.php';

$objPersona = new AbmPersona();
$listadoPersonas = $objPersona->buscar(null);
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <?php if (empty($listadoPersonas)): ?>
                <p class="display-6" id="tituloEjercicio">Personas no encontradas</p>
                <p>No hay personas cargadas en la base de datos.</p>
            <?php else: ?>
                <p class="display-6" id="tituloEjercicio">Listado de personas:</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha de nacimiento</th>
                            <th>Teléfono</th>
                            <th>Domicilio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listadoPersonas as $persona): ?>
                            <tr>
                                <td><?php echo $persona->getNroDni(); ?></td>
                                <td><?php echo $persona->getNombre(); ?></td>
                                <td><?php echo $persona->getApellido(); ?></td>
                                <td><?php echo $persona->getFechaNac(); ?></td>
                                <td><?php echo $persona->getTelefono(); ?></td>
                                <td><?php echo $persona->getDomicilio(); ?></td>
                                <td><a class="btn m-2 text-white" href="autosPersona.php?dni=<?php echo $persona->getNroDni(); ?>" id="botonMenu">Ver autos asociados</a></td>
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
    include '../../estructura/footer.php';
    ?>

</body>


</html>