<?php

class AbmCompra{

    private function cargarObjeto($param){
        $obj=null;
        if(array_key_exists('idcompra', $param)&& array_key_exists('cofecha', $param)&& array_key_exists('idusuario', $param)){
            $obj=new Compra();
            //--
            $objusuario=new Usuario();
            $objusuario->setidusuario($param['idusuario']);
            $objusuario->cargar();
            //--
            $obj->setear($param['idcompra'], $param['cofecha'], $objusuario);
        }
        return $obj;
    }

    private function cargarObjetoConClave($param){
        $obj=null;
        if(isset($param['idcompra'])){
            $obj=new Compra();
            $obj->setear($param['idcompra'], null, null);
        }
        return $obj;
    }

    private function seteadosCamposClave($param){
        $resp=false;
        if(isset($param['idcompra'])){
            $resp=true;
        }
        return $resp;
    }

    public function alta($param){
        $resp=false;
        $elObjtCompra=$this->cargarObjeto($param);
        if($elObjtCompra!=null && $elObjtCompra->insertar()){
            $resp=true;
        }
        return $resp;
    }

    public function baja($param){
        $resp=false;
        if($this->seteadosCamposClave($param)){
            $elObjtCompra=$this->cargarObjetoConClave($param);
            if($elObjtCompra!=null && $elObjtCompra->eliminar()){
                $resp=true;
            }
        }
        return $resp;
    }

    public function modificacion($param){
        $resp=false;
        if($this->seteadosCamposClave($param)){
            $elObjtCompra=$this->cargarObjeto($param);
            if($elObjtCompra!=null && $elObjtCompra->modificar()){
                $resp=true;
            }
        }
        return $resp;
    }

    public function buscar($param){
        $where=" true ";
        if($param!=null){
            if(isset($param['idcompra'])){
                $where.=" and idcompra='".$param['idcompra']."'";
            }
            if(isset($param['cofecha'])){
                $where.=" and cofecha='".$param['cofecha']."'";
            }
            if(isset($param['idusuario'])){
                $where.=" and idusuario='".$param['idusuario']."'";
            }
        }
        $compra=new Compra();
        $arreglo=$compra->listar($where);
        return $arreglo;
    }
}