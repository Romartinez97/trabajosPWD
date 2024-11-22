<?php
include_once '../../util/funciones.php';

$abmMenuRol = new AbmMenurol();
$abmMenuRol->eliminarRegistros();

$datos = data_submitted();

$menusPorRol = $datos['menus'];

$abmMenuRol->modificarMenus($menusPorRol);

header('Location: ../pagsRestringidas/modificarMenus.php?estado=1');
exit();
?>
