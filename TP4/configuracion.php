<?php

//header('Content-Type: text/html; charset=utf-8');
//header('Cache-Control: no-cache, must-revalidate');

$PROYECTO='xampp/htdocs/trabajosPWD/TP4';

$ROOT=$_SERVER['DOCUMENT_ROOT']."/$PROYECTO/";

include_once($ROOT.'util/funciones.php');

$_SESSION['ROOT']=$ROOT;

?>