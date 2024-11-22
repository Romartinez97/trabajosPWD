<?php

include_once '../../util/funciones.php';
$datos = data_submitted();
$response = [
    "success" => true,
    "message" => "Exito2",
];

$idpedido = $datos["idpedido"];

$abmcompraestado = new AbmCompraEstado();
$abmproducto = new AbmProducto();
$abmcompra = new AbmCompra();
$abmusuario = new AbmUsuario();
$mail = new CustomPHPMailer();



$param = [
    "idcompra" => $idpedido,
];
$compraestado = $abmcompraestado->buscar($param);
$compraestado = $compraestado[0];
$idce = $compraestado->getidcompraestado();
$fecha = date("Y-m-d H:i:s");

// Obtener idcompra usando idcompraestado
$idcompra = $compraestado->getobjcompra()->getidcompra();
// Obtener idusuario usando idcompra
$abmcompra = new AbmCompra();
$compra = $abmcompra->buscar(['idcompra' => $idcompra])[0];
$idusuario = $compra->getobjusuario()->getidusuario();
// Obtener datos del usuario usando idusuario
$datosCliente = $AbmUsuario->datosUsuarioParaCorreo($idusuario);


switch ($datos["nuevoEstado"]) {
    case "Aceptar":
        $abmcompraestado->actualizarCompra($idce, $idpedido, 2, null, $objcompraestado);
        //--actualizar stock (stock actual - stock comprado)
        for ($k = 1; $k < $datos["cantlibros"] + 1; $k++) {
            $abmproducto->actualizarStock($cantlibros, $idprod, $cantprod);

            if ($datos["cantlibros"] == 1) {
                $k = $datos["cantlibros"];
            }
        }
        // Enviar correo
        $mail->enviarMail($datosCliente['nombreCliente'], $datosCliente['mailCliente'], 2);
        break;

    case "Enviar":
        $abmcompraestado->actualizarCompra($idce, $idpedido, 3, $fecha, $objcompraestado);
        // Enviar correo  
        $mail->enviarMail($datosCliente['nombreCliente'], $datosCliente['mailCliente'], 3);
        break;

    case "Cancelar":
        $abmcompraestado->actualizarCompra($idce, $idpedido, 4, $fecha, $objcompraestado);
        // Enviar correo
        $mail->enviarMail($datosCliente['nombreCliente'], $datosCliente['mailCliente'], 4);
        //--actualizar stock(stock actual + stock cancelada)
        $abmproducto->actualizarStock($cantlibros, $idprod, $cantprod);
        break;

    default:
        $response = [
            "success" => false,
            "message" => "error de estado",
        ];
        break;
}
//
echo json_encode($response);