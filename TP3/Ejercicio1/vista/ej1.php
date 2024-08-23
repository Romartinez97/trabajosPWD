<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/ej1.css">
    <title>Ejercicio1</title>
</head>
<body>
    <form action="./action/actionej1.php" method="post" enctype="multipart/form-data" name="formFile" id="formFile">
        <h4>Ingrese un archivo: </h4><br>
        <input type="file" name="archivo" id="archivo" required><br><br>
        <input type="submit" name="submit" id="submit" value="Enviar">
    </form>
</body>
</html>