<?php
$titulo = "TP1 - Ejercicio 7";
include '../../estructura/header.php';
?>

<body>
  <div class="container p-4 my-4 d-flex justify-content-center">
    <div>
      <p class="display-6" id="tituloEjercicio">Calculadora</p>
      <form method="POST" action="action/formActionEj7.php">
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
        <a class="btn mt-3 text-white" href="../../index.php" id="botonMenu">Volver al menú</a>
      </form>
    </div>
  </div>

  <?php
  include '../../estructura/footer.php';
  ?>

</body>

</html>