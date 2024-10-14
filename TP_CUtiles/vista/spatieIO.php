<?php
$titulo = "Spatie/image-Optimizer";
include 'estructura/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<div class="container p-4 my-4 d-flex justify-content-center">
        <div>
            <p class="h1" style="color:#295F98">Spatie/Image-Optimizer</p>
            <p>Spatie/Image-Optimizer, como su nombre lo indica, es una librería PHP que es útil para poder optimizar diferentes tipos de imágenes, esto lo logra gracias a la ayuda de varias herramientas de optimización de imágenes</p>
            <p>En este trabajo particularmente solo lo habilitamos para que optimice imágenes de tipo .jpg, .jpeg y .png en el sistema operativo Windows.</p>
            <div class="ms-2">
                <p class="h2" style="color:#295F98">Requisitos</p>
                <p>Antes de empezar hay que asegurarse de tener instalado lo siguiente:</p>
                <div class="ms-4">
                    <p class="h3" style="color:#295F98">PHP:</p>
                    <p>Se debe tener PHP instalado en tu sistema. Se puede comprobar fácilmente ejecutando el comando "php -v" en tu terminal</p>
                    <p class="h3" style="color:#295F98">Composer:</p>
                    <p>Esta librería (Spatie/Image-Optimizer) se gestiona mediante Composer, así que asegúrate de tener Composer instalado. En caso contrario se puede instalar desde <a href="https://getcomposer.org/">aquí</a>. Para comprobar si está instalado se puede hacer con el comando "composer -v" en la terminal</p>
                    <p class="h3" style="color:#295F98">Herramientas de optimización:</p>
                    <p>Como se mencionó anteriormente en este trabajo solo usaremos herramientas para la optimización de imágenes jpeg, jpg y png por lo que solo necesitaremos la instalación de 3 herramientas, <b>jpegoptim, optipng y pngquant</b>. Más adelante se explica como instalar cada una</p>
                </div>
                <p class="h2" style="color:#295F98">Instalación de la librería:</p>
                <p>Para instalar nuestra librería de optimización de imágenes debemos situarnos en la terminal de nuestro proyecto y escribir el comando:</p>
                <div class="container m-3">
                    <div class="card border-light rounded-3">
                        <div class="card-header bg-secondary text-black rounded-top">
                            Comando en Terminal
                        </div>
                        <div class="card-body bg-dark text-white rounded-bottom">
                            <pre><code>composer require spatie/image-optimizer</code></pre>
                        </div>
                    </div>
                </div>
                <p class="h2" style="color:#295F98">Instalación herramientas de optimización:</p>
                <p>Para poder instalar estas herramientas usaremos "Chocolatey", el cual es un administrador de paquetes para Windows que facilita la intalación de programas, en este caso, nuestras herramientas de optimización</p>
                <p>Para instalar "Chocolatey" abriremos <b>PowerShell</b> como <b>administrador</b></p>
                <img src="./assets/imgs/powerShell.png" alt="">
                <p>A continuación ejecutaremos el siguiente comando:</p>
                <div class="container m-3">
                    <div class="card border-light rounded-3">
                        <div class="card-header bg-secondary text-black rounded-top">
                            Comando en Terminal
                        </div>
                        <div class="card-body bg-dark text-white rounded-bottom">
                            <pre style="white-space: pre-wrap;"><code>Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))</code></pre>
                        </div>
                    </div>
                </div>
                <p></p>
                <p>Con esto ya deberíamos tener "Chocolatey" instalado, para comprobarlo se podría ejecutar el comando "choco -v"</p>
                <p>Luego para instalar cada herramienta debemos ejecutar estos comandos uno por uno:</p>
                <div class="ms-2">
                    <p>Para instalar <b>jpegoptim</b></p>
                    <div class="container m-3">
                    <div class="card border-light rounded-3">
                        <div class="card-header bg-secondary text-black rounded-top">
                            Comando en Terminal
                        </div>
                        <div class="card-body bg-dark text-white rounded-bottom">
                            <pre style="white-space: pre-wrap;"><code>choco install jpegoptim</code></pre>
                        </div>
                    </div>
                    </div>
                    <p>Para instalar <b>pngquant</b></p>
                    <div class="container m-3">
                    <div class="card border-light rounded-3">
                        <div class="card-header bg-secondary text-black rounded-top">
                            Comando en Terminal
                        </div>
                        <div class="card-body bg-dark text-white rounded-bottom">
                            <pre style="white-space: pre-wrap;"><code>choco install pngquant</code></pre>
                        </div>
                    </div>
                    </div>
                    <p>Para instalar <b>optipng</b></p>
                    <div class="container m-3">
                    <div class="card border-light rounded-3">
                        <div class="card-header bg-secondary text-black rounded-top">
                            Comando en Terminal
                        </div>
                        <div class="card-body bg-dark text-white rounded-bottom">
                            <pre style="white-space: pre-wrap;"><code>choco install optipng</code></pre>
                        </div>
                    </div>
                    </div>
                    <p>Para verificar si se instalaron se pueden usar los siguientes comandos:</p>
                    <div class="container m-3">
                    <div class="card border-light rounded-3">
                        <div class="card-header bg-secondary text-black rounded-top">
                            Comando en Terminal
                        </div>
                        <div class="card-body bg-dark text-white rounded-bottom">
                            <pre style="white-space: pre-wrap;"><code>jpegoptim --version<br>pngquant --version<br>optipng --version
                            </code></pre>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div>
                <p class="h1" style="color:#295F98">Ejemplos de uso:</p>
                <p class="h3 ms-3">Ejemplo 1 (.jpg)</p>
                <div class="d-flex justify-content-center">
                    <div>
                        <p class="h4 ms-5">Imagen original:</p>
                        <img  class="ms-5" src="assets/imgs/ejemplo1.jpg" alt="IMG_Ej1Original" height="700px">
                        <p class="h6 ms-5">Tamaño: 1,74 MB</p>
                    </div>
                    <div>
                        <p class="h4 ms-5">Imagen optimizada:</p>
                        <img  class="ms-5" src="assets/imgs/ejemplo1Opt.jpg" alt="IMG_Ej1Optimizada" height="700px">
                        <p class="h6 ms-5">Tamaño: 1,25 MB (-28,2%)</p>
                    </div>
                </div>
                <p class="h3 ms-3">Ejemplo 2 (.png)</p>
                <div class="d-flex justify-content-center">
                    <div>
                        <p class="h4 ms-5">Imagen original:</p>
                        <img  class="ms-5" src="assets/imgs/ejemplo2.png" alt="IMG_Ej1Original" height="700px">
                        <p class="h6 ms-5">Tamaño: 1,13 MB</p>
                    </div>
                    <div>
                        <p class="h4 ms-5">Imagen optimizada:</p>
                        <img  class="ms-5" src="assets/imgs/ejemplo2Opt.png" alt="IMG_Ej2Optimizado" height="700px">
                        <p class="h6 ms-5">Tamaño: 335 KB (-70,4%)</p>
                    </div>
                </div>
            </div>
            <p class="h1" style="color:#295F98">Optimiza tu propia imagen:</p>
            <p class="text-danger">Atención, si la imagen ya está optimizada, no va a cambiar en nada</p>
            <form action="./accion/imagenAccion.php" method="post" enctype="multipart/form-data">
                <p class="h3">Ingrese una imagen para optimizar (.jpeg, .jpg o .png)</p>
                <label class="form-label" for="imagen">Imagen:</label>
                <input class="form-control" type="file" name="imagen" id="imagen">
                <input type="submit" class="btn m-2 bg-success text-white" value="Enviar">
                <input type="reset" class="btn m-2 bg-danger text-white" value="Borrar">
            </form>
        </div>
    </div>
    <?php
    include 'estructura/footer.php';
    ?>
</body>
</html>