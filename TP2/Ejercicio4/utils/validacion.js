$(document).ready(function () {

    /**
     * - El año debe permitir ingresar como máximo 4 caracteres y solo números (¿que sean años válidos?)
     * - Duración solo debe permitir un máximo de 3 números
     * - Todos los datos son obligatorios
     * - Al hacer click en Enviar, se deben mostrar todos los datos ingresados en el formulario
     * - El botón borrar debe limpiar el formulario
     */

    //Método para verificar que el año de la película sea válido (entre 1895 y 2024)
    jQuery.validator.addMethod("validarAnioPelicula", function (value, element) {
        return this.optional(element) || value >= 1985 && value <= 2024;
    }, "Ingrese un año válido (entre 1895 y 2024)");

    //Método para verificar que se ingresen solos caracteres alfanuméricos
    jQuery.validator.addMethod("alfanumerico", function (value, element) {
        return this.optional(element) || /^[\w .,:-/]+$/i.test(value);
    }, "Utilice solo caracteres alfanuméricos, espacios y signos de puntuación");

    //Método para verificar que se ingresen solos caracteres alfabéticos
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Ingrese solo caracteres alfabéticos");

    $.validator.messages.required = "Dato requerido";
    $.validator.messages.number = "Ingrese solo números decimales";

    $("#formPelicula").validate({

        rules: {
            titulo: {
                required: true,
                alfanumerico: true,
            },
            actores: {
                required: true,
                lettersonly: true,
            },
            director: {
                required: true,
                lettersonly: true,
            },
            guion: {
                required: true,
                alfanumerico: true,
            },
            produccion: {
                required: true,
                alfanumerico: true,
            },
            anio: {
                required: true,
                number: true,
                validarAnioPelicula: true,
            },
            nacionalidad: {
                required: true,
                lettersonly: true,
            },
            genero: {
                required: true,
            },
            duracion: {
                required: true,
                number: true,
                maxlength: 3,
            },
            restriccion: {
                required: true,
            },
            sinopsis: {
                required: true,
                alfanumerico: true,
                maxlength: 300,
            },

        },

        messages: {
            duracion: {
                maxlength: "Ingrese un número de máximo 3 cifras",
            },
            sinopsis: {
                maxlength: "Ingrese un máximo de 300 caracteres",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    })
});
//});