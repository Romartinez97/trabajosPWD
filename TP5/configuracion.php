<?php

$PROYECTO='/trabajosPWD/TP5';
$ROOT=$_SERVER['DOCUMENT_ROOT'].$PROYECTO.'/';

include_once 'util/funciones.php';
$ROOT=str_replace('\\', '/', $ROOT);

$_SESSION['ROOT']=$ROOT;

?>