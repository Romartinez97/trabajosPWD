<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TP1 - Ejercicio 3</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>
  <script src="js/validacion.js"></script>

  <style>
    .form-label {
      font-weight: bold;
      margin-top: 0.5rem;
    }
  </style>
</head>

<body>
  <div class="container p-4 my-4 d-flex justify-content-center">
    <div>
      <p class="display-6 text-info">Formulario de información personal</p>
      <form action="action/formAction.php" method="post" id="formInfoPersonal">
        <div>
          <label class="form-label" for="nombre">Nombre: </label>
          <input class="form-control" name="nombre" id="nombre" />
        </div>
        <div>
          <label class="form-label" for="apellido">Apellido: </label>
          <input class="form-control" name="apellido" id="apellido" />
        </div>
        <div>
          <label class="form-label" for="edad">Edad: </label>
          <input class="form-control" name="edad" id="edad" />
        </div>
        <div>
          <label class="form-label" for="direccion">Dirección: </label>
          <input class="form-control" name="direccion" id="direccion" />
        </div>

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
        <br>
        <a class="btn btn-info mt-3" href="../../../../index.php">Volver al menú</a>
      </form>
    </div>
  </div>
</body>

</html>