<?php
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
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/Libros1.jpg" alt="Foto de un libro" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">Libro</h4>
                                <p class="card-text">Autor</p>
                                <h6 class="card-text">$9999,99</h6>
                                <a href="#" class="btn">Agregar</a>
                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/Libros1.jpg" alt="Foto de un libro" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">Libro</h4>
                                <p class="card-text">Autor</p>
                                <h6 class="card-text">$9999,99</h6>
                                <a href="#" class="btn">Agregar</a>
                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/Libros1.jpg" alt="Foto de un libro" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">Libro</h4>
                                <p class="card-text">Autor</p>
                                <h6 class="card-text">$9999,99</h6>
                                <a href="#" class="btn">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/Libros2.jpg" alt="Foto de un libro" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">Libro</h4>
                                <p class="card-text">Autor</p>
                                <h6 class="card-text">$9999,99</h6>
                                <a href="#" class="btn">Agregar</a>
                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/Libros2.jpg" alt="Foto de un libro" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">Libro</h4>
                                <p class="card-text">Autor</p>
                                <h6 class="card-text">$9999,99</h6>
                                <a href="#" class="btn">Agregar</a>
                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/Libros2.jpg" alt="Foto de un libro" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">Libro</h4>
                                <p class="card-text">Autor</p>
                                <h6 class="card-text">$9999,99</h6>
                                <a href="#" class="btn">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/Libros3.jpg" alt="Foto de un libro" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">Libro</h4>
                                <p class="card-text">Autor</p>
                                <h6 class="card-text">$9999,99</h6>
                                <a href="#" class="btn">Agregar</a>
                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/Libros3.jpg" alt="Foto de un libro" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">Libro</h4>
                                <p class="card-text">Autor</p>
                                <h6 class="card-text">$9999,99</h6>
                                <a href="#" class="btn">Agregar</a>
                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <img src="../assets/imgs/Libros3.jpg" alt="Foto de un libro" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">Libro</h4>
                                <p class="card-text">Autor</p>
                                <h6 class="card-text">$9999,99</h6>
                                <a href="#" class="btn">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carruselGrande" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carruselGrande" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

    </div>

    <div class="container-fluid p-4 my-4 justify-content-center bg-dark text-light">
        <p class="display-6 text-center">Mejores libros por temática</p>
        <div class="row">
            <div class="col">
                <div class="card">
                    <img src="../assets/imgs/Libros1.jpg" alt="" class="card-image-top">
                    <div class="card-img-overlay">
                        <h4 class="card-title">Aventura</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="../assets/imgs/Libros1.jpg" alt="" class="card-image-top">
                    <div class="card-img-overlay">
                        <h4 class="card-title">Aventura</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="../assets/imgs/Libros1.jpg" alt="" class="card-image-top">
                    <div class="card-img-overlay">
                        <h4 class="card-title">Aventura</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <img src="../assets/imgs/Libros1.jpg" alt="" class="card-image-top">
                    <div class="card-img-overlay">
                        <h4 class="card-title">Aventura</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="../assets/imgs/Libros1.jpg" alt="" class="card-image-top">
                    <div class="card-img-overlay">
                        <h4 class="card-title">Aventura</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="../assets/imgs/Libros1.jpg" alt="" class="card-image-top">
                    <div class="card-img-overlay">
                        <h4 class="card-title">Aventura</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <img src="../assets/imgs/Libros1.jpg" alt="" class="card-image-top">
                    <div class="card-img-overlay">
                        <h4 class="card-title">Aventura</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="../assets/imgs/Libros1.jpg" alt="" class="card-image-top">
                    <div class="card-img-overlay">
                        <h4 class="card-title">Aventura</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="../assets/imgs/Libros1.jpg" alt="" class="card-image-top">
                    <div class="card-img-overlay">
                        <h4 class="card-title">Aventura</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include '../../estructura/footer.php';
    ?>

</div>



</body>

</html>