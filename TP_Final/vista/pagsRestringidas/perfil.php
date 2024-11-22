<?php
include_once '../../util/funciones.php';
$sesion = new Session();
$titulo = "Registro";

//Verifico si el usuario está logueado
if (!$sesion->estaLogueado()) {
    header('Location: ../pagsPublicas/login.php');
    exit();
} else {
    include "../../estructura/headerSeguro2.php";
}

$abmUsuario = new AbmUsuario();
$param = ['idusuario' => $sesion->getUsuario()];
$usuario = $abmUsuario->buscar($param);

if (count($usuario) > 0) {
    $usuario = $usuario[0];
    $idUsuario = $usuario->getIdUsuario();
    $nombreus = $usuario->getusnombre();
    $usmail = $usuario->getusmail();
    $uspass = $usuario->getuspass();
    $usdeshabilitado = $usuario->getusdeshabilitado();
}
?>


<div id="page-container">
    <div class="text-center p-4">
        <p class="display-5">Bienvenido, <?php echo $nombreus ?> </p>
    </div>

    <?php
    if (isset($_GET['estado']) && $_GET['estado'] == 1) {
        echo
            '<div class="container">
            <div class="alert alert-success" role="alert">Datos personales actualizados.</div>
            </div>';
    }
    if (isset($_GET['estado']) && $_GET['estado'] == 2) {
        echo
            '<div class="container">
            <div class="alert alert-danger" role="alert">ERROR: No se pudieron actualizar los datos personales.</div>
            </div>';
    }
    ?>

    <div class="container">
        <div class="div-form">
            <p class="h5 pb-4">Modificar datos personales: </p>
            <form method="post">
                <div class="mb-3">
                    <label for="usnombre" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="usnombre" name="usnombre"
                        value="<?php echo $nombreus ?>" required>
                </div>
                <div class="mb-3">
                    <label for="usmail" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="usmail" name="usmail" value="<?php echo $usmail ?>"
                        required>
                </div>
                <div class="mb-3">
                    <label for="uspass" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="uspass" name="uspass">
                </div>
                <input type="hidden" name="uspassactual" value="<?php echo $uspass ?>">
                <input type="hidden" name="idusuario" value="<?php echo $idUsuario ?>">
                <input type="hidden" name="usdeshabilitado" value="<?php echo $usdeshabilitado ?>">
                <button type="submit" class="btn text-white mb-4" id="botonLogin">Actualizar</button>

            </form>
            <div class="pb-5">
            <form action="accion/eliminarLogin.php" method="post">
                <input type="hidden" name="idusuario" value="<?php echo $idUsuario ?>">
                <button type="submit" class="btn bg-danger text-white" id="eliminarUsuario">Eliminar
                    usuario</button>
            </form>
            </div>
        </div>
    </div>
</div>

<?php
include '../../estructura/footer.php';
?>

</body>

</html>
<script>
  $(document).ready(function(){
    $("form").on ("submit",function(event){
      event.preventDefault();

      var form = $(this);
      var url = '../accion/actualizarDatosUsuario.php';
      var formData = form.serialize();
      console.log(formData);

      $.ajax({
        type: 'POST',
        url: url,
        data:formData,
        success: function(response) {
          const result = JSON.parse(response);
            if (result.success) {
              alert('Éxito');
            } else {
            alert('Error1: ' + result.message);
            }
        },
        error: function() {
          alert('Error2');
        }
      });
    });
  });
</script>