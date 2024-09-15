<?php
$titulo = "TP4 - Nueva persona";
include '../estructura/header.php';
include_once '../../util/funciones.php';
//include_once '../control/AbmAuto.php';
//include_once '../control/AbmPersona.php';

$datos = data_submitted();

$yaExiste = true;
$personaExiste=false;
$objAuto = new AbmAuto();
$objPersona = new AbmPersona();
$param = ["patente" => $datos["patente"]];
if (empty($objAuto->buscar($param))) {
    $yaExiste = false;
}
if(!empty($objPersona->buscar(["nroDni" => $datos["dniDuenio"]]))){
    $personaExiste=true;
}
if($personaExiste && !$yaExiste){
    //$objAuto->alta($datos);
    $auto=$objAuto->buscar($param);
    $datosDuenio=$objPersona->buscar(["nroDni" => $auto[0]->getObjPersona()]);
    $duenio=$datosDuenio[0]->getNombre()." ".$datosDuenio[0]->getApellido();
}

?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <?php if(!$personaExiste){?>
                <p class="display-6" id="tituloEjercicio">ERROR</p>
                <p>No existe ninguna persona con este numero de DNI</p>
                <a class="btn mt-3 bg-success text-white" href="../nuevaPersona.php" id="botonMenu">Agregar persona</a><br>
            <?php }?>
            <?php if ($yaExiste){?>
                <p class="display-6" id="tituloEjercicio">ERROR</p>
                <p>Ya existe un auto registrado con esta patente, intente nuevamente.</p>
            <?php }  if($personaExiste && !$yaExiste){?>
                <?php  ?>
                <p class="display-6" id="tituloEjercicio">Auto ingresado</p>
                <p>Datos del auto ingresado:</p>
                <ul>
                    <li>Patente: <?php echo $datos["patente"]; ?></li>
                    <li>Marca: <?php echo $datos["marca"]; ?></li>
                    <li>Modelo: <?php echo $datos["modelo"]; ?></li>
                    <li>Dueño: <?php echo $duenio; ?></li>
                </ul>
            <?php }?>
            <a class="btn mt-3 text-white" href="../nuevoAuto.php" id="botonMenu">Volver atrás</a>
            <a class="btn mt-3 text-white bg-dark" href="../../../index.php">Volver al menú principal</a>
        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>
    
</body>