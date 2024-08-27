<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP1 - Ejercicio 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="../utils/validacion.js"></script>
</head>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <p class="display-6 text-info">Horas de cursada de Programación Web Dinámica</p>
            <form action="../controller/indexController.php" method="get" name="formHorasCursada" id="formHorasCursada">
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
                <br>
                <a class="btn btn-info mt-3" href="../../../../index.php">Volver al menú</a>
            </form>
        </div>
    </div>
</body>

</html>