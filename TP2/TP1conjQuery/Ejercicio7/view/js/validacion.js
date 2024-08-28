$(document).ready(function () {


    $("#formCalculadora").validate({

        rules: {
            numero1: {
                required: true,
                number: true,
            },
            numero2: {
                required: true,
                number: true,
            },
        },

        messages: {
            numero1: {
                required: "Por favor, ingrese un número",
                number: "Utilice solo caracteres numéricos",
            },
            numero2: {
                required: "Por favor, ingrese un número",
                number: "Utilice solo caracteres numéricos",
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    })
});