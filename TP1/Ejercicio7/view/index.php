<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TP1 - Ejercicio 7</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container p-4 my-4 d-flex justify-content-center">
    <div>
      <p class="display-6 text-success">Calculadora</p>
      <form method="POST" action="../controller/indexController.php">
        <label class="form-label" for="numeros">Ingrese dos números:</label>
        <input class="form-control" name="numero1" id="numero1" type="number" placeholder="0" required>
        <input class="form-control" name="numero2" id="numero2" type="number" placeholder="0" required>
        <label class="form-label" for="operacion">Seleccione la operación a realizar:</label>
        <select class="form-select" name="operacion" id="operacion">
          <option value="suma">Suma</option>
          <option value="resta">Resta</option>
          <option value="multiplicacion">Multiplicación</option>
          <option value="division">División</option>
        </select>
        <input type="submit" value="Calcular" class="btn btn-success mt-3">
      </form>
    </div>
  </div>
</body>

</html>