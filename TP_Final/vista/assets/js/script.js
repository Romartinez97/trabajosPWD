document.addEventListener('DOMContentLoaded', function () {
    const cantidadInputs = document.querySelectorAll('#cantProductosCarrito');

    function actualizarTotalCarrito() {
        let totalCarrito = 0;
        cantidadInputs.forEach((input, index) => {
            const cantidad = parseInt(input.value);
            const precio = parseFloat(input.closest('tr').querySelector('td:nth-child(2)').textContent.replace('$', ''));
            totalCarrito += precio * cantidad;
        });
        document.getElementById('total-carrito').textContent = totalCarrito.toFixed(2);
    }

    cantidadInputs.forEach((input, index) => {
        input.addEventListener('change', function () {
            const cantidad = parseInt(this.value);
            const precio = parseFloat(this.closest('tr').querySelector('td:nth-child(2)').textContent.replace('$', ''));
            const totalField = document.getElementById(`total-${index}`);
            totalField.textContent = `$${(precio * cantidad).toFixed(2)}`;
            actualizarTotalCarrito();

        });
    });

    actualizarTotalCarrito();
});