<?php

class AbmUsuario{
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Usuario
     */
    private function cargarObjeto($param){
        $obj=null;
        if(array_key_exists('usnombre', $param)&& array_key_exists('uspass', $param)&& array_key_exists('usmail', $param)&& array_key_exists('usdeshabilitado', $param)){
            $obj=new Usuario();
            $obj->setear($param['idusuario'], $param['usnombre'], $param['uspass'], $param['usmail'], $param['usdeshabilitado']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Usuario
     */
    private function cargarObjetoConClave($param){
        $obj=null;
        if(isset($param['idusuario'])){
            $obj=new Usuario();
            $obj->setear($param['idusuario'], null, null, null, null);
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
        if(isset($param['idusuario'])){
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
        $elObjtUsuario=$this->cargarObjeto($param);
        if($elObjtUsuario!=null && $elObjtUsuario->insertar()){
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
            $elObjtUsuario=$this->cargarObjetoConClave($param);
            if($elObjtUsuario!=null && $elObjtUsuario->eliminar()){
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
            $elObjtUsuario=$this->cargarObjeto($param);
            if($elObjtUsuario!=null && $elObjtUsuario->modificar()){
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
                $where.=" and idusuario='".$param['idusuario']."'";
            }
            if(isset($param['usnombre'])){
                $where.=" and usnombre='".$param['usnombre']."'";
            }
            if(isset($param['uspass'])){
                $where.=" and uspass='".$param['uspass']."'";
            }
            if(isset($param['usmail'])){
                $where.=" and usmail='".$param['usmail']."'";
            }
            if(isset($param['usdeshabilitado'])){
                $where.=" and usdeshabilitado='".$param['usdeshabilitado']."'";
            }
        }
        $usuario=new Usuario();
        $arreglo=$usuario->listar($where);
        return $arreglo;
    }
}