<?php

use Spatie\ImageOptimizer\OptimizerChainFactory;
class Imagen{

    private $arrayImagen;
    private $dir;

    public function __construct($imagen){
        $this->arrayImagen = $imagen;
        $this->dir = str_replace("\\", "/", $_SERVER['DOCUMENT_ROOT']."/trabajosPWD/TP_CUtiles/directorio/");
    }

    public function getArrayImagen(){
        return $this->arrayImagen;
    }
    public function setArrayImagen($arrayImagen){
        $this->arrayImagen=$arrayImagen;
    }

    public function getDir(){
        return $this->dir;
    }
    public function setDir($dir){
        $this->dir=$dir;
    }

    public function subirImagen(){
        $imagen=$this->getArrayImagen();
        $directorio=$this->getDir();
        if(!copy($imagen['tmp_name'], $directorio.$imagen['name'])){
            $mensaje = -1;
        }else{
            $mensaje =1;
        }
        return $mensaje;
    }

    public function optimizarImg(){
        $imagen=$this->getArrayImagen();
        $directorio=$this->getDir();
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize($directorio.$imagen['name']);
        $imgOptimizada="../../directorio/".$imagen['name'];
        return $imgOptimizada;
    }

    public function porcentaje(){
        $imagen=$this->getArrayImagen();
        $directorio=$this->getDir();
        $porcentaje=bcdiv(filesize($directorio.$imagen['name'])*100/$imagen['size'], '1', 1);
        return $porcentaje;
    }
}