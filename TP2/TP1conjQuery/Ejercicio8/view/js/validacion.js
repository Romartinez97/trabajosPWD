$(document).ready(function () {


    $("#formPrecioEntrada").validate({

        rules: {
            edad: {
                required: true,
                number: true,
                min: 6,
                max: 110,
            },
        },

        messages: {
            edad: {
                required: "Por favor, ingrese su edad",
                number: "Utilice solo números",
                min: "El número ingresado debe ser mayor o igual a 6",
                max: "El número ingresado debe ser menor o igual a 110",
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    })
});