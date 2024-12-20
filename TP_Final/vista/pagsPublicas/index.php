<?php
include_once '../../util/funciones.php';
$sesion = new Session();

$titulo = "El Refugio Literario";

if ($sesion->estaLogueado()) {
    include "../../estructura/headerSeguro.php";
} else {
    include "../../estructura/header.php";
}

$estado = isset($_GET['estado']) ? $_GET['estado'] : '';
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';

if ($mensaje == 1) {
    $mensaje = "El producto ya se encuentra en el carrito, puede modificar la cantidad ingresando al mismo.";
} elseif ($mensaje == 2) {
    $mensaje = "Producto agregado al carrito.";
}
if ($estado == 1) {
    $mensaje = "Compra realizada con éxito. ¡Gracias por elegirnos!";
}
?>
<style>
    .book-cover {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 5px;
    }
</style>
<div id="page-container">

    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="text-center p-4">
            <p class="display-5">Encontrá los mejores libros en El Refugio Literario</p>
        </div>
    </div>

    <div class="text-center pb-4">
        <?php if ($mensaje) { ?>
            <div class="alert alert-warning" role="alert">
                <b><?php echo $mensaje; ?></b>
            </div>
        <?php } ?>
    </div>

    <div class="container p-4 my-4 justify-content-center">
        <p class="text-center display-6">Nuestros libros más vendidos</p>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            $objproducto = new AbmProducto();
            $productos = $objproducto->buscar(null);
            $productos = array_slice($productos, 0, 4);
            foreach ($productos as $prod) {
                $proprecio = $prod->getproprecio();
                $pronombre = $prod->getpronombre();
                $prodetalle = $prod->getprodetalle();
                $proid = $prod->getidproducto();
                $prostock = $prod->getprocantstock();
                $rutaimg = "../assets/imgs/libros/" . $proid . ".jpg";
                ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?php echo $rutaimg ?>" class="card-img-top book-cover" alt="Portada del libro">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $pronombre ?></h5>
                            <p class="card-text"><?php echo $prodetalle ?></p>
                            <p class="card-text"><?php echo "$" . $proprecio ?></p>
                        </div>
                        <?php
                        if ($sesion->estaLogueado()) {
                            if ($prostock > 0) {
                                echo '
                                <div class="card-footer text-center">
                                <form  method="post">
                                <input type="hidden" name="idproducto" value="' . $proid . '">
                                <input type="hidden" name="origen" value="index">
                                <input type="submit" class="btn btnRegistro" value="Agregar al carrito">
                                </form>
                                </div>';
                            } else {
                                echo '<div class="card-footer text-center"><button class="btn" disabled>No hay stock</button></div>';
                            }
                        }
                        ?>

                    </div>
                </div>
                <?php
            }
            ?>
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
                            <img src="../assets/imgs/generos/CienciaFiccion.jpg" alt=""
                                class="card-image-top imagenGrilla">
                            <div class="card-img-overlay">
                                <h4 class="card-title nombreGrilla">Ciencia ficción</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="pagGenero.php?genero=contemporanea">
                        <div class="card imgCard">
                            <img src="../assets/imgs/generos/Contemporanea.jpg" alt=""
                                class="card-image-top imagenGrilla">
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

    </div>


    <?php
    include '../../estructura/footer.php';
    ?>
    </body>

    </html>
    <script>
        $(document).ready(function () {
            $("form").on("submit", function (event) {
                event.preventDefault();

                var form = $(this);
                var url = '../pagsRestringidas/carrito.php';
                var formData = form.serialize();
                console.log(formData);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    success: function (response) {
                        alert("Ítem agregado al carrito");
                        const result = JSON.parse(response);
                        if (result.success) {
                            alert('Éxito');
                        } else {
                            alert('Error1: ' + result.message);
                        }
                    },
                    error: function () {
                        alert('Error2');
                    }
                });
            });
        });
    </script>