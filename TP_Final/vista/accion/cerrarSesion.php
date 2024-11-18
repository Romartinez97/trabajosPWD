<?php
include_once '../../util/funciones.php';
$sesion=new Session();
$sesion->cerrar();
header("Location: ../pagsPublicas/index.php");
exit();
?>