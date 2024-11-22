<?php

include_once '../../configuracion.php';
$abmProducto=new AbmProducto();
$lista = $abmProducto->buscar(null);
$arreglo_salida = array();

header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="productos.json"');

foreach($lista as $elem){
    $nuevoElem['idproducto'] = $elem->getidproducto();
    $nuevoElem['pronombre'] = $elem->getpronombre();
    $nuevoElem['prodetalle'] = $elem->getprodetalle();
    $nuevoElem['procantstock'] = $elem->getprocantstock();
    $nuevoElem['proprecio'] = $elem->getproprecio();
    $nuevoElem['progenero'] = $elem->getprogenero();

    //verifico si existe la imagen
    $rutaimagen = "../assets/imgs/libros/".$elem->getidproducto().".jpg";
    $nuevoElem['imagenExiste'] = file_exists($rutaimagen);

    array_push($arreglo_salida, $nuevoElem);
}
//envio los datos en json
echo json_encode($arreglo_salida);