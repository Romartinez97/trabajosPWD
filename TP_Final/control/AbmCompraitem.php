<?php

class AbmCompraitem{

    private function cargarObjeto($param){
        $obj=null;
        if(array_key_exists('idcompraitem', $param)&& array_key_exists('idproducto', $param)&& array_key_exists('idcompra', $param) && array_key_exists('cicantidad', $param)){
            $obj=new Compraitem();
            //--
            $objproducto=new Producto();
            $objproducto->setidproducto($param['idproducto']);
            $objproducto->cargar();
            //--
            $objcompra=new Compra();
            $objcompra->setidcompra($param['idcompra']);
            $objcompra->cargar();
            //--
            $obj->setear($param['idcompraitem'], $objproducto, $objcompra, $param['cicantidad']);
        }
        return $obj;
    }

    private function cargarObjetoConClave($param){
        $obj=null;
        if(isset($param['idcompraitem'])){
            $obj=new Compraitem();
            $obj->setear($param['idcompraitem'], null, null, null);
        }
        return $obj;
    }

    private function seteadosCamposClave($param){
        $resp=false;
        if(isset($param['idcompraitem'])){
            $resp=true;
        }
        return $resp;
    }

    public function alta($param){
        $resp=false;
        $elObjtCompraitem=$this->cargarObjeto($param);
        if($elObjtCompraitem!=null && $elObjtCompraitem->insertar()){
            $resp=true;
        }
        return $resp;
    }

    public function baja($param){
        $resp=false;
        if($this->seteadosCamposClave($param)){
            $elObjtCompraitem=$this->cargarObjetoConClave($param);
            if($elObjtCompraitem!=null && $elObjtCompraitem->eliminar()){
                $resp=true;
            }
        }
        return $resp;
    }

    public function modificacion($param){
        $resp=false;
        if($this->seteadosCamposClave($param)){
            $elObjtCompraitem=$this->cargarObjeto($param);
            if($elObjtCompraitem!=null && $elObjtCompraitem->modificar()){
                $resp=true;
            }
        }
        return $resp;
    }

    public function buscar($param){
        $where=" true ";
        if($param!=null){
            if(isset($param['idcompraitem'])){
                $where.=" and idcompraitem='".$param['idcompraitem']."'";
            }
            if(isset($param['idproducto'])){
                $where.=" and idproducto='".$param['idproducto']."'";
            }
            if(isset($param['idcompra'])){
                $where.=" and idcompra='".$param['idcompra']."'";
            }
            if(isset($param['cicantidad'])){
                $where.=" and cicantidad='".$param['cicantidad']."'";
            }
        }
        $compraitem=new Compraitem();
        $arreglo=$compraitem->listar($where);
        return $arreglo;
    }
}