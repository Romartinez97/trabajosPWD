<?php
include_once '../../util/funciones.php';

$sesion = new Session();
$titulo = "Acción carrito";

if (!$sesion->estaLogueado()) {
    header('Location: ../pagsPublicas/login.php');
    exit();
}

$datos = data_submitted();
$accion = $datos['accion'];

switch ($accion) {
    case 'eliminar':
        $idproducto = $datos['idproducto'];
        foreach ($_SESSION['carrito'] as $key => $item) {
            if ($item['idproducto'] == $idproducto) {
                unset($_SESSION['carrito'][$key]);
                header('Location: ../pagsPublicas/carrito.php');
                exit();
            }
        }
    case 'comprar':
        //-- seteo el horario a argentina para las columnas de fechas
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $cofecha=date("Y-m-d H:i:s");
        print_r($datos);
        //--
        $abmcompra=new AbmCompra();
        $compras=$abmcompra->buscar(null);
        $ultimoid=count($compras)-1;
        $nuevoid=$compras[$ultimoid]->getidcompra()+1;
        $idusuario=$sesion->getUsuario();
        //--
        $paramcompra=[
            'idcompra'=> $nuevoid,
            'cofecha' => $cofecha,
            'idusuario' => $idusuario,
        ];
        break; // Agregar funcionalidad de compra ingresando a la base de datos
    case 'vaciar':
        unset($_SESSION['carrito']);
        header('Location: ../pagsPublicas/carrito.php');
        exit();
}

?>