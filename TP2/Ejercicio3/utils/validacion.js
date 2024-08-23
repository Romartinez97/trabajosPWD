$(document).ready(function () {

    $("#formUsuario").validate({

        rules: {
            usuario: {
                required: true,
                alfanumerico: true,
            },
            clave: {
                required: true,
                validarClave: true,
                noEsIgualA: "#usuario",
                minlength: 8,
            },
        },

        messages: {
            usuario: {
                required: "Ingrese su usuario",
                alfanumerico: "Por favor, ingrese un usuario válido (solo letras y números)",
            },
            clave: {
                required: "Ingrese su contraseña",
                validarClave: "Por favor, ingrese una clave válida (al menos una letra y un número)",
                minlength: "La clave debe tener un mínimo de 8 caracteres",
                noEsIgualA: "El usuario y la contraseña no pueden ser iguales",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    })
});