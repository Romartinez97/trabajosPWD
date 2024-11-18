<?php

class AbmCompraestadotipo{

    private function cargarObjeto($param){
        $obj=null;
        if(array_key_exists('idcompraestadotipo', $param)&& array_key_exists('cetdescripcion', $param)&& array_key_exists('cetdetalle', $param)){
            $obj=new Compraestadotipo();
            $obj->setear($param['idcompraestadotipo'], $param['cetdescripcion'], $param['cetdetalle']);
        }
        return $obj;
    }

    private function cargarObjetoConClave($param){
        $obj=null;
        if(isset($param['idcompraestadotipo'])){
            $obj=new Compraestadotipo();
            $obj->setear($param['idcompraestadotipo'], null, null);
        }
        return $obj;
    }

    private function seteadosCamposClave($param){
        $resp=false;
        if(isset($param['idcompraestadotipo'])){
            $resp=true;
        }
        return $resp;
    }

    public function alta($param){
        $resp=false;
        $elObjtCompraestadotipo=$this->cargarObjeto($param);
        if($elObjtCompraestadotipo!=null && $elObjtCompraestadotipo->insertar()){
            $resp=true;
        }
        return $resp;
    }

    public function baja($param){
        $resp=false;
        if($this->seteadosCamposClave($param)){
            $elObjtCompraestadotipo=$this->cargarObjetoConClave($param);
            if($elObjtCompraestadotipo!=null && $elObjtCompraestadotipo->eliminar()){
                $resp=true;
            }
        }
        return $resp;
    }

    public function modificacion($param){
        $resp=false;
        if($this->seteadosCamposClave($param)){
            $elObjtCompraestadotipo=$this->cargarObjeto($param);
            if($elObjtCompraestadotipo!=null && $elObjtCompraestadotipo->modificar()){
                $resp=true;
            }
        }
        return $resp;
    }

    public function buscar($param){
        $where=" true ";
        if($param!=null){
            if(isset($param['idcompraestadotipo'])){
                $where.=" and idcompraestadotipo='".$param['idcompraestadotipo']."'";
            }
            if(isset($param['cetdescripcion'])){
                $where.=" and cetdescripcion='".$param['cetdescripcion']."'";
            }
            if(isset($param['cetdetalle'])){
                $where.=" and cetdetalle='".$param['cetdetalle']."'";
            }
        }
        $cet=new Compraestadotipo();
        $arreglo=$cet->listar($where);
        return $arreglo;
    }
}