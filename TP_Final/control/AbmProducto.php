<?php

class AbmProducto
{

    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('idproducto', $param) && array_key_exists('pronombre', $param) && array_key_exists('prodetalle', $param) && array_key_exists('procantstock', $param) && array_key_exists('progenero', $param) && array_key_exists('proprecio', $param)) {
            $obj = new Producto();
            $obj->setear($param['idproducto'], $param['pronombre'], $param['prodetalle'], $param['procantstock'], $param['progenero'], $param['proprecio']);
        }
        return $obj;
    }


    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['idproducto'])) {
            $obj = new Producto();
            $obj->setear($param['idproducto'], null, null, null, null, null);
        }
        return $obj;
    }

    private function seteadosCamposClave($param)
    {
        $resp = false;
        if (isset($param['idproducto'])) {
            $resp = true;
        }
        return $resp;
    }

    public function alta($param)
    {
        $resp = false;
        $elObjtProducto = $this->cargarObjeto($param);
        if ($elObjtProducto != null && $elObjtProducto->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClave($param)) {
            $elObjtProducto = $this->cargarObjetoConClave($param);
            if ($elObjtProducto != null && $elObjtProducto->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function modificacion($param)
    {
        $resp = false;
        if ($this->seteadosCamposClave($param)) {
            $elObjtProducto = $this->cargarObjeto($param);
            if ($elObjtProducto != null && $elObjtProducto->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function buscar($param)
    {
        $where = " true ";
        if ($param != null) {
            if (isset($param['idproducto'])) {
                $where .= " and idproducto='" . $param['idproducto'] . "'";
            }
            if (isset($param['pronombre'])) {
                $where .= " and pronombre='" . $param['pronombre'] . "'";
            }
            if (isset($param['prodetalle'])) {
                $where .= " and prodetalle='" . $param['prodetalle'] . "'";
            }
            if (isset($param['procantstock'])) {
                $where .= " and procantstock='" . $param['procantstock'] . "'";
            }
            if (isset($param['progenero'])) {
                $where .= " and progenero='" . $param['progenero'] . "'";
            }
            if (isset($param['proprecio'])) {
                $where .= " and proprecio='" . $param['proprecio'] . "'";
            }
        }
        $producto = new Producto();
        $arreglo = $producto->listar($where);
        return $arreglo;
    }

    public function generarProductos($cantidad)
    {
        $customFaker = new CustomFaker();
        $seGeneraronLibros = $customFaker->generarLibros($cantidad);
        return $seGeneraronLibros;
    }

    public function actualizarStock($cantlibros, $idprod, $cantprod)
    {
        for ($k = 1; $k < $cantlibros + 1; $k++) {
            if ($cantlibros == 1) {
                $k = "";
            }
            $param = ["idproducto" => $idprod . $k];
            $productos = $this->buscar($param);
            $producto = $productos[0];
            $nuevostock = $producto->getprocantstock() + $cantprod . $k;
            $paramnuevostock = [
                'idproducto' => $producto->getidproducto(),
                'pronombre' => $producto->getpronombre(),
                'prodetalle' => $producto->getprodetalle(),
                'procantstock' => $nuevostock,
                'progenero' => $producto->getprogenero(),
                'proprecio' => $producto->getproprecio(),
            ];
            $this->modificacion($paramnuevostock);
            if ($cantlibros == 1) {
                $k = $cantlibros;
            }
        }
    }
}