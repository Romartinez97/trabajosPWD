<?php
$titulo = "TP1 - Ejercicio 8";
include '../../estructura/header.php';
?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="display-6" id="tituloEjercicio">Cine Cinem@s</p>
            <form action="action/formActionEj8.php" method="post">
                <label class="form-label" for="edad">Edad:</label>
                <input class="form-control" name="edad" id="edad" type="number" min="6" max="110" required>
                <div style="margin: 0.5rem 0;">
                    <label class="form-label" for="estudiante">¿Es usted un estudiante?:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="estudiante" name="estudiante"
                            value="estudiante">
                        <label class="form-check-label">Soy estudiante</label>
                    </div>
                </div>
                <input type="submit" value="Calcular precio" class="btn btn-success mt-3">
                <input type="reset" value="Limpiar formulario" class="btn btn-danger mt-3">
                <br>
                <a class="btn mt-3 text-white" href="../../index.php" id="botonMenu">Volver al menú</a>
            </form>
        </div>
    </div>

    <?php
    include '../../estructura/footer.php';
    ?>

</body>

</html>