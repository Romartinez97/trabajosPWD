<?php
//include_once $_SESSION['ROOT'].'modelo/Auto.php';
//include_once $_SESSION['ROOT'].'modelo/conector/BaseDatosPDO.php';

class AbmAuto{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param){
        $obj=null;
        if(array_key_exists('patente', $param)&& array_key_exists('marca', $param)&& array_key_exists('modelo', $param)&& array_key_exists('dniDuenio', $param)){
            $obj=new Auto();
            $obj->setear($param['patente'], $param['marca'], $param['modelo'], $param['dniDuenio']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Auto
     */
    private function cargarObjetoConClave($param){
        $obj=null;
        if(isset($param['patente'])){
            $obj=new Auto();
            $obj->setear($param['patente'], null, null, null);
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
        if(isset($param['patente'])){
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
        //$param['patente']=null;
        $elObjtAuto=$this->cargarObjeto($param);
        if($elObjtAuto!=null && $elObjtAuto->insertar()){
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
            $elObjtAuto=$this->cargarObjetoConClave($param);
            if($elObjtAuto!=null && $elObjtAuto->eliminar()){
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
            $elObjtAuto=$this->cargarObjeto($param);
            if($elObjtAuto!=null && $elObjtAuto->modificar()){
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
            if(isset($param['patente'])){
                $where.=" and patente='".$param['patente']."'";
            }
            if(isset($param['marca'])){
                $where.=" and marca='".$param['marca']."'";
            }
            if(isset($param['modelo'])){
                $where.=" and modelo='".$param['modelo']."'";
            }
            if(isset($param['dniDuenio'])){
                $where.=" and dniDuenio='".$param['dniDuenio']."'";
            }
        }
        $auto=new Auto();
        $arreglo=$auto->listar($where);
        //$arreglo=Auto::listar($where);
        return $arreglo;
    }
}