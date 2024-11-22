<?php

class AbmCompra
{

    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('idcompra', $param) && array_key_exists('cofecha', $param) && array_key_exists('idusuario', $param)) {
            $obj = new Compra();
            //--
            $objusuario = new Usuario();
            $objusuario->setidusuario($param['idusuario']);
            $objusuario->cargar();
            //--
            $obj->setear($param['idcompra'], $param['cofecha'], $param['costo'], $objusuario);
        }
        return $obj;
    }

    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['idcompra'])) {
            $obj = new Compra();
            $obj->setear($param['idcompra'], null, null, null);
        }
        return $obj;
    }

    private function seteadosCamposClave($param)
    {
        $resp = false;
        if (isset($param['idcompra'])) {
            $resp = true;
        }
        return $resp;
    }

    public function alta($param)
    {
        $resp = false;
        $elObjtCompra = $this->cargarObjeto($param);
        if ($elObjtCompra != null && $elObjtCompra->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClave($param)) {
            $elObjtCompra = $this->cargarObjetoConClave($param);
            if ($elObjtCompra != null && $elObjtCompra->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function modificacion($param)
    {
        $resp = false;
        if ($this->seteadosCamposClave($param)) {
            $elObjtCompra = $this->cargarObjeto($param);
            if ($elObjtCompra != null && $elObjtCompra->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function buscar($param)
    {
        $where = " true ";
        if ($param != null) {
            if (isset($param['idcompra'])) {
                $where .= " and idcompra='" . $param['idcompra'] . "'";
            }
            if (isset($param['cofecha'])) {
                $where .= " and cofecha='" . $param['cofecha'] . "'";
            }
            if (isset($param['costo'])) {
                $where .= " and costo='" . $param['costo'] . "'";
            }
            if (isset($param['idusuario'])) {
                $where .= " and idusuario='" . $param['idusuario'] . "'";
            }
        }
        $compra = new Compra();
        $arreglo = $compra->listar($where);
        return $arreglo;
    }

    public function eliminar($idproducto)
    {
        error_log("ID producto a eliminar: " . $idproducto);
        foreach ($_SESSION['carrito'] as $key => $item) {
            if ($item['idproducto'] == $idproducto) {
                unset($_SESSION['carrito'][$key]);
                header('Location: ../pagsPublicas/carrito.php');
                exit();
            }
        }
    }

    public function vaciar()
    {
        unset($_SESSION['carrito']);
        header('Location: ../pagsPublicas/carrito.php');
    }

    public function comprar($cantprodsunicos, $idusuario, $datos)
    {
        //foreach($datos as $dato => $valor){
        //    echo $dato." = ".$valor."<br>";
        //}
        $cofecha = date("Y-m-d H:i:s");
        $abmcompra = new AbmCompra();
        $compras = $abmcompra->buscar(null);
        if (count($compras) > 0) {
            $ultimoid = count($compras) - 1;
            $nuevoidcompra = $compras[$ultimoid]->getidcompra() + 1;
        } else {
            $nuevoidcompra = 1;
        }
        $costofinal = 0;
        for ($j = 1; $j < $cantprodsunicos + 1; $j++) {
            $costoprod = $datos["cantidad" . $j] * $datos["proprecio" . $j];
            $costofinal += $costoprod;
        }
        $paramcompra = [
            'idcompra' => $nuevoidcompra,
            'cofecha' => $cofecha,
            'costo' => $costofinal,
            'idusuario' => $idusuario,
        ];
        $abmcompra->alta($paramcompra);

        $abmcompraestado = new AbmCompraEstado();
        $comprasestado = $abmcompraestado->buscar(null);
        $ultimoidce = count($comprasestado) - 1;
        $nuevoidce = $comprasestado[$ultimoidce]->getidcompraestado() + 1;

        $paramcompraestado = [
            'idcompraestado' => $nuevoidce,
            'idcompra' => $nuevoidcompra,
            'idcompraestadotipo' => 1,
            'cefechaini' => $cofecha,
            'cefechafin' => null,
        ];
        $abmcompraestado->alta($paramcompraestado);

        $abmcompraitem = new AbmCompraItem();
        for ($j = 1; $j < $cantprodsunicos + 1; $j++) {
            $comprasitem = $abmcompraitem->buscar(null);
            $ultimoidci = count($comprasitem) - 1;
            $nuevoidci = $comprasitem[$ultimoidci]->getIdcompraitem() + 1;

            $paramcompraitem = [
                'idcompraitem' => $nuevoidci,
                'idproducto' => $datos["idproducto" . $j],
                'idcompra' => $nuevoidcompra,
                'cicantidad' => $datos["cantidad" . $j],
            ];

            $abmcompraitem->alta($paramcompraitem);
        }
    }
}