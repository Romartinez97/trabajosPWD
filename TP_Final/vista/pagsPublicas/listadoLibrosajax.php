<?php
include_once '../../configuracion.php';
$sesion= new Session();

$titulo = "Listado de libros";
if ($sesion->estaLogueado()) {
    include "../../estructura/headerSeguro.php";
} else {
    include "../../estructura/header.php";
}

?>
<div id="page-container">
    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="text-center p-4">
            <p class="display-5">Todos nuestros libros</p>
        </div>
    </div>
    <div class="container">
        <div id="contLibros">

        </div>
    </div>

<script>
    $(document).ready(function(){
        $.ajax({
            type: 'GET',
            url: '../accion/listarProdsajax.php',
            dataType: 'json',
            success: function(data){
                alert(data);
                $.each(data, function(index,producto){
                    var urlimg = producto.imagenExiste
                        ? producto.idproducto
                        :["Libro1", "Libro2", "Libro3", "Libro4", "Libro5", "Libro6", "Libro7", "Libro8", "Libro9"][Math.floor(Math.random() * 9)];
                    var btnprod = producto.procantstock >0
                        ? '<input type="submit" class="btn btnRegistro" value="Agregar al carrito">'
                        : '<div class="card-footer"><button class="btn" disabled>No hay stock</button></div>';
                    var divProd =$('<div class="d-flex pb-4">')
                    divProd.html(
                        '<img src="../assets/imgs/libros/'+ urlimg +'.jpg" alt="" class="imgLibroListado">'+
                        '<div class="detLibroListado">'+
                        '<div class="detLibroListado">'+
                        '<form method="post">'+
                        '<p class="h4 txtNaranja">'+ producto.pronombre+'</p>'+
                        '<p class="h5">'+ producto.prodetalle+'</p>'+
                        '<p class="h5"> Género: ' + producto.progenero+'</p>'+
                        '<p class="h6">$ ' + producto.proprecio+'</p>'+
                        '<input type="hidden" name="idproducto" value="'+producto.idproducto+'">'+
                        '<input type="hidden" name="origen" value="listadoLibros">'+
                        btnprod +
                        '</form>' +
                        '</div>'
                    );
                    $('#contLibros').append(divProd);
                });
            },
            error: function(xhr, status, error){
                alert("Error");
                console.error("Error al obtener datos: ", error);
                console.log('Respuesta: ', xhr.respondeText);
            }
        });
    });
</script>