<?php
$titulo = "Registro";
include "../../estructura/header.php";
?>

<div id="page-container">
    <div class="text-center p-4">
        <p class="display-5">Registro</p>
    </div>
    <div class="container">
        <div class="div-form">
            <form action="../accion/verificarRegistro.php" method="post" name="formLogin" id="formLogin">
                <div>
                    <label class="form-label fw-bold" for="usmail">Nombre y apellido:</label>
                    <input class="form-control" type="text" name="usnombre" id="usnombre" required>
                </div>
                <div>
                    <label class="form-label fw-bold pt-3" for="usmail">Correo electrónico:</label>
                    <input class="form-control" type="text" name="usmail" id="usmail" required>
                </div>
                <div>
                    <label class="form-label fw-bold pt-3" for="uspass">Contraseña:</label>
                    <input class="form-control mb-3" type="password" name="uspass" id="uspass" required>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn mb-4 text-white fw-bold" value="Registrarse" id="botonRegistro">
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