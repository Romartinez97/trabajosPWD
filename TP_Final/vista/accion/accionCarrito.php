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
        $abmcompraitem = new AbmCompraItem();
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
        $abmcompra->alta($paramcompra);

        // obtengo ID de la compra que acabo de hacer
        $nuevaCompra = $abmcompra->buscar(['cofecha' => $cofecha, 'idusuario' => $idusuario]);
        $idcomprarealizada = $nuevaCompra[0]->getIdcompra();

        // creo un compraitem por cada producto del carrito
        foreach($_SESSION['carrito'] as $item){
            $paramcompraitem=[
                'idcompraitem' => $null,
                'idproducto' => $item['idproducto'],
                'idcompra' => $idcomprarealizada,
                'cicantidad' => $item['cantidad']
            ];
            $abmcompraitem->alta($paramcompraitem);
        }

        // vacio el carrito
        unset($_SESSION['carrito']);
        header('Location: ../pagsPublicas/carrito.php?estado=1');
        exit();
        
    case 'vaciar':
        unset($_SESSION['carrito']);
        header('Location: ../pagsPublicas/carrito.php');
        exit();
}

?>