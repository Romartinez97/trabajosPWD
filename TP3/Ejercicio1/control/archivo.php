<?php

class Archivo{

    private $dir;

    public function __construct() {
        $this->dir = '../directorio/';
    }

    public function getDir(){
        return $this->dir;
    }

    public function setDir($dir){
        $this->dir = $dir;
    }

    public function verifArchivo($datos){
        $file=$datos['archivo'];
        $tipo=false;
        if($file['type'] == "application/pdf" || $file['type'] == "application/msword"){
            $tipo=true;
        }
        return $tipo;
    }

    public function verifTamanio($datos){
        $file=$datos['archivo'];
        $tamMax= 2 * pow(10, 6);
        $tamanio=false;
        if($file['size']<=$tamMax){
            $tamanio=true;
        }
        return $tamanio;
    }

    public function subirArchivo($datos, $tipo, $tamanio){
        $file=$datos['archivo'];
        if($tipo && $tamanio){
            if(!copy($file['tmp_name'], $this->getDir().$file['name'])){
                $mensaje="ERROR: no se pudo cargar el archivo";
            }else{
                $mensaje=" El archivo ".$file['name']." se ha copiado con exito<br><br><br><a href='../directorio/".$file['name']."'>VER ARCHIVO<a>";
            }
        }elseif($tipo && !$tamanio){
            $mensaje="ERROR: tamaño del archivo excede limite (2mb)";
        }elseif(!$tipo && $tamanio){
            $mensaje="ERROR: tipo de archivo no soportado (solo .pdf o .doc)";
        }else{
            $mensaje="ERROR: tipo de archivo y tamaño no soportado";
        }
        return $mensaje;
    }
}