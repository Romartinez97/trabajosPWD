<?php

class AbmMenurol{

    private function cargarObjeto($param){
        $obj=null;
        if(array_key_exists('idmenu', $param)&& array_key_exists('idrol', $param)){
            $obj=new Menurol();
            //--
            $objmenu=new Menu();
            $objmenu->setidmenu($param['idmenu']);
            $objmenu->cargar();
            //--
            $objrol=new Rol();
            $objrol->setidrol($param['idrol']);
            $objrol->cargar();
            //--
            $obj->setear($objmenu, $objrol);
        }
        return $obj;
    }

    private function cargarObjetoConClave($param){
        $obj=null;
        if(isset($param['idmenu']) && isset($param['idrol'])){
            $obj=new Menurol();
            //--
            $objmenu=new Menu();
            $objmenu->setidmenu($param['idmenu']);
            $objmenu->cargar();
            //--
            $objrol=new Rol();
            $objrol->setidrol($param['idrol']);
            $objrol->cargar();
            //--
            $obj->setear($objmenu, $objrol);
        }
        return $obj;
    }

    private function seteadosCamposClave($param){
        $resp=false;
        if(isset($param['idmenu']) && isset($param['idrol'])){
            $resp=true;
        }
        return $resp;
    }

    public function alta($param){
        $resp=false;
        $elObjtMenurol=$this->cargarObjeto($param);
        if($elObjtMenurol!=null && $elObjtMenurol->insertar()){
            $resp=true;
        }
        return $resp;
    }

    public function baja($param){
        $resp=false;
        if($this->seteadosCamposClave($param)){
            $elObjtMenurol=$this->cargarObjetoConClave($param);
            if($elObjtMenurol!=null && $elObjtMenurol->eliminar()){
                $resp=true;
            }
        }
        return $resp;
    }

    public function modificacion($param){
        $resp=false;
        if($this->seteadosCamposClave($param)){
            $elObjtMenurol=$this->cargarObjeto($param);
            if($elObjtMenurol!=null && $elObjtMenurol->modificar()){
                $resp=true;
            }
        }
        return $resp;
    }

    public function buscar($param){
        $where=" true ";
        if($param!=null){
            if(isset($param['idmenu'])){
                $where.=" and idmenu='".$param['idmenu']."'";
            }
            if(isset($param['idrol'])){
                $where.=" and idrol='".$param['idrol']."'";
            }
        }
        $menurol=new Menurol();
        $arreglo=$menurol->listar($where);
        return $arreglo;
    }
}