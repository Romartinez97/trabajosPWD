<?php

class AbmCompraestado{
    private function cargarObjeto($param){
        $obj=null;
        if(array_key_exists('idcompraestado', $param)&& array_key_exists('idcompra', $param)&& array_key_exists('idcompraestadotipo', $param)&& array_key_exists('cefechaini', $param)&& array_key_exists('cefechafin', $param)){
            $obj=new Compraestado();
            //--
            $objcompra=new Compra();
            $objcompra->setidcompra($param['idcompra']);
            $objcompra->cargar();
            //--
            $objcet=new Compraestadotipo();
            $objcet->setidcompraestadotipo($param['idcompraestadotipo']);
            $objcet->cargar();
            //--
            $obj->setear($param['idcompraestado'], $objcompra, $objcet, $param['cefechaini'], $param['cefechafin']);
        }
        return $obj;
    }

    private function cargarObjetoConClave($param){
        $obj=null;
        if(isset($param['idcompraestado'])){
            $obj=new Compraestado();
            $obj->setear($param['idcompraestado'], null, null, null, null);
        }
        return $obj;
    }

    private function seteadosCamposClave($param){
        $resp=false;
        if(isset($param['idcompraestado'])){
            $resp=true;
        }
        return $resp;
    }

    public function alta($param){
        $resp=false;
        $elObjtCompraestado=$this->cargarObjeto($param);
        if($elObjtCompraestado!=null && $elObjtCompraestado->insertar()){
            $resp=true;
        }
        return $resp;
    }

    public function baja($param){
        $resp=false;
        if($this->seteadosCamposClave($param)){
            $elObjtCompraestado=$this->cargarObjetoConClave($param);
            if($elObjtCompraestado!=null && $elObjtCompraestado->eliminar()){
                $resp=true;
            }
        }
        return $resp;
    }

    public function modificacion($param){
        $resp=false;
        if($this->seteadosCamposClave($param)){
            $elObjtCompraestado=$this->cargarObjeto($param);
            if($elObjtCompraestado!=null && $elObjtCompraestado->modificar()){
                $resp=true;
            }
        }
        return $resp;
    }

    public function buscar($param){
        $where=" true ";
        if($param!=null){
            if(isset($param['idcompraestado'])){
                $where.=" and idcompraestado='".$param['idcompraestado']."'";
            }
            if(isset($param['idcompra'])){
                $where.=" and idcompra='".$param['idcompra']."'";
            }
            if(isset($param['idcompraestadotipo'])){
                $where.=" and idcompraestadotipo='".$param['idcompraestadotipo']."'";
            }
            if(isset($param['cefechaini'])){
                $where.=" and cefechaini='".$param['cefechaini']."'";
            }
            if(isset($param['cefechafin'])){
                $where.=" and cefechafin='".$param['cefechafin']."'";
            }
        }
        $compraestado=new Compraestado();
        $arreglo=$compraestado->listar($where);
        return $arreglo;
    }
}