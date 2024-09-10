<?php

header('Contetn-Type: text/html; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

$PROYECTO='xampp/htdocs/TP4';

$ROOT=$_SERVER['DOCUMENT_ROOT']."/$PROYECTO/";

include_once($ROOT.'util/funciones.php');

$_SESSION['ROOT']=$ROOT;

?>