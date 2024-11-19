<?php
include_once '../../util/funciones.php';

$sesion=new Session();
$titulo = "Ver Pedidos";

if (!$sesion->estaLogueado() || !in_array($sesion->getRol(), [1, 3])) {
    header('Location: ../pagsPublicas/login.php');
    exit();
} else {
    include "../../estructura/headerSeguro.php";
}

$abmCompra=new AbmCompra();
$compras=$abmCompra->buscar(null);
//idcompra
//cofecha fecha de la compra
//idusuario is del usuario que realizo la compra
$abmcompraestado=new AbmCompraEstado();
$comprasestado=$abmcompraestado->buscar(null);
//idcompraestado
//idcompra (objcompra)
//idcompraestadotipo (objcompraestadotipo(estado del pedido 1, 2, 3, 4))
//cefechaini
//cefehcafin
$abmcompraitem=new AbmCompraItem();
$comprasitem=$abmcompraitem->buscar(null);
//idcompraitem
//idproducto(objproducto)
//idcompra(objcompra)
//cicantidad
?>
<div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="text-center p-4">
            <p class="display-5">Lista de Pedidos:</p>
        </div>
    </div>

    <div class="container p-4 my-4 justify-content-center">
<?php
foreach($compras as $comp){
    $idpedido=$comp->getIdcompra();
    $usuariopedido=$comp->getobjusuario()->getusnombre();//usuario que realizo el pedido
    //-- parametro para buscar el pedido en las otras clases
    $param=["idcompra" => $idpedido];
    //-- buscar producto y cantidad del producto de la compra
    $compraitem=$abmcompraitem->buscar($param);
    $compraitem=$compraitem[0];
    $producto=$compraitem->getobjproducto()->getpronombre();//producto
    $cantprod=$compraitem->getcicantidad();//cantidad del producto comprado
    //-- buscar estado de la compra
    $compraestado=$abmcompraestado->buscar($param);
    $compraestado=$compraestado[0];
    $estado=$compraestado->getobjcompraestadotipo()->getidcompraestadotipo();
?>
<div class="card mb-3">
    <div class="card-header">
      <strong>ID Pedido:</strong><?php echo $idpedido ?>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <p class="mb-0"><strong>Usuario:</strong> <?php echo $usuariopedido; ?></p>
        <?php
        if($estado==1){
            echo "<span class='badge bg-warning text-dark'>Iniciada</span>";
        }elseif($estado==2){
            echo "<span class='badge bg-success'>Aceptada</span>";
        }elseif($estado==3){
            echo "<span class='badge bg-primary'>Enviada</span>";
        }elseif($estado==4){
            echo "<span class='badge bg-danger'>Cancelada</span>";
        }else{
            echo "<span class='badge bg-secondary'>Desconocido</span>";
        }
        ?>
      </div>
      <h5>Producto</h5>
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <span><strong>Producto:</strong> <?php echo $producto; ?></span>
          <span><strong>Cantidad:</strong> <?php echo $cantprod; ?></span>
        </li>
      </ul>
    </div>
  </div>
<?php
}
include '../../estructura/footer.php';
?>
</div>