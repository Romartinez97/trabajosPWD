<?php
include_once '../util/funciones.php';
class Carrito{
    

    public function obtenerNuevoID(){
        $abmcompra=new AbmCompra();
        $compras=$abmcompra->buscar(null);
        $ultimoid=count($compras)-1;
        $nuevoid=$compras[$ultimoid]->getidcompra()+1;
        return $nuevoid;
    }
}