$(document).ready(function () {

    //Método para verificar que se ingresen solos caracteres alfabéticos
    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ,.\s]+$/i.test(value);
    }, "Ingrese solo caracteres alfabéticos");

    //Método para verificar que se ingresen solos caracteres alfanuméricos
    jQuery.validator.addMethod("alfanumerico", function (value, element) {
        return this.optional(element) || /^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ0-9,.\s]+$/i.test(value);

    }, "Utilice solo caracteres alfanuméricos");

    $.validator.messages.required = "Dato requerido";
    $.validator.messages.number = "Ingrese solo números decimales";

    $("#formInfoPersonal").validate({

        rules: {
            nombre: {
                required: true,
                lettersonly: true,
                maxlength: 50,
            },
            apellido: {
                required: true,
                lettersonly: true,
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
                alfanumerico: true,
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
                maxlength: "El máximo de caracteres permitidos es de 50",
            },
            apellido: {
                maxlength: "El máximo de caracteres permitidos es de 50",
            },
            edad: {
                min: "El número ingresado debe ser mayor o igual a 10",
                max: "El número ingresado debe ser menor o igual a 110",
            },
            direccion: {
                maxlength: "El máximo de caracteres permitidos es de 50",
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    })
});