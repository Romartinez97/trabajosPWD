<?php

class AbmUsuariorol{
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Usuariorol
     */
    private function cargarObjeto($param){
        $obj=null;
        if(array_key_exists('idusuario', $param)&& array_key_exists('idrol', $param)){
            $obj=new Usuariorol();
            $obj->setear($param['idusuario'], $param['idrol']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Usuariorol
     */
    private function cargarObjetoConClave($param){
        $obj=null;
        if(isset($param['idusuario']) && isset($param['idrol'])){
            $obj=new Usuariorol();
            $obj->setear($param['idusuario'], $param['idrol']);
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
        if(isset($param['idusuario']) && isset($param['idrol'])){
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
        $elObjtUsuariorol=$this->cargarObjeto($param);
        if($elObjtUsuariorol!=null && $elObjtUsuariorol->insertar()){
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
            $elObjtUsuariorol=$this->cargarObjetoConClave($param);
            if($elObjtUsuariorol!=null && $elObjtUsuariorol->eliminar()){
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
            $elObjtUsuariorol=$this->cargarObjeto($param);
            if($elObjtUsuariorol!=null && $elObjtUsuariorol->modificar()){
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
            if(isset($param['idusuario'])){
                $where.=" and idusuario=".$param['idusuario'];
            }
            if(isset($param['idrol'])){
                $where.=" and idrol=".$param['idrol'];
            }
        }
        $usuariorol=new Usuariorol();
        $arreglo=$usuariorol->listar($where);
        return $arreglo;
    }
}