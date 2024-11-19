<?php
include_once '../../util/funciones.php';

$sesion = new Session();
$titulo = "Generador";

if (!$sesion->estaLogueado() || $sesion->getRol() != 1) {
    header('Location: ../pagsPublicas/login.php');
    exit();
} else {
    include "../../estructura/headerSeguro.php";
}

$abmProducto = new AbmProducto();
$abmUsuario = new AbmUsuario();
?>

<div id="page-container">
    <div class="container">
        <p class="display-5 text-center p-4">Generador</p>

        <!-- Para mostrar mensaje de éxito al generar datos -->
        <?php
        if (isset($_GET['estado']) && $_GET['estado'] == 1) {
            echo
                '<div class="container">
            <div class="alert alert-success" role="alert">Se generaron los datos correctamente.</div>
            </div>';
        }
        if (isset($_GET['estado']) && $_GET['estado'] == 2) {
            echo
                '<div class="container">
            <div class="alert alert-danger" role="alert">ERROR: No se pudieron generar los datos.</div>
            </div>';
        }
        ?>

        <!-- Formulario para generar usuarios -->
        <div class="container">
            <form action="../accion/accionGenerador.php" method="post">
                <p class="h4 pb-3">Generar usuarios:</p>
                <div class="form-group">
                    <label for="cantidadUsuarios" class="h5">Cantidad: </label>
                    <input type="number" class="form-control" id="cantidadUsuarios" name="cantidadUsuarios" required>
                </div>
                <div class="form-group">
                    <label class="h5 pt-2">Rol:</label><br>
                    <input type="radio" id="rolAdmin" name="rol" value="1" required>
                    <label for="rol1">Administrador</label><br>
                    <input type="radio" id="rolCliente" name="rol" value="2" required>
                    <label for="rol2">Cliente</label><br>
                    <input type="radio" id="rolDeposito" name="rol" value="3" required>
                    <label for="rol3">Depósito</label>
                </div>
                <input type="hidden" id="opcionGenerador" name="opcionGenerador" value="usuarios">
                <input type="submit" class="btn mt-3 text-white fw-bold" value="Generar usuarios" id="botonLogin">
            </form>
        </div>

        <!-- Formulario para generar libros -->
        <div class="container">
            <form action="../accion/accionGenerador.php" method="post" class="mt-4">
                <p class="h4 pb-3">Generar libros:</p>
                <div class="form-group">
                    <label for="cantidadLibros" class="h5">Cantidad: </label>
                    <input type="number" class="form-control" id="cantidadLibros" name="cantidadLibros" required>
                </div>
                <input type="hidden" id="opcionGenerador" name="opcionGenerador" value="libros">
                <input type="submit" class="btn mt-3 text-white fw-bold" value="Generar libros" id="botonLogin">
            </form>
        </div>

    </div>
</div>

<?php include '../../estructura/footer.php'; ?>