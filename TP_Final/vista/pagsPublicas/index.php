<?php
include_once '../../util/funciones.php';

$titulo = "Página principal";
include "../../estructura/header.php";
?>

<div id="page-container">

    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="text-center p-4">
            <p class="display-5">Encontrá los mejores libros en El Refugio Literario</p>
        </div>
    </div>

    <div class="container p-4 my-4 justify-content-center">
        <p class="text-center display-6">Más vendidos</p>

        <div id="carruselGrande" class="carousel" data-bs-ride="carousel">

            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4 card carouselCard">
                            <img src="../assets/imgs/libros/Libro1.jpg" alt="Foto de un libro"
                                class="card-img-top imagenCarrusel">
                            <div class="card-body">
                                <h4 class="card-title">Libro</h4>
                                <p class="card-text">Autor</p>
                            </div>
                        </div>
                        <div class="col-md-4 card carouselCard">
                            <img src="../assets/imgs/libros/Libro2.jpg" alt="Foto de un libro"
                                class="card-img-top imagenCarrusel">
                            <div class="card-body">
                                <div class="card-body">
                                    <h4 class="card-title">Libro</h4>
                                    <p class="card-text">Autor</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 card carouselCard">
                            <img src="../assets/imgs/libros/Libro3.jpg" alt="Foto de un libro"
                                class="card-img-top imagenCarrusel">
                            <div class="card-body">
                                <div class="card-body">
                                    <h4 class="card-title">Libro</h4>
                                    <p class="card-text">Autor</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/libros/Libro4.jpg" alt="Foto de un libro"
                                class="card-img-top imagenCarrusel">
                            <div class="card-body">
                                <div class="card-body">
                                    <h4 class="card-title">Libro</h4>
                                    <p class="card-text">Autor</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/libros/Libro5.jpg" alt="Foto de un libro"
                                class="card-img-top imagenCarrusel">
                            <div class="card-body">
                                <div class="card-body">
                                    <h4 class="card-title">Libro</h4>
                                    <p class="card-text">Autor</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/libros/Libro6.jpg" alt="Foto de un libro"
                                class="card-img-top imagenCarrusel">
                            <div class="card-body">
                                <div class="card-body">
                                    <h4 class="card-title">Libro</h4>
                                    <p class="card-text">Autor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/libros/Libro7.jpg" alt="Foto de un libro"
                                class="card-img-top imagenCarrusel">
                            <div class="card-body">
                                <div class="card-body">
                                    <h4 class="card-title">Libro</h4>
                                    <p class="card-text">Autor</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/libros/Libro8.jpg" alt="Foto de un libro"
                                class="card-img-top imagenCarrusel">
                            <div class="card-body">
                                <div class="card-body">
                                    <h4 class="card-title">Libro</h4>
                                    <p class="card-text">Autor</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/libros/Libro9.jpg" alt="Foto de un libro"
                                class="card-img-top imagenCarrusel">
                            <div class="card-body">
                                <div class="card-body">
                                    <h4 class="card-title">Libro</h4>
                                    <p class="card-text">Autor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev custom-carousel-control" type="button" data-bs-target="#carruselGrande"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carruselGrande" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
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