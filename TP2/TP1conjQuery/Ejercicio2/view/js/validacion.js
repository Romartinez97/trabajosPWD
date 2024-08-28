$(document).ready(function () {

    $("#formHorasCursada").validate({

        rules: {
            horasLunes: {
                required: true,
                number: true,
                min: 0,
                max: 6
            },
            horasMartes: {
                required: true,
                number: true,
                min: 0,
                max: 6
            },
            horasMiercoles: {
                required: true,
                number: true,
                min: 0,
                max: 6
            },
            horasJueves: {
                required: true,
                number: true,
                min: 0,
                max: 6
            },
            horasViernes: {
                required: true,
                number: true,
                min: 0,
                max: 6
            },
        },

        messages: {
            horasLunes: {
                required: "Por favor, ingrese la cantidad de horas",
                number: "El dato ingresado debe ser un número",
                min: "El número ingresado debe ser mayor o igual a 0",
                max: "El número ingresado debe ser menor o igual a 6"
            },
            horasMartes: {
                required: "Por favor, ingrese la cantidad de horas",
                number: "El dato ingresado debe ser un número",
                min: "El número ingresado debe ser mayor o igual a 0",
                max: "El número ingresado debe ser menor o igual a 6"
            },
            horasMiercoles: {
                required: "Por favor, ingrese la cantidad de horas",
                number: "El dato ingresado debe ser un número",
                min: "El número ingresado debe ser mayor o igual a 0",
                max: "El número ingresado debe ser menor o igual a 6"
            },
            horasJueves: {
                required: "Por favor, ingrese la cantidad de horas",
                number: "El dato ingresado debe ser un número",
                min: "El número ingresado debe ser mayor o igual a 0",
                max: "El número ingresado debe ser menor o igual a 6"
            },
            horasViernes: {
                required: "Por favor, ingrese la cantidad de horas",
                number: "El dato ingresado debe ser un número",
                min: "El número ingresado debe ser mayor o igual a 0",
                max: "El número ingresado debe ser menor o igual a 6"
            }
        },

        submitHandler: function (form) {
            form.submit();
        }
    })
});