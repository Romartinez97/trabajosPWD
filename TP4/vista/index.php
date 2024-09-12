<?php
$titulo = "TP4 - Menú";
include 'estructura/header.php';
?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="h1" style="color:#295F98">Trabajo práctico 4</p>

            <div id="divBoton1" class="mt-4">
                <div class="card">
                    <a class="btn" href="verAutos.php">
                        <div class="card-header">
                            <span class="h5">Ver listado de autos</span>
                        </div>
                    </a>
                </div>
            </div>

            <div id="divBoton2" class="mt-4">
                <div class="card">
                    <a class="btn" href="buscarAuto.php">
                        <div class="card-header">
                            <span class="h5">Buscar un auto</span>
                        </div>
                    </a>
                </div>
            </div>

            <div id="divBoton3" class="mt-4">
                <div class="card">
                    <a class="btn" href="listaPersonas.php">
                        <div class="card-header">
                            <span class="h5">Ver listado de personas</span>
                        </div>
                    </a>
                </div>
            </div>

            <div id="divBoton4" class="mt-4">
                <div class="card">
                    <a class="btn" href="nuevaPersona.php">
                        <div class="card-header">
                            <span class="h5">Agregar una persona</span>
                        </div>
                    </a>
                </div>
            </div>

            <div id="divBoton5" class="mt-4">
                <div class="card">
                    <a class="btn" href="nuevoAuto.php">
                        <div class="card-header">
                            <span class="h5">Agregar un auto</span>
                        </div>
                    </a>
                </div>
            </div>

            <div id="divBoton6" class="mt-4">
                <div class="card">
                    <a class="btn" href="cambioDuenio.php">
                        <div class="card-header">
                            <span class="h5">Cambiar dueño de un auto</span>
                        </div>
                    </a>
                </div>
            </div>

            <div id="divBoton7" class="mt-4">
                <div class="card">
                    <a class="btn" href="buscarPersona.php">
                        <div class="card-header">
                            <span class="h5">Buscar una persona</span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <?php
    include 'estructura/footer.php';
    ?>

</body>

</html>