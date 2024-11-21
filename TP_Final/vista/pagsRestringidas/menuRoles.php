<?php
include_once '../../util/funciones.php';

$sesion = new Session();
$titulo = "Menú de roles";

if (!$sesion->estaLogueado() || $sesion->getRol() != 1) {
    header('Location: ../pagsPublicas/login.php');
    exit();
} else {
    include "../../estructura/headerSeguro.php";
}

$abmMenu = new AbmMenu();
$abmRol = new AbmRol();
$abmMenuRol = new AbmMenurol();

$roles = $abmRol->buscar(null);
$menus = $abmMenu->buscar(null);