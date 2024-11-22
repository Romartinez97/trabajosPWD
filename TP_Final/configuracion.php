<?php
$PROYECTO='/trabajosPWD/TP_Final';
$ROOT=$_SERVER['DOCUMENT_ROOT'].$PROYECTO.'/';
include_once 'util/funciones.php';
$ROOT=str_replace('\\', '/', $ROOT);
$GLOBALS['ROOT']=$ROOT;

date_default_timezone_set("America/Argentina/Buenos_Aires");
?>