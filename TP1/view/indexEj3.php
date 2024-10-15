<?php
$titulo = "TP1 - Ejercicio 3";
include '../../estructura/header.php';
?>

<body>
  <div class="container p-4 my-4 d-flex justify-content-center">
    <div>
      <p class="display-6" id="tituloEjercicio">Formulario de información personal</p>
      <form action="action/formActionEj3.php" method="post" id="formInfoPersonal">
        <label class="form-label" for="nombre">Nombre: </label>
        <input class="form-control" name="nombre" id="nombre" type="text" maxlength="50" required />
        <label class="form-label" for="apellido">Apellido: </label>
        <input class="form-control" name="apellido" id="apellido" type="text" maxlength="50" required />
        <label class="form-label" for="edad">Edad: </label>
        <input class="form-control" name="edad" id="edad" type="number" min="10" max="120" required />
        <label class="form-label" for="direccion">Dirección: </label>
        <input class="form-control" name="direccion" id="direccion" type="text" maxlength="50" required />

        <div class="p-2">
          <label class="form-label">Nivel de estudios:</label>
          <div class="form-check">
            <input class="form-check-input" name="nivelEstudios" id="sinEstudios" type="radio" value="sinEstudios"
              required>
            <label class="form-check-label" for="sinEstudios">Sin estudios</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="nivelEstudios" id="estudiosPrimarios" type="radio"
              value="estudiosPrimarios">
            <label class="form-check-label" for="estudiosPrimarios">Estudios primarios</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="nivelEstudios" id="estudiosSecundarios" type="radio"
              value="estudiosSecundarios">
            <label class="form-check-label" for="estudiosSecundarios">Estudios secundarios</label>
          </div>
        </div>

        <div class="p-2">
          <label class="form-label">Sexo:</label>
          <div class="form-check">
            <input class="form-check-input" name="sexo" id="femenino" type="radio" value="femenino" required>
            <label class="form-check-label" for="femenino">Femenino</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="sexo" id="masculino" type="radio" value="masculino">
            <label class="form-check-label" for="masculino">Masculino</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="sexo" id="otro" type="radio" value="otro">
            <label class="form-check-label" for="otro">Otro</label>
          </div>
        </div>

        <div class="p-2">
          <label class="form-label">Deportes que practica:</label>
          <div class="form-check">
            <input class="form-check-input" name="deportes[]" id="futbol" type="checkbox" value="futbol">
            <label class="form-check-label" for="futbol">Fútbol</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="deportes[]" id="basquet" type="checkbox" value="basquet">
            <label class="form-check-label" for="basquet">Basquet</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="deportes[]" id="tenis" type="checkbox" value="tenis">
            <label class="form-check-label" for="tenis">Ténis</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="deportes[]" id="voley" type="checkbox" value="voley">
            <label class="form-check-label" for="voley">Voley</label>
          </div>
        </div>

        <input class="btn btn-success mt-3" id="submit" name="submit" type="submit" value="Enviar" />
        <a class="btn mt-3 text-white" href="../../index.php" id="botonMenu">Volver al menú</a>
      </form>
    </div>
  </div>

  <?php
  include '../../estructura/footer.php';
  ?>

</body>

</html>