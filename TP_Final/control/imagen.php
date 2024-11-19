<?php

use Spatie\ImageOptimizer\OptimizerChainFactory;
class Imagen{

    private $arrayimg;
    private $dir;

    public function __construct($imagen){
        $this->arrayimg = $imagen;
        $this->dir = str_replace("\\", "/", $_SERVER['DOCUMENT_ROOT']."/trabajosPWD/TP_Final/vista/assets/imgs/libros/");
    }

    public function getarrayimg(){
        return $this->arrayimg;
    }
    public function setarrayimg($param){
        $this->arrayimg=$param;
    }

    public function getdir(){
        return $this->dir;
    }
    public function setdir($param){
        $this->dir=$param;
    }

    public function subirImagen(){
        $imagen=$this->getarrayImg();
        $directorio=$this->getdir();
        if(!copy($imagen['tmp_name'], $directorio.$imagen['name'])){
            $mensaje = -1;
        }else{
            $mensaje =1;
        }
        return $mensaje;
    }

    public function optimizarImg(){
        $imagen=$this->getarrayImg();
        $directorio=$this->getdir();
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize($directorio.$imagen['name']);
        return ;
    }
}