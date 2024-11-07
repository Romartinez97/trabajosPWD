<?php

class AbmRol{
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Rol
     */
    private function cargarObjeto($param){
        $obj=null;
        if(array_key_exists('idrol', $param)&& array_key_exists('rodescripcion', $param)){
            $obj=new Rol();
            $obj->setear($param['idrol'], $param['rodescripcion']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Rol
     */
    private function cargarObjetoConClave($param){
        $obj=null;
        if(isset($param['idrol'])){
            $obj=new Rol();
            $obj->setear($param['idrol'], null);
        }
        return $obj;
    }

    /**
     * Corrobora que dentro del arreglo asociativo esten seteados
     * los campos claves
     * @param array $param
     * @return boolean
     */
    private function seteadosCamposClave($param){
        $resp=false;
        if(isset($param['idrol'])){
            $resp=true;
        }
        return $resp;
    }

    /**
     * Permite ingresar un objeto
     * @param array $param
     * @return boolean
     */
    public function alta($param){
        $resp=false;
        $elObjtRol=$this->cargarObjeto($param);
        if($elObjtRol!=null && $elObjtRol->insertar()){
            $resp=true;
        }
        return $resp;
    }

    /**
     * permite eliminar un objeto
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp=false;
        if($this->seteadosCamposClave($param)){
            $elObjtRol=$this->cargarObjetoConClave($param);
            if($elObjtRol!=null && $elObjtRol->eliminar()){
                $resp=true;
            }
        }
        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        $resp=false;
        if($this->seteadosCamposClave($param)){
            $elObjtRol=$this->cargarObjeto($param);
            if($elObjtRol!=null && $elObjtRol->modificar()){
                $resp=true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return array|null
     */
    public function buscar($param){
        $where=" true ";
        if($param!=null){
            if(isset($param['idrol'])){
                $where.=" and idrol='".$param['idrol']."'";
            }
            if(isset($param['rodescripcion'])){
                $where.=" and rodescripcion='".$param['rodescripcion']."'";
            }
        }
        $rol=new Rol();
        $arreglo=$rol->listar($where);
        return $arreglo;
    }
}