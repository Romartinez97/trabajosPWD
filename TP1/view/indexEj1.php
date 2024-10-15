<?php
$titulo = "TP1 - Ejercicio 1";
include '../../estructura/header.php';
?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <p class="display-6" id="tituloEjercicio">¿Es positivo o negativo?</p>
            <form action="action/formActionEj1.php" method="post" name="formNumero">
                <label class="form-label" for="numIngresado">Ingrese un número:</label>
                <input class="form-control" name="numIngresado" id="numIngresado" type="number" maxlength="20"
                    placeholder="0" required>
                <input type="submit" value="Enviar" class="btn btn-success mt-3">
                <a class="btn mt-3 text-white botonMenu" href="../../index.php" id="botonMenu">Volver al
                    menú</a>
            </form>
        </div>
    </div>

    <?php
    include '../../estructura/footer.php';
    ?>

</body>


</html>