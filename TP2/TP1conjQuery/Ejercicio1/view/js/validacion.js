$(document).ready(function () {

    $("#formNumero").validate({

        rules: {
            numIngresado: {
                required: true,
                number: true,
            },
        },

        messages: {
            numIngresado: {
                required: "Por favor, ingrese un número",
                number: "El dato ingresado debe ser un número",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    })
});