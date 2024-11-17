<?php
include_once '../../util/funciones.php';
$sesion = new Session();

$titulo = "Página principal";
include "../../estructura/header.php";
?>
<style>
    .book-cover {
        width: 100%; 
        height: 450px; 
        object-fit: cover;
        border-radius: 5px; 
    }
    .btn-custom {
        background-color: #A5B68D;
        border-color: #A5B68D;
        color: black; 
    }

    .btn-custom:hover {
        background-color: #8E9F77;
        border-color: #8E9F77;
        color: white;
    }
</style>
<div id="page-container">

<div class="container-fluid d-flex align-items-center justify-content-center">
    <div class="text-center p-4">
        <p class="display-5">Encontrá los mejores libros en El Refugio Literario</p>
    </div>
</div>

<div class="container p-4 my-4 justify-content-center">
    <p class="text-center display-6">Nuestros Libros</p>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
        $objproducto=new AbmProducto();
        $productos=$objproducto->buscar(null);
        foreach($productos as $prod){
            $proprecio=$prod->getproprecio();
            $pronombre=$prod->getpronombre();
            $prodetalle=$prod->getprodetalle();
            $proid=$prod->getidproducto();
            $prostock=$prod->getprocantstock();
            $rutaimg="../assets/imgs/libros/".$proid.".jpg";
    ?>
        <div class="col">
            <div class="card h-100">
                <img src="<?php echo $rutaimg ?>" class="card-img-top book-cover" alt="Portada del libro">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $pronombre ?></h5>
                    <p class="card-text"><?php echo $prodetalle ?></p>
                    <p class="card-text"><?php echo "$".$proprecio ?></p>
                </div>
                <?php
                    if ($sesion->estaLogueado()) {
                        if($prostock>0){
                            echo '<div class="card-footer text-center"><button class="btn btn-custom">Agregar</button></div>';
                        }else{
                            echo '<div class="card-footer text-center"><button class="btn btn-danger">No hay Stock</button></div>';
                        } 
                    }
                ?>
                
            </div>
        </div>
    <?php
        }
    ?>
    </div>
</div>

<div class="container-fluid p-4 my-4 justify-content-center bg-dark text-light">
    <p class="display-6 text-center">Libros por temática</p>
    <div class="row">
        <div class="col">
            <a href="pagGenero.php?genero=aventura">
                <div class="card imgCard">
                    <img src="../assets/imgs/generos/Aventura.jpg" alt="" class="card-image-top imagenGrilla">
                    <div class="card-img-overlay">
                        <h4 class="card-title nombreGrilla">Aventura</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="pagGenero.php?genero=cienciaFiccion">
                <div class="card imgCard">
                    <img src="../assets/imgs/generos/CienciaFiccion.jpg" alt="" class="card-image-top imagenGrilla">
                    <div class="card-img-overlay">
                        <h4 class="card-title nombreGrilla">Ciencia ficción</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="pagGenero.php?genero=contemporanea">
                <div class="card imgCard">
                    <img src="../assets/imgs/generos/Contemporanea.jpg" alt="" class="card-image-top imagenGrilla">
                    <div class="card-img-overlay">
                        <h4 class="card-title nombreGrilla">Contemporánea</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="pagGenero.php?genero=fantasia">
                <div class="card imgCard">
                    <img src="../assets/imgs/generos/Fantasia.jpg" alt="" class="card-image-top imagenGrilla">
                    <div class="card-img-overlay">
                        <h4 class="card-title nombreGrilla">Fantasía</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="pagGenero.php?genero=historia">
                <div class="card imgCard">
                    <img src="../assets/imgs/generos/Historia.jpg" alt="" class="card-image-top imagenGrilla">
                    <div class="card-img-overlay">
                        <h4 class="card-title nombreGrilla">Historia</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="pagGenero.php?genero=infantil">
                <div class="card imgCard">
                    <img src="../assets/imgs/generos/Infantil.jpg" alt="" class="card-image-top imagenGrilla">
                    <div class="card-img-overlay">
                        <h4 class="card-title nombreGrilla">Infantil</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="pagGenero.php?genero=poesia">
                <div class="card imgCard">
                    <img src="../assets/imgs/generos/Poesia.jpg" alt="" class="card-image-top imagenGrilla">
                    <div class="card-img-overlay">
                        <h4 class="card-title nombreGrilla">Poesía</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="pagGenero.php?genero=romance">
                <div class="card imgCard">
                    <img src="../assets/imgs/generos/Romance.jpg" alt="" class="card-image-top imagenGrilla"
                        style="object-position: top">
                    <div class="card-img-overlay">
                        <h4 class="card-title nombreGrilla">Romance</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="pagGenero.php?genero=terror">
                <div class="card imgCard">
                    <img src="../assets/imgs/generos/Terror.jpg" alt="" class="card-image-top imagenGrilla"
                        style="object-position: bottom">
                    <div class="card-img-overlay">
                        <h4 class="card-title nombreGrilla">Terror</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<?php
include '../../estructura/footer.php';
?>

</div>



</body>

</html>