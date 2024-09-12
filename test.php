<?php
// Prueba de conexión a la base de datos
include 'TP4/configuracion.php';
include 'TP4/modelo/conector/BaseDatosPDO.php';

try {
    $db = new BaseDatosPDO();
    echo "Conexión exitosa a la base de datos.";
} catch (Exception $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>