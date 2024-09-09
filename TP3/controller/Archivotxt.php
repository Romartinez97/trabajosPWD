<?php

class Archivotxt{

    private $dir;

    public function __construct() {
        $this->dir = "../../directorio/";
    }

    public function getDir(){
        return $this->dir;
    }

    public function setDir($dir){
        $this->dir=$dir;
    }

    public function textoArchivo($datos){
        $file=$datos["texto"];
        if($file["type"]=="text/plain"){
            if(!copy($file['tmp_name'], $this->getDir().$file['name'])){
                $mensaje="ERROR: no se pudo cargar el archivo";
            }else{
                $mensaje=1;
            }
        }else{
            $mensaje="ERROR: tipo de archivo no aceptado (solo archivos .txt)";
        }
        return $mensaje;
    }
}