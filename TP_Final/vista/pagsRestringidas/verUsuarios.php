<?php
include_once '../../util/funciones.php';
$sesion = new Session();

$titulo = "Usuarios Logueados";

include "../../estructura/headerSeguro.php";
?>

<div id="page-container">
    <?php if ($sesion->getRol() == 1) { ?>
        <div class="container-fluid d-flex align-items-center justify-content-center">
            <div class="text-center p-4">
                <p class="display-5">Lista de Usuarios Logueados:</p>
            </div>
        </div>
        <?php
        if (isset($_GET['usedit']) && $_GET['usedit'] == 1) {
            echo '<div class="alert alert-success" role="alert">Usuario modificado correctamente.</div>';
        }
        ?>
        <div class="container p-4 my-4 justify-content-center">
            <?php
            $objusuario = new AbmUsuario();
            $usuarios = $objusuario->buscar(null);
            foreach ($usuarios as $usuario) {
                $usuariorol = new AbmUsuarioRol();
                $param = ['idusuario' => $usuario->getidusuario()];
                $usrol = $usuariorol->buscar($param);
                $rol = $usrol[0]->getobjrol()->getidrol();
                ?>
                <div class="row align-items-center mb-3 border rounded p-3">
                    <div class="col-md-2 text-center">
                        <span class="badge bg-dark fs-4 p-3">ID: <?php echo $usuario->getidusuario() ?></span>
                    </div>
                    <!-- Información del usuario -->
                    <div class="col-md-4">
                        <h5 class="mb-1"><?php echo $usuario->getusnombre(); ?></h5>
                        <p class="mb-0 text-muted"><?php echo $usuario->getusmail() ?></p>
                    </div>
                    <!-- Roles -->
                    <div class="col-md-3 text-center">
                        <?php
                        if ($rol == 1) {
                            ?>
                            <span class="badge bg-primary fs-5 me-2 p-2">Admin</span>
                            <?php
                        } elseif ($rol == 2) {
                            ?>
                            <span class="badge bg-secondary fs-5 me-2 p-2">Cliente</span>
                            <?php
                        } elseif ($rol == 3) {
                            ?>
                            <span class="badge bg-warning fs-5 me-2 p-2">Deposito</span>
                            <?php
                        }
                        ?>
                        <!-- Añadir más roles según corresponda -->
                    </div>
                    <!-- Botones -->
                    <div class="col-md-3 text-end">
                        <a href="../accion/editarUsuario.php?id=<?php echo $usuario->getidusuario() . "&rol=" . $rol ?>">
                            <button class="btn btn-primary btn-lg me-2">
                                <i class="bi bi-pencil"></i> Editar
                            </button>
                        </a>
                        <?php
                        //if($rol!=1){ ?><!--
            <a href="../accion/editarUsuario.php?accion=borrar&id=<?php echo $usuario->getidusuario() ?>">
            <button class="btn btn-danger btn-lg">
                <i class="bi bi-trash"></i> Borrar
            </button>
            </a>-->
                        <?php
                        //} ?>
                    </div>
                </div>
                <?php
            }
            ?>
        <?php } else { ?>
            <div class="container-fluid d-flex align-items-center justify-content-center">
                <div class="text-center p-4">
                    <p class="display-5">Usted no es admin:</p>
                </div>
            </div>
        <?php } ?>

    </div>


    <?php
    include '../../estructura/footer.php';
    ?>
    </body>

    </html>