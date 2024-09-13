<?php

//include_once "../modelo/Persona.php";
class AbmPersona{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Persona
     */
    private function cargarObjeto($param){
        $obj=null;
        if(array_key_exists('nroDni', $param)&& array_key_exists('apellido', $param)&& array_key_exists('nombre', $param)&& array_key_exists('fechaNac', $param)&& array_key_exists('telefono', $param)&& array_key_exists('domicilio', $param)){
            $obj=new Persona();
            $obj->setear($param['nroDni'], $param['apellido'], $param['nombre'], $param['fechaNac'], $param['Telefono'], $param['Domicilio']);
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
        if(isset($param['nroDni'])){
            $obj=new Persona();
            $obj->setear($param['nroDni'], null, null, null, null, null);
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
        if(isset($param['nroDni'])){
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
        $param['nroDni']=null;
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
            if(isset($param['nroDni'])){
                $where.=" and nroDni='".$param['nroDni']."'";
            }
            if(isset($param['apellido'])){
                $where.=" and apellido='".$param['apellido']."'";
            }
            if(isset($param['nombre'])){
                $where.=" and nombre='".$param['nombre']."'";
            }
            if(isset($param['fechaNac'])){
                $where.=" and fechaNac='".$param['fechaNac']."'";
            }
            if(isset($param['telefono'])){
                $where.=" and telefono='".$param['telefono']."'";
            }
            if(isset($param['domicilio'])){
                $where.=" and domicilio='".$param['domicilio']."'";
            }
        }
        $persona=new Persona();
        $arreglo=$persona->listar($where);
        //$arreglo=Persona::listar($where);
        return $arreglo;
    }
}