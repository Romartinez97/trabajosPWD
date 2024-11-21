<?php
include_once '../../util/funciones.php';

$abmMenuRol = new AbmMenurol();
$abmMenuRol->eliminarRegistros();

$datos = data_submitted();

if (!empty($datos)) {
    $menusPorRol = $datos['menus'];

    foreach ($menusPorRol as $idRol => $menus) {
        foreach ($menus as $idMenu) {
            $existe = $abmMenuRol->buscar(['idmenu' => $idMenu, 'idrol' => $idRol]);
            if (empty($existe)) {
                $abmMenuRol->alta(['idmenu' => $idMenu, 'idrol' => $idRol]);
            }
        }

    }

    header('Location: ../pagsRestringidas/modificarMenus.php?estado=1');
    exit();
}