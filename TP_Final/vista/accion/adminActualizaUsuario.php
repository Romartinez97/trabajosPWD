<?php
include_once "../../util/funciones.php";

$datos=data_submitted();
$objusuario=new AbmUsuario();
$objusrol=new AbmUsuarioRol();
$param=["idusuario" => $datos["id"]];
$usuario=$objusuario->buscar($param);
$usuario=$usuario[0];
$usuariorol=$objusrol->buscar($param);
$usuariorol=$usuariorol[0];
$nuevoparamus=[
    "idusuario" => $datos["id"],
    "usnombre" => $datos["usnombre"],
    "usmail" => $datos["usmail"],
    "uspass" => $usuario->getuspass(),
    "usdeshabilitado" => $usuario->getusdeshabilitado(),
];
$nuevoparamusrol=[
    "idusuario" => $datos["id"],
    "idrol" => $datos["rol"],
];
$objusuario->modificacion($nuevoparamus);
$objusrol->modificacion($nuevoparamusrol);
header("Location: ../pagsRestringidas/verUsuarios.php?usedit=1");