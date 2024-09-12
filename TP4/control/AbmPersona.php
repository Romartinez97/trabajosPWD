<?php

include_once "../modelo/Persona.php";
class AbmPersona{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Persona
     */
    private function cargarObjeto($param){
        $obj=null;
        if(array_key_exists('id', $param) && array_key_exists('NroDni', $param)&& array_key_exists('Apellido', $param)&& array_key_exists('Nombre', $param)&& array_key_exists('fechaNac', $param)&& array_key_exists('Telefono', $param)&& array_key_exists('Domicilio', $param)){
            $obj=new Persona();
            $obj->setear($param['id'], $param['NroDni'], $param['Apellido'], $param['Nombre'], $param['fechaNac'], $param['Telefono'], $param['Domicilio']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Persona
     */
    private function cargarObjetoConClave($param){
        $obj=null;
        if(isset($param['id'])){
            $obj=new Persona();
            $obj->setear($param['id'], null, null, null, null, null, null);
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
        if(isset($param['id'])){
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
        $param['id']=null;
        $elObjtPersona=$this->cargarObjeto($param);
        if($elObjtPersona!=null && $elObjtPersona->insertar()){
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
            $elObjtPersona=$this->cargarObjetoConClave($param);
            if($elObjtPersona!=null && $elObjtPersona->eliminar()){
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
            $elObjtPersona=$this->cargarObjeto($param);
            if($elObjtPersona!=null && $elObjtPersona->modificar()){
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
            if(isset($param['id'])){
                $where.=" and id=".$param['id'];
            }
            if(isset($param['NroDni'])){
                $where.=" and NroDni=".$param['NroDni'];
            }
            if(isset($param['Apellido'])){
                $where.=" and Apellido=".$param['Apellido'];
            }
            if(isset($param['Nombre'])){
                $where.=" and Nombre=".$param['Nombre'];
            }
            if(isset($param['fechaNac'])){
                $where.=" and fechaNac=".$param['fechaNac'];
            }
            if(isset($param['Telefono'])){
                $where.=" and Telefono=".$param['Telefono'];
            }
            if(isset($param['Domicilio'])){
                $where.=" and Domicilio=".$param['Domicilio'];
            }
        }
        $persona=new Persona();
        $arreglo=$persona->listar($where);
        //$arreglo=Persona::listar($where);
        return $arreglo;
    }
}