<?php
include_once '../../util/funciones.php';

$sesion = new Session();
$titulo = "Depósito";

if (!$sesion->estaLogueado() || !in_array($sesion->getRol(), [1, 3])) {
    header('Location: ../pagsPublicas/login.php');
    exit();
}

include "../../estructura/headerSeguro.php";

$abmProducto = new AbmProducto();
$listaProductos = $abmProducto->buscar(null);
?>

<div id="page-container">
    <div class="container">
        <h1 class="text-center my-4 display-5">Listado de Productos</h1>
        <?php if (!empty($listaProductos)) { ?>
            <?php foreach ($listaProductos as $producto) { ?>
                <div class="pb-4 container">
                    <div class="detLibroListado">
                        <form method="post" >
                            <input type="hidden" name="idproducto" value="<?php echo $producto->getidproducto(); ?>">
                            <div class="mb-3">
                                <label for="pronombre" class="form-label h6">Nombre:</label>
                                <input type="text" class="form-control" id="pronombre" name="pronombre"
                                    value="<?php echo $producto->getpronombre(); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="prodetalle" class="form-label h6">Detalle:</label>
                                <input type="text" class="form-control" id="prodetalle" name="prodetalle"
                                    value="<?php echo $producto->getprodetalle(); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="procantstock" class="form-label h6">Cantidad:</label>
                                <input type="number" class="form-control" id="procantstock" name="procantstock"
                                    value="<?php echo $producto->getprocantstock(); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="progenero" class="form-label h6">Género:</label>
                                <input type="text" class="form-control" id="progenero" name="progenero"
                                    value="<?php echo $producto->getprogenero(); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="proprecio" class="form-label h6">Precio:</label>
                                <input type="number" step="0.01" class="form-control" id="proprecio" name="proprecio"
                                    value="<?php echo $producto->getproprecio(); ?>" required>
                            </div>
                            <button type="submit" class="btn" id="botonLogin">Actualizar</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="d-flex pb-4">
                <p class="h4 txtNaranja">No hay stock de productos</p>
            </div>
        <?php } ?>
    </div>
</div>

<?php include '../../estructura/footer.php'; ?>
</body>

</html>
<script>
  $(document).ready(function(){
    $("form").on ("submit",function(event){
      event.preventDefault();

      var form = $(this);
      var url = '../accion/editarProducto.php';
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