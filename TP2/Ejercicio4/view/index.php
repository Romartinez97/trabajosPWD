<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TP2 - Ejercicio 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/jquery.min.js"></script>
    <script src="./assets/jquery.validate.min.js"></script>
    <script src="./assets/validacion.js"></script>

    <style>
        .form-check {
            margin-right: 1rem;
        }

        .col {
            margin: 0.5rem;
        }

        body {
            padding: 1rem;
        }

        .btn {
            margin: 1rem;
        }
    </style>

</head>

<body class="container-sm text-light bg-dark">
    <p class="display-5">Cinem@s</p>
    <form action="../controller/indexController.php" method="post" id="formPelicula">
        <!--OBS: se puede usar una table-->
        <div class="row">
            <div class="col">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" required>
            </div>
            <div class="col">
                <label for="actores" class="form-label">Actores:</label>
                <input type="text" class="form-control" name="actores" id="actores" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="director" class="form-label">Director:</label>
                <input type="text" class="form-control" name="director" id="director" required>
            </div>
            <div class="col">
                <label for="guion" class="form-label">Guión:</label>
                <input type="text" class="form-control" name="guion" id="guion" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="produccion" class="form-label">Producción:</label>
                <input type="text" class="form-control" name="produccion" id="produccion" required>
            </div>
            <div class="col">
                <label for="anio" class="form-label">Año:</label>
                <input type="number" class="form-control" name="anio" id="anio" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="nacionalidad" class="form-label">Nacionalidad:</label>
                <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" required>
            </div>
            <div class="col">
                <label for="genero" class="form-label">Género:</label>
                <select class="form-select" name="genero" id="genero" required>
                    <option value="" selected disabled>Seleccione uno</option>
                    <option value="comedia">Comedia</option>
                    <option value="drama">Drama</option>
                    <option value="terror">Terror</option>
                    <option value="romantica">Romántica</option>
                    <option value="suspenso">Suspenso</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="duracion" class="form-label">Duración:</label>
                <input type="number" class="form-control" name="duracion" id="duracion" required>
                <label class="form-label">(minutos)</label>
            </div>
            <div class="col">
                <label for="restriccion" class="form-label">Restricciones de edad:</label>
                <div class="input-group">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="restriccion" id="todoPublico"
                            value="todoPublico" required>
                        Todos los públicos
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="restriccion" id="mayorDe7" value="mayorDe7">
                        Mayores de 7 años
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="restriccion" id="mayorDe18"
                            value="mayorDe18">
                        Mayores de 18 años
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="sinopsis">Sinopsis:</label>
                <textarea class="form-control" rows="4" name="sinopsis" id="sinopsis" required></textarea>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-lg bg-success" value="Enviar">
            <input type="reset" class="btn btn-lg bg-secondary" value="Borrar">
        </div>
    </form>
</body>

</html>