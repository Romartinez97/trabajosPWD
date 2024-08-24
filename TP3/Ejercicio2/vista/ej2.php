<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/ej2.css">
    <title>Ejercicio2</title>
</head>
<body>
    <form action="./action/actionej2.php" method="post" enctype="multipart/form-data">
        <h4>Ingrese un archivo de texto: </h4><br>
        <input type="file" name="texto" id="texto" required><br><br>
        <input type="submit" name="submit" id="submit" value="Enviar">
    </form>
</body>
</html>