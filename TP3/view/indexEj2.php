<?php
$titulo = "TP3 - Ejercicio 2";
include '../../estructura/header.php';
?>

<body>
    <div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="display-5" id="tituloEjercicio">Ingrese un archivo de texto:</p>
            <form action="action/formActionEj2.php" method="post" enctype="multipart/form-data" id="formFile">
                <input class="form-control" type="file" name="texto" id="texto" required>
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn m-2 bg-success text-white" value="Enviar">
                    <a class="btn m-2 text-white" href="../../index.php" id="botonMenu">Volver al
                        menú</a>
                </div>
            </form>
        </div>
    </div>

    <?php
    include '../../estructura/footer.php';
    ?>

</body>