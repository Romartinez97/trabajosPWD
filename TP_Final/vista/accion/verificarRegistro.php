<?php
include_once '../../util/funciones.php';
$sesion=new Session();
//---
$datos=data_submitted();
$nombre=$datos['usnombre'];
$mail=$datos['usmail'];
$pass=md5($datos['uspass']);
//---
$usuario=new AbmUsuario();
$usuarios=$usuario->buscar(null);
$ultimoid=count($usuarios)-1;
$nuevoid=$usuarios[$ultimoid]->getidusuario()+1;
//---
$param=[
    'idusuario' => $nuevoid,
    'usnombre' => $nombre,
    'uspass' => $pass,
    'usmail' => $mail,
    'usdeshabilitado' => '2024-01-01 00:00:00'
];
$usuario->alta($param);
//---
$objur=new AbmUsuariorol();
$paramUR=[
    'idusuario' => $nuevoid,
    'idrol' => 2 //cliente por defecto(?)
];
$objur->alta($paramUR);
header("Location: ../pagsPublicas/login.php?regis=1");