<?php
$titulo = "Ingreso";
include "../../estructura/header.php";
?>

<div id="page-container">
    <div class="text-center p-4">
        <p class="display-5">Ingreso</p>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<div class="alert alert-danger" role="alert">Correo electrónico o contraseña incorrectos.</div>';
        }
        if (isset($_GET['error']) && $_GET['error'] == 2) {
            echo '<div class="alert alert-danger" role="alert">Usuario deshabilitado, no se permite el ingreso.</div>';
        }
        if (isset($_GET['error']) && $_GET['error'] == 3) {
            echo '<div class="alert alert-danger" role="alert">Error en el login, intente nuevamente.</div>';
        }
        ?>
    </div>
    <div class="container">
        <div class="div-form">
            <form action="../accion/verificarLogin.php" method="post" name="formLogin" id="formLogin">
                <div>
                    <i class="fa-solid fa-envelope"></i>
                    <label class="form-label fw-bold" for="usmail">Correo electrónico:</label>
                    <input class="form-control" type="text" name="usmail" id="usmail" required>
                </div>
                <div>
                    <i class="fa-solid fa-lock"></i>
                    <label class="form-label fw-bold pt-3" for="uspass">Contraseña:</label>
                    <input class="form-control mb-3" type="password" name="uspass" id="uspass" required>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn m-3 text-white fw-bold" value="Iniciar sesión" id="botonLogin">
                </div>
            </form>
            <div class="container p-2 text-center">
                <h5>¿Aún no tenés cuenta?</h5>
                <a class="btn m-3 text-white fw-bold" href="registro.php" id="botonRegistro">Registrarse</a>
            </div>
        </div>
    </div>
</div>

<?php
include '../../estructura/footer.php';
?>
</body>

</html>