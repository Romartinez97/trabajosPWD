<?php
$titulo = "TP3 - Ejercicio 3";
include 'estructura/header.php';
?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="display-5" id="tituloEjercicio">Cine Cinem@s</p>
            <form action="action/formActionEj3.php" method="post" id="formPelicula">

                <div class="row">
                    <div class="col">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" class="form-control" name="titulo" id="titulo">
                    </div>
                    <div class="col">
                        <label for="actores" class="form-label">Actores:</label>
                        <input type="text" class="form-control" name="actores" id="actores">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="director" class="form-label">Director:</label>
                        <input type="text" class="form-control" name="director" id="director">
                    </div>
                    <div class="col">
                        <label for="guion" class="form-label">Guión:</label>
                        <input type="text" class="form-control" name="guion" id="guion">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="produccion" class="form-label">Producción:</label>
                        <input type="text" class="form-control" name="produccion" id="produccion">
                    </div>
                    <div class="col">
                        <label for="anio" class="form-label">Año:</label>
                        <input type="text" class="form-control" name="anio" id="anio">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="nacionalidad" class="form-label">Nacionalidad:</label>
                        <input type="text" class="form-control" name="nacionalidad" id="nacionalidad">
                    </div>
                    <div class="col">
                        <label for="genero" class="form-label">Género:</label>
                        <select class="form-select" name="genero" id="genero">
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
                        <label for="duracion" class="form-label">Duración (en minutos):</label>
                        <input type="text" class="form-control" name="duracion" id="duracion">
                    </div>
                    <div class="col">
                        <label class="form-label">Restricciones de edad:</label>
                        <div class="input-group">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="restriccion" id="todoPublico"
                                    value="todoPublico">
                                Todos los públicos
                            </div>
                            <div class="form-check" style="margin-left:0.5rem">
                                <input type="radio" class="form-check-input" name="restriccion" id="mayorDe7"
                                    value="mayorDe7">
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
                        <label class="form-label" for="sinopsis">Sinopsis:</label>
                        <textarea class="form-control" rows="4" name="sinopsis" id="sinopsis"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label" for="archivo">Imagen de la película:</label>
                        <input class="form-control" name="archivo" id="archivo" type="file">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn m-2 bg-success text-white" value="Enviar">
                    <input type="reset" class="btn m-2 bg-danger text-white" value="Borrar">
                    <a class="btn m-2 text-white" href="../../index.php" id="botonMenu">Volver al
                        menú</a>
                </div>
            </form>
        </div>
    </div>

    <?php
    include 'estructura/footer.php';
    ?>

</body>

</html>