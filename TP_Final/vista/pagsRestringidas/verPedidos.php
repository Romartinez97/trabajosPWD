<?php
include_once '../../util/funciones.php';

$sesion = new Session();
$titulo = "Ver Pedidos";

if (!$sesion->estaLogueado() || !in_array($sesion->getRol(), [1, 3])) {
  header('Location: ../pagsPublicas/login.php');
  exit();
}

include "../../estructura/headerSeguro.php";

$abmCompra = new AbmCompra();
$compras = $abmCompra->buscar(null);
//idcompra
//cofecha fecha de la compra
//idusuario is del usuario que realizo la compra
$abmcompraestado = new AbmCompraEstado();
//$comprasestado=$abmcompraestado->buscar(null);
//idcompraestado
//idcompra (objcompra)
//idcompraestadotipo (objcompraestadotipo(estado del pedido 1, 2, 3, 4))
//cefechaini
//cefehcafin
$abmcompraitem = new AbmCompraItem();
//$comprasitem=$abmcompraitem->buscar(null);
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
  foreach ($compras as $comp) {
    $idpedido = $comp->getIdcompra();
    $usuariopedido = $comp->getobjusuario()->getusnombre();//usuario que realizo el pedido
    //-- parametro para buscar el pedido en las otras clases
    $param = ["idcompra" => $idpedido];
    //-- buscar producto y cantidad del producto de la compra
    $compraitem = $abmcompraitem->buscar($param);
    $cantprodunicos = count($compraitem);
    if ($cantprodunicos > 1) {
      $prodsfinal = "";
      for ($i = 0; $i < $cantprodunicos; $i++) {
        $compraitems = $compraitem[$i];
        $producto = $compraitems->getobjproducto()->getpronombre();//producto
        $cantprod = $compraitems->getcicantidad();//cantidad del producto comprado
        $cantstock = $compraitems->getObjProducto()->getprocantstock();//cantstock
        $idprod = $compraitems->getObjProducto()->getIdProducto();//idprod
        $prodsfinal .= '<li class="list-group-item d-flex justify-content-between align-items-center">
            <span><strong>Producto:</strong>' . $producto . '</span>
            <span><strong>Cantidad:</strong>' . $cantprod . '</span>
          </li>
          <input type="hidden" name="cantstockprod' . ($i + 1) . '" value="' . $cantstock . '">
          <input type="hidden" name="idprod' . ($i + 1) . '" value="' . $idprod . '">
          <input type="hidden" name="cantlibros" value="' . $cantprodunicos . '">
          <input type="hidden" name="cantprod' . ($i + 1) . '" value="' . $cantprod . '">';
      }
    } else {
      $compraitem = $compraitem[0];
      $producto = $compraitem->getobjproducto()->getpronombre();//producto
      $cantprod = $compraitem->getcicantidad();//cantidad del producto comprado
      $cantstock = $compraitem->getObjProducto()->getprocantstock();//cantstock
      $idprod = $compraitem->getObjProducto()->getIdProducto();//idprod
      $prodsfinal = '<li class="list-group-item d-flex justify-content-between align-items-center">
            <span><strong>Producto:</strong>' . $producto . '</span>
            <span><strong>Cantidad:</strong>' . $cantprod . '</span>
          </li>
          <input type="hidden" name="cantstock" value="' . $cantstock . '">
          <input type="hidden" name="idprod" value="' . $idprod . '">
          <input type="hidden" name="cantlibros" value="' . $cantprodunicos . '">
          <input type="hidden" name="cantprod" value="' . $cantprod . '">';
    }
    //$compraitem = $compraitem[0];
    //$producto = $compraitem->getobjproducto()->getpronombre();//producto
    //$cantprod = $compraitem->getcicantidad();//cantidad del producto comprado
    //-- buscar estado de la compra
    $compraestado = $abmcompraestado->buscar($param);
    $compraestado = $compraestado[0];
    $estado = $compraestado->getobjcompraestadotipo()->getidcompraestadotipo();
    ?>
    <div class="card mb-3">
      <div class="card-header">
        <strong>ID Pedido:</strong><?php echo $idpedido ?>
      </div>
      <div class="card-body">
        <form action="../accion/actualizarEstadoPedido.php" method="post" id="formestadopedido">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="mb-0"><strong>Usuario:</strong> <?php echo $usuariopedido; ?></p>
            <?php
            if ($estado == 1) {
              echo "<span class='badge bg-warning text-dark'>Iniciada</span>";
            } elseif ($estado == 2) {
              echo "<span class='badge bg-success'>Aceptada</span>";
            } elseif ($estado == 3) {
              echo "<span class='badge bg-primary'>Enviada</span>";
            } elseif ($estado == 4) {
              echo "<span class='badge bg-danger'>Cancelada</span>";
            } else {
              echo "<span class='badge bg-secondary'>Desconocido</span>";
            }
            ?>
          </div>
          <h5>Producto</h5>
          <ul class="list-group">
            <?php echo $prodsfinal; ?>
          </ul>
          <div class="mt-3">
            <p class="text-end fs-5"><strong>Costo Total: <?php echo $comp->getcosto(); ?></strong></p>
          </div>
          <!--
        <input type="submit" class="btn btn-danger me-2" value="Cancelar">
        <input type="submit" class="btn btn-success" value="Aceptar">
        <input type="submit" class="btn btn-primary" value="Enviar">
        -->
          <?php
          echo '<div class="mt-3 d-flex justify-content-end">';
          if ($estado == 1) { // Estado Iniciado
            ?>
            <input type="submit" class="btn btn-danger me-2" name="nuevoEstado" value="Cancelar" onclick="estadocancelar()">
            <input type="submit" class="btn btn-success" name="nuevoEstado" value="Aceptar" onclick="estadoaceptar()">
            <?php
          } elseif ($estado == 2) { // Estado Aceptado
            ?>
            <input type="submit" class="btn btn-danger me-2" name="nuevoEstado" value="Cancelar" onclick="estadocancelar()">
            <input type="submit" class="btn btn-primary" name="nuevoEstado" value="Enviar" onclick="estadoenviar()">
          <?php
          }
          echo '</div>';
          ?>
          <input type="hidden" name="idpedido" value="<?php echo $idpedido ?>">
          <input type="hidden" name="estadoActual" value="<?php echo $estado ?>">
          <input type="hidden" id="nuevoEstado" name="nuevoEstados" value="">
        </form>
      </div>
    </div>
    <?php
  }
  ?>
</div>

<?php include '../../estructura/footer.php'; ?>
</body>

</html>
<script>
  $(document).ready(function(){
    $("#formestadopedido").on ("submit",function(event){
      event.preventDefault();

      var form = $(this);
      var url = '../accion/actualizarEstadoPedido.php';

      // Agregar manualmente el valor del botón que fue presionado
      var nuevoEstado = $("input[type='submit']:focus").val();  // Se obtiene el valor del botón presionado
      form.find("input[name='nuevoEstados']").val(nuevoEstado);  // Se pone el valor en el campo hidden

      var formData = form.serialize();
      console.log(formData);

      $.ajax({
        type: 'POST',
        url: url,
        data:formData,
        success: function(response) {
          alert ("estado cambiado");
          const result = JSON.parse(response);
            if (result.success) {
              alert('Éxito');
              reload();
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