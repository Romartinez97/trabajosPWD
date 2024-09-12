<?php
//include_once '../modelo/Auto.php';
//include_once "../modelo/conector/BaseDatosPDO.php";
class AbmAuto{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden
     * con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param){
        $obj=null;
        if(array_key_exists('id', $param) && array_key_exists('Patente', $param)&& array_key_exists('Marca', $param)&& array_key_exists('Modelo', $param)&& array_key_exists('DniDuenio', $param)){
            $obj=new Auto();
            $obj->setear($param['id'], $param['Patente'], $param['Marca'], $param['Modelo'], $param['DniDuenio']);
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
        if(isset($param['id'])){
            $obj=new Auto();
            $obj->setear($param['id'], null, null, null, null);
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
            if(isset($param['id'])){
                $where.=" and id=".$param['id'];
            }
            if(isset($param['Patente'])){
                $where.=" and Patente=".$param['Patente'];
            }
            if(isset($param['Marca'])){
                $where.=" and Marca=".$param['Marca'];
            }
            if(isset($param['Modelo'])){
                $where.=" and Modelo=".$param['Modelo'];
            }
            if(isset($param['DniDuenio'])){
                $where.=" and DniDuenio=".$param['DniDuenio'];
            }
        }
        $auto=new Auto();
        $arreglo=$auto->listar($where);
        //$arreglo=Auto::listar($where);
        return $arreglo;
    }
}