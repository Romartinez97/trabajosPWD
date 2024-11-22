<?php
include_once '../../util/funciones.php';

$sesion = new Session();
$titulo = "Acción carrito";

$datos = data_submitted();

//foreach($datos as $dato => $valor){
//    echo $dato." = ".$valor."<br>";
//}

$accion = $datos['accion'];
$cantprodsunicos = $datos['cantprodsunicos'];
$idusuario = $sesion->getUsuario();

$AbmCompra = new AbmCompra();
$AbmUsuario = new AbmUsuario();

switch ($accion) {
    case 'eliminar':
        $AbmCompra->eliminar($datos);
        break;
    case 'comprar':
        $AbmCompra->comprar($cantprodsunicos, $idusuario, $datos);
        //Envío de mail
        $datos = $AbmUsuario->datosUsuarioParaCorreo($idusuario);
        $mail = new CustomPHPMailer();
        $mail->enviarMail($datos['nombreCliente'], $datos['mailCliente'], 1);
        // vacio el carrito
        $AbmCompra->vaciar();
        header('Location: ../pagsPublicas/index.php?estado=1');
        exit();
    case 'vaciar':
        $AbmCompra->vaciar();
        exit();
}

?>