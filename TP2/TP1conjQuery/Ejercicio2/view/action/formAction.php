<?php

include "../../utils/funciones.php";
include "../../controller/HorasSemanales.php";

$datos = dataSubmitted();
$horasSemanalesObj = new HorasSemanales($datos);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP1 - Ejercicio 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

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
            <a href="../index.php" class="btn btn-primary mt-3">Volver a la página anterior</a>
        </div>
    </div>
</body>

</html>