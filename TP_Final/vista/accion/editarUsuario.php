<?php
include_once '../../util/funciones.php';
$datos=data_submitted();

    $sesion=new Session();
    $titulo="Editar Usuario";
    include "../../estructura/headerSeguro2.php";
    $objusuario=new AbmUsuario();
    $param=["idusuario" => $datos["id"]];
    $usuario=$objusuario->buscar($param);
    $usuario=$usuario[0];
?>
<div id="page-container">
    <div class="text-center p-4">
        <p class="display-5"><?php echo "Informacion del usuario '".$usuario->getusnombre()."' con ID ".$datos["id"] ?></p>
    </div>

    <div class="container">
        <div class="div-form">
            <p class="h5 pb-4">Modificar datos de usuario: </p>
            <form action="adminActualizaUsuario.php" method="post">
                <div class="mb-3">
                    <label for="usnombre" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="usnombre" name="usnombre"
                        value="<?php echo $usuario->getusnombre() ?>" required>
                </div>
                <div class="mb-3">
                    <label for="usmail" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="usmail" name="usmail" value="<?php echo $usuario->getusmail(); ?>"
                        required>
                </div>
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label><br>
                    <input type="radio" id="admin" name="rol" value="1"<?php
                    if($datos["rol"]==1){echo "checked";}?> >
                    <label for="admin">Admin</label>

                    <input type="radio" id="cliente" name="rol" value="2"<?php
                    if($datos["rol"]==2){echo "checked";}?> >
                    <label for="admin">Cliente</label>
                    
                    <input type="radio" id="deposito" name="rol" value="3"<?php
                    if($datos["rol"]==3){echo "checked";}?> >
                    <label for="admin">Deposito</label>
                </div>
                <input type="hidden" id="id" name="id" value="<?php
                echo $datos["id"]?>">
                <button type="submit" class="btn text-white mb-4" id="botonLogin">Actualizar</button>

            </form>
        </div>
    </div>
</div>