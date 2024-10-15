<?php
$titulo = "TP1 - Ejercicio 2";
include '../../estructura/header.php';
?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <p class="display-6" id="tituloEjercicio">Horas de cursada de Programación Web Dinámica</p>
            <form action="action/formActionEj2.php" method="get" name="formHorasCursada" id="formHorasCursada">
                <div>
                    <label class="form-label" for="horasLunes">Lunes:</label>
                    <input class="form-control" name="horasLunes" id="horasLunes" placeholder="0">
                </div>
                <div>
                    <label class="form-label" for="horasMartes">Martes:</label>
                    <input class="form-control" name="horasMartes" id="horasMartes" placeholder="0">
                </div>
                <div>
                    <label class="form-label" for="horasMiercoles">Miércoles:</label>
                    <input class="form-control" name="horasMiercoles" id="horasMiercoles" placeholder="0">
                </div>
                <label class="form-label" for="horasJueves">Jueves:</label>
                <input class="form-control" name="horasJueves" id="horasJueves" placeholder="0">
                <div>
                    <label class="form-label" for="horasViernes">Viernes:</label>
                    <input class="form-control" name="horasViernes" id="horasViernes" placeholder="0">
                </div>
                <input type="submit" value="Calcular horas totales" class="btn btn-success mt-3">
                <a class="btn mt-3 text-white" href="../../index.php" id="botonMenu">Volver al
                    menú</a>
            </form>
        </div>
    </div>

    <?php
    include '../../estructura/footer.php';
    ?>

</body>

</html>