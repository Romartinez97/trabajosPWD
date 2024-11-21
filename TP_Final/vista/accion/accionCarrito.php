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
        error_log("ID producto a eliminar: " . $idproducto);
        foreach ($_SESSION['carrito'] as $key => $item) {
            if ($item['idproducto'] == $idproducto) {
                unset($_SESSION['carrito'][$key]);
                header('Location: ../pagsPublicas/carrito.php');
                exit();
            }
        }
        break;
    case 'comprar':
        //-- seteo el horario a argentina para las columnas de fechas
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $cofecha = date("Y-m-d H:i:s");
        //foreach($datos as $dato => $valor){
        //    echo $dato."==".$valor."<br>";
        //}
        //--
        $abmcompra = new AbmCompra();
        $compras = $abmcompra->buscar(null);
        /*$ultimoid=count($compras)-1;
        $nuevoidcompra=$compras[$ultimoid]->getidcompra()+1;
        Modifiqué las dos líneas de arriba porque si no hay compras tira error,
        trata de acceder a un índice que no existe*/
        if (count($compras) > 0) {
            $ultimoid = count($compras) - 1;
            $nuevoidcompra = $compras[$ultimoid]->getidcompra() + 1;
        } else {
            $nuevoidcompra = 1;
        }
        $idusuario = $sesion->getUsuario();
        $costofinal = 0;
        for ($j = 1; $j < $datos["cantprodsunicos"] + 1; $j++) {
            $costoprod = $datos["cantidad" . $j] * $datos['proprecio' . $j];
            $costofinal += $costoprod;
        }
        //echo "<br>costo final:".$costofinal."<br>";
        //--
        $paramcompra = [
            'idcompra' => $nuevoidcompra,
            'cofecha' => $cofecha,
            'costo' => $costofinal,
            'idusuario' => $idusuario,
        ];
        //echo "<br>";
        //print_r($paramcompra);
        $abmcompra->alta($paramcompra);
        //--
        $abmcompraestado = new AbmCompraEstado();
        $comprasestado = $abmcompraestado->buscar(null);
        $ultimoidce = count($comprasestado) - 1;
        $nuevoidce = $comprasestado[$ultimoidce]->getidcompraestado() + 1;
        //--
        $paramcompraestado = [
            'idcompraestado' => $nuevoidce,
            'idcompra' => $nuevoidcompra,
            'idcompraestadotipo' => 1,
            'cefechaini' => $cofecha,
            'cefechafin' => null,
        ];
        //echo "<br>";
        //print_r($paramcompraestado);
        $abmcompraestado->alta($paramcompraestado);
        //--
        $abmcompraitem = new AbmCompraItem();
        for ($j = 1; $j < $datos["cantprodsunicos"] + 1; $j++) {
            $comprasitem = $abmcompraitem->buscar(null);
            $ultimoidci = count($comprasitem) - 1;
            $nuevoidci = $comprasitem[$ultimoidci]->getIdcompraitem() + 1;
            //--
            $paramcompraitem = [
                'idcompraitem' => $nuevoidci,
                'idproducto' => $datos["idproducto" . $j],
                'idcompra' => $nuevoidcompra,
                'cicantidad' => $datos["cantidad" . $j],
            ];
            //echo "<br>";
            //print_r($paramcompraitem);
            $abmcompraitem->alta($paramcompraitem);
        }
        //--
        /*
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
        */
        // vacio el carrito
        unset($_SESSION['carrito']);
        header('Location: ../pagsPublicas/index.php?estado=1');
        exit();
    case 'vaciar':
        unset($_SESSION['carrito']);
        header('Location: ../pagsPublicas/carrito.php');
        exit();
}

?>