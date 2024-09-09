<?php

$titulo = "TP1 - Ejercicio 2";
include '../estructura/header.php';
include "../../utils/funciones.php";
include "../../controller/HorasSemanales.php";

$datos = dataSubmitted();
$horasSemanalesObj = new HorasSemanales($datos);

?>


<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="display-6 text-info">Horas de cursada de Programación Web Dinámica</p>
            <p><?php echo "Horas cada lunes: " . $horasSemanalesObj->getHorasLunes() . "hs."; ?></p>
            <p><?php echo "Horas cada martes: " . $horasSemanalesObj->getHorasMartes() . "hs."; ?></p>
            <p><?php echo "Horas cada miércoles: " . $horasSemanalesObj->getHorasMiercoles() . "hs."; ?></p>
            <p><?php echo "Horas cada jueves: " . $horasSemanalesObj->getHorasJueves() . "hs."; ?></p>
            <p><?php echo "Horas cada viernes: " . $horasSemanalesObj->getHorasViernes() . "hs."; ?></p>
            <p><?php echo "<b>Horas totales cada semana:<b> " . $horasSemanalesObj->getTotalHoras() . "hs."; ?></p>
            <a href="../indexEj2.php" class="btn btn-dark mt-3">Volver a la página anterior</a>
            <a class="btn mt-3 text-white" href="../../../index.php" id="botonMenu">Volver al
                menú</a>
        </div>
    </div>

    <?php
    include '../estructura/footer.php';
    ?>

</body>

</html>