<?php
include_once '../../util/funciones.php';
include_once '../../vendor/autoload.php';
$datos=data_submitted();
foreach($datos as $dato){
    if(!is_array($dato)){
        echo $dato."<br>";
    }
    if(is_array($dato)){
        foreach($dato as $dat){
            echo $dat."<br>";
        }
    }
}
print_r($datos);
//--
switch ($datos["progenero"]) {
    case "aventura":
        $genero = "Aventura";
        break;
    case "cienciaficcion":
        $genero = "Ciencia Ficción";
        break;
    case "fantasia":
        $genero = "Fantasía";
        break;
    case "contemporanea":
        $genero = "Literatura Contemporánea";
        break;
    case "historia":
        $genero = "Historia";
        break;
    case "infantil":
        $genero = "Literatura Infantil";
        break;
    case "poesia":
        $genero = "Poesía";
        break;
    case "romance":
        $genero = "Romance";
        break;
    case "terror":
        $genero = "Terror";
        break;
}

//--
$abmproductos=new AbmProducto();
$productos=$abmproductos->buscar(null);
$ultimoid=count($productos)-1;
$nuevoid=$productos[$ultimoid]->getidproducto()+1;
//--
$img=$datos["proimg"];
$img["name"]=$nuevoid.".jpg";
$controlImg=new Imagen($img);
$controlImg->subirImagen();
$controlImg->optimizarImg();
//--
$param=[
    'idproducto' => $nuevoid,
    'pronombre' => $datos["pronombre"],
    'prodetalle' => "Escritor/a: ".$datos["prodetalle"],
    'procantstock' => $datos["procantstock"],
    'progenero' => $genero,
    'proprecio' => $datos["proprecio"],
];
$abmproductos->alta($param);
header("Location: ../pagsRestringidas/agregarProducto.php?prodsubido=1");