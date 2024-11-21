<?php
include_once '../../util/funciones.php';

$sesion=new Session();
$titulo = "agregar Libro";

if (!$sesion->estaLogueado() || !in_array($sesion->getRol(), [1, 3])) {
    header('Location: ../pagsPublicas/login.php');
    exit();
} else {
    include "../../estructura/headerSeguro2.php";
}
?>

<div id="page-container">
    <div class="text-center p-4">
        <p class="display-5">Libro nuevo:</p>
    </div>
    <div class="container">
        <div class="div-form">
        <?php
        if (isset($_GET['prodsubido']) && $_GET['prodsubido'] == 1) {
            echo '<div class="alert alert-success" role="alert">Libro agregado correctamente.</div>';
        }
        ?>
            <form action="../accion/subirProducto.php" method="post" name="formAgregarProd" id="formAgregarProd" enctype="multipart/form-data">
                <div>
                    <label class="form-label fw-bold" for="pronombre">Titulo:</label>
                    <input class="form-control" type="text" name="pronombre" id="pronombre" required>
                </div>
                <div>
                    <label class="form-label fw-bold pt-3" for="prodetalle">Escritor/a:</label>
                    <input class="form-control" type="text" name="prodetalle" id="prodetalle" required>
                </div>
                <div>
                    <label class="form-label fw-bold pt-3" for="procantstock">Cantidad de stock:</label>
                    <input class="form-control" type="text" name="procantstock" id="procantstock" required>
                </div>
                <div>
                    <label class="form-label fw-bold pt-3" for="progenero">Genero:</label>
                    <select class="form-control" name="progenero" id="progenero" required>
                        <option value=""></option>
                        <option value="aventura">Aventura</option>
                        <option value="cienciaficcion">Ciencia Ficción</option>
                        <option value="contemporanea">Contemporánea</option>
                        <option value="fantasia">Fantasía</option>
                        <option value="historia">Historia</option>
                        <option value="infantil">Infantil</option>
                        <option value="poesia">Poesía</option>
                        <option value="romance">Romance</option>
                        <option value="terror">Terror</option>
                    </select>
                </div>
                <div>
                    <label class="form-label fw-bold pt-3" for="proprecio">Precio:</label>
                    <input class="form-control" type="text" name="proprecio" id="proprecio" required>
                </div>
                <div>
                    <label class="form-label fw-bold pt-3" for="proimg">Imagen del libro:</label>
                    <input class="form-control" type="file" name="proimg" id="proimg" required>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn mb-4 mt-4 text-white fw-bold" value="Agregar" id="botonLogin">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include '../../estructura/footer.php';
?>
</body>

</html>