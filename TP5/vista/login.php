<?php
$titulo = "TP5 - Login";
include 'estructura/header.php';
?>

<div class="container p-4 my-4 d-flex justify-content-center">
    <div class="div-form">
        <p class="display-6" id="tituloEjercicio">Login:</p>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<div class="alert alert-danger" role="alert">Correo electrónico o contraseña incorrectos.</div>';
        }
        ?>
        <form action="accion/verificarLogin.php" method="post" name="formLogin" id="formLogin">
            <div>
                <label class="form-label" for="usmail">Correo electrónico:</label>
                <input class="form-control" type="text" name="usmail" id="usmail">
            </div>
            <div>
                <label class="form-label" for="uspass">Contraseña:</label>
                <input class="form-control" type="password" name="uspass" id="uspass">
            </div>
            <div class="d-flex justify-content-center">
                <input type="submit" class="btn m-3 bg-success text-white" value="Ingresar">
                <a class="btn m-3 text-white" href="index.php" id="botonMenu">Volver atrás</a>
                <a class="btn m-3 text-white bg-dark" href="../../index.php" id="botonMenu">Volver al menú principal</a>
            </div>
        </form>
    </div>
</div>

<script>
    function formSubmit() {
        var password = document.getElementById("uspass").value;
        var passhash = CryptoJS.MD5(password.toString());
        document.getElementById("uspass").value = passhash;

        setTimeout(function () {
            document.getElementById("formLogin").submit();
        }, 500);
    }
</script>

<?php
include 'estructura/footer.php';
?>
</body>
</html>