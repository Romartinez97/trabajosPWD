<?php
include_once '../../util/funciones.php';
$titulo = "Carrito";

$sesion = new Session();

$datos = data_submitted();
$mensaje = "";

if (!empty($datos)) {//cuando se realiza la compra del carrito da error aca (linea 11 y 13) porque no existen esos indices en $datos
    $idproducto = $datos['idproducto'];
    $cantidad = 1;
    $origen = $datos['origen'];
    $genero = isset($datos['genero']) ? $datos['genero'] : '';

    $abmProducto = new AbmProducto();
    $producto = $abmProducto->buscar(['idproducto' => $idproducto])[0];
    $pronombre = $producto->getPronombre();
    $proprecio = $producto->getProprecio();
    $procantstock = $producto->getprocantstock();

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    $productoExistente = false;
    foreach ($_SESSION['carrito'] as $item) {
        if ($item['idproducto'] == $idproducto) {
            $productoExistente = true;
            $mensaje = 1;
            break;
        }
    }

    if (!$productoExistente && !isset($datos['update'])) {
        $_SESSION['carrito'][] = [
            'idproducto' => $idproducto,
            'pronombre' => $pronombre,
            'proprecio' => $proprecio,
            'cantidad' => $cantidad,
            'cantstock' => $procantstock
        ];
        $mensaje = 2;
    }

    if ($origen == "listadoLibros") {
        header("Location: listadoLibros.php?mensaje=" . $mensaje);
    } elseif ($origen == "index") {
        header("Location: index.php?mensaje=" . $mensaje);
    } elseif ($origen == "pagGenero") {
        header("Location: pagGenero.php?genero=" . $genero . "&mensaje=" . $mensaje);
    }
    exit();
}


include "../../estructura/headerSeguro.php";


/*
$estado = isset($_GET['estado']) ? $_GET['estado'] : '';
$mensaje = "";

if ($estado == 1) {
    $mensaje = "Compra realizada con éxito.";
}
*/
?>

<div id="page-container">
    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="text-center p-4">
            <p class="display-5">Carrito</p>
        </div>
    </div>
    <div class="container">

        <div class="text-center pb-4">
            <?php if ($mensaje) { ?>
                <div class="alert alert-warning" role="alert">
                    <b><?php echo $mensaje; ?></b>
                </div>
            <?php } ?>
        </div>

        <?php if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])): ?>
            <form action="../accion/accionCarrito.php" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($_SESSION['carrito'] as $index => $item) {
                            $idproducto = $item['idproducto'];
                            $pronombre = $item['pronombre'];
                            $proprecio = $item['proprecio'];
                            $cantstock = $item['cantstock'];
                            $cantidad = 1;
                            ?>
                            <tr>
                                <td><?php echo $item['pronombre']; ?></td>
                                <td><?php echo "$" . $item['proprecio']; ?></td>
                                <td>
                                    <input type="number" name="cantidad<?php echo $i; ?>" value="<?php echo $cantidad; ?>"
                                        min="1" max="<?php echo $cantstock ?>" style="width:4rem" id="cantProductosCarrito">
                                    <input type="hidden" name="idproducto<?php echo $i; ?>" value="<?php echo $idproducto; ?>">
                                    <input type="hidden" name="pronombre<?php echo $i; ?>" value="<?php echo $pronombre; ?>">
                                    <input type="hidden" name="proprecio<?php echo $i; ?>" value="<?php echo $proprecio; ?>">
                                </td>
                                <td id="total-<?php echo $index; ?>">
                                    <?php echo "$" . ($proprecio * $cantidad); ?>
                                </td>
                                <td>
                                    <form action="../accion/accionCarrito.php" method="post">
                                        <input type="hidden" name="accion" value="eliminar">
                                        <input type="hidden" name="idproducto" value="<?php echo $item['idproducto']; ?>">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        } ?>
                    </tbody>
                </table>
                <input type="hidden" name="cantprodsunicos" id="cantprodsunicos" value="<?php echo $i - 1; ?>">
                <div class="text-center">
                    <p>Total del carrito: $<span id="total-carrito">0.00</span></p>
                </div>
                <div class="text-center">
                    <button type="submit" name="accion" value="vaciar" class="btn btn-dark">Vaciar carrito</button>
                    <?php if ($sesion->estaLogueado()): ?>
                        <button type="submit" name="accion" value="comprar" class="btn btnAgregar mx-3">Comprar</button>
                    <?php endif; ?>
                </div>
            </form>
        <?php else: ?>
            <p class="h5 text-center">No hay productos en el carrito</p>
        <?php endif; ?>
    </div>
</div>

<?php
include '../../estructura/footer.php';
?>

</body>

</html>