<?php
$titulo = "TP2 - Ejercicio 3";
include '../../estructura/header.php';
?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <form action="action/formActionEj3.php" method="post" name="form-login" id="form-login">
            <p class="display-6" id="tituloEjercicio">Member Login</p>
            <div>
                <label class="form-label" for="usuario">Usuario:</label><br>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
                <input type="text" name="usuario" id="usuario" class="form-control mt-2">
            </div>
            <div>
                <label class="form-label" for="contrasenia">Contraseña:</label><br>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-lock-fill" viewBox="0 0 16 16">
                    <path
                        d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                </svg>
                <input type="password" name="contrasenia" id="contrasenia" class="form-control mt-2">
            </div>
            <input type="submit" name="submit" id="submit" value="Login" class="btn m-2 btn-success">
            <a class="btn m-2 text-white" href="../../index.php" id="botonMenu">Volver al
                menú</a>
        </form>
    </div>

    <?php
    include '../../estructura/footer.php';
    ?>

</body>

</html>