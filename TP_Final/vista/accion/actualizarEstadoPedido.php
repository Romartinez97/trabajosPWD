<?php

include_once '../../util/funciones.php';
$datos=data_submitted();
//foreach($datos as $dato => $valor){
//    echo"<br>".$dato."=".$valor;
//}
$idpedido=$datos["idpedido"];
$abmcompraestado=new AbmCompraEstado();
$param=[
    "idcompra" => $idpedido,
];
$compraestado=$abmcompraestado->buscar($param);
$compraestado=$compraestado[0];
$idce=$compraestado->getidcompraestado();
date_default_timezone_set("America/Argentina/Buenos_Aires");
$fecha=date("Y-m-d H:i:s");
switch($datos["nuevoEstado"]){
    case "Aceptar":
        $paramaceptar=[
            'idcompraestado' => $idce,
            'idcompra' => $idpedido,
            'idcompraestadotipo' => 2,
            'cefechaini' => $compraestado->getcefechaini(),
            'cefechafin' => null,
        ];
        $abmcompraestado->modificacion($paramaceptar);
        break;
    case "Enviar":
        $paramenviar=[
            'idcompraestado' => $idce,
            'idcompra' => $idpedido,
            'idcompraestadotipo' => 3,
            'cefechaini' => $compraestado->getcefechaini(),
            'cefechafin' => $fecha,
        ];
        $abmcompraestado->modificacion($paramenviar);
        break;
    case "Cancelar":
        $paramcancelar=[
            'idcompraestado' => $idce,
            'idcompra' => $idpedido,
            'idcompraestadotipo' => 4,
            'cefechaini' => $compraestado->getcefechaini(),
            'cefechafin' => $fecha,
        ];
        $abmcompraestado->modificacion($paramcancelar);
        break;
}
header("Location: ../pagsRestringidas/verPedidos.php");
exit;