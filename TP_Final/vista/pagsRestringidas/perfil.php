<?php
include_once '../../util/funciones.php';
$sesion = new Session();
$titulo = "Registro";
include "../../estructura/header.php";

//Verifico si el usuario está logueado
if(!$sesion->estaLogueado()){
    header('Location: ../pagsPublicas/login.php');
    exit();
}

$objUsuario = new Usuario();
$nombreus = $objUsuario->getUsNombre();
?>

<div id="page-container">
    <div class="text-center p-4">
        <p class="display-5">Bienvenido, <?php echo $nombreus ?> </p>
    </div>
</div>

<?php
include '../../estructura/footer.php';
?>

</body>

</html>