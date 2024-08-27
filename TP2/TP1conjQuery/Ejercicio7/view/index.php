<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TP1 - Ejercicio 7</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script src="../utils/validacion.js"></script>
</head>

<body>
  <div class="container p-4 my-4 d-flex justify-content-center">
    <div>
      <p class="display-6 text-success">Calculadora</p>
      <form method="POST" action="../controller/indexController.php" id="formCalculadora">
        <label class="form-label" for="numeros">Ingrese dos números:</label>
        <div>
          <input class="form-control" name="numero1" id="numero1" placeholder="0">
          <input class="form-control" name="numero2" id="numero2" placeholder="0">
        </div>
        <label class="form-label" for="operacion">Seleccione la operación a realizar:</label>
        <select class="form-select" name="operacion" id="operacion">
          <option value="suma">Suma</option>
          <option value="resta">Resta</option>
          <option value="multiplicacion">Multiplicación</option>
          <option value="division">División</option>
        </select>
        <input type="submit" value="Calcular" class="btn btn-success mt-3">
        <br>
        <a class="btn btn-info mt-3" href="../../../../index.php">Volver al menú</a>
      </form>
    </div>
  </div>
</body>

</html>