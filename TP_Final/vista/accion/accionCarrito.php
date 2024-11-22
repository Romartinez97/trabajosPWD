<?php
include_once '../../util/funciones.php';

$sesion = new Session();
$titulo = "Acción carrito";

$datos = data_submitted();

$accion = $datos['accion'];
$idproducto = $datos['idproducto'];
$cantprodunicos = $datos['cantprodsunicos'];
$proprecio = $datos['proprecio'];
$cantidad = $datos['cantidad'];
$idproducto = $datos['idproducto'];
$idusuario = $sesion->getUsuario();

$AbmCompra = new AbmCompra();
$AbmUsuario = new AbmUsuario();

switch ($accion) {
    case 'eliminar':
        $AbmCompra->eliminar($datos);
        break;
    case 'comprar':
        $AbmCompra->comprar($cantprodsunicos, $proprecio, $cantidad, $idusuario, $idproducto);
        //Envío de mail
        $datos = $AbmUsuario->datosUsuarioParaCorreo($idusuario);
        $mail = new CustomPHPMailer();
        $mail->enviarMail($datos['nombreCliente'], $datos['mailCliente'], 1);
        //Vacio el carrito
        $AbmCompra->vaciar();
        header('Location: ../pagsPublicas/index.php?estado=1');
        exit();
    case 'vaciar':
        $AbmCompra->vaciar();
        exit();
}

?>