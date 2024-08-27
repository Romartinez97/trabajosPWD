<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP1 - Ejercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div class="div-form">
            <p class="display-6 text-success">¿Es positivo o negativo?</p>
            <form action="../controller/indexController.php" method="post" name="formNumero">
                <label class="form-label" for="numIngresado">Ingrese un número:</label>
                <input class="form-control" name="numIngresado" id="numIngresado" type="number" maxlength="20"
                    placeholder="0" required>
                <input type="submit" value="Enviar" class="btn btn-success mt-3">
                <br>
                <a class="btn btn-info mt-3" href="../../../index.php">Volver al menú</a>
            </form>
        </div>
    </div>
</body>


</html>