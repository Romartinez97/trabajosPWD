$(document).ready(function () {

    // Función para verificar si el texto contiene solo letras y espacios
    function esAlfabetico(texto) {
        const regex = /^[A-Za-z ]+$/;
        return regex.test(texto);
    }

    //Función para verificar si el texto contiene solo letras, números y espacios
    function esAlfanumerico(texto) {
        const regex = /^[a-zA-Z0-9 ]*$/;
        return regex.test(texto);
    }

    $("#formInfoPersonal").validate({

        rules: {
            nombre: {
                required: true,
                esAlfabetico: true,
                maxlength: 50,
            },
            apellido: {
                required: true,
                esAlfabetico: true,
                maxlength: 50,
            },
            edad: {
                required: true,
                number: true,
                min: 10,
                max: 110,
            },
            direccion: {
                required: true,
                esAlfanumerico: true,
                maxlength: 50,
            },
            nivelEstudios: {
                required: true,
            },
            sexo: {
                required: true,
            },
        },

        messages: {
            nombre: {
                required: "Por favor, ingrese su nombre",
                esAlfabetico: "Utilice solo letras",
                maxlength: "El máximo de caracteres permitidos es de 50",
            },
            apellido: {
                required: "Por favor, ingrese su apellido",
                esAlfabetico: "Utilice solo letras",
                maxlength: "El máximo de caracteres permitidos es de 50",
            },
            edad: {
                required: "Por favor, ingrese su edad",
                number: "Utilice solo números",
                min: "El número ingresado debe ser mayor o igual a 10",
                max: "El número ingresado debe ser menor o igual a 110",
            },
            direccion: {
                required: "Por favor, ingrese su dirección",
                esAlfabetico: "Utilice solo letras y números",
                maxlength: "El máximo de caracteres permitidos es de 50",
            },
            nivelEstudios: {
                required: "Por favor, seleccione su nivel de estudios",
            },
            sexo: {
                required: "Por favor, seleccione su sexo",
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    })
});