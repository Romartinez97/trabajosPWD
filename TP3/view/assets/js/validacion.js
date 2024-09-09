$(document).ready(function () {

    //Método para verificar que el año de la película sea válido (entre 1895 y 2024)
    jQuery.validator.addMethod("validarAnioPelicula", function (value, element) {
        return this.optional(element) || value >= 1895 && value <= 2024;
    }, "Ingrese un año válido (entre 1895 y 2024)");

    //Método para verificar que se ingresen solos caracteres alfanuméricos
    jQuery.validator.addMethod("alfanumerico", function (value, element) {
        return this.optional(element) || /^(?! )[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ0-9,.\s]+$/i.test(value);

    }, "Utilice solo caracteres alfanuméricos");

    //Método para verificar que se ingresen solos caracteres alfabéticos
    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^(?! )[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ,.\s]+$/i.test(value);
    }, "Ingrese solo caracteres alfabéticos");

    // Función para verificar el tamaño del archivo
    $.validator.addMethod('tamanio', function (value, element, param) {
        return this.optional(element) || (element.files[0] && element.files[0].size <= param);
    }, 'El archivo debe pesar menos de {0} bytes');

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
                min:1,
            },
            restriccion: {
                required: true,
            },
            sinopsis: {
                required: true,
                alfanumerico: true,
                maxlength: 300,
            },
            archivo: {
                required: true,
                tamanio: 20000000,
                extension: "jpg|jpeg|png",
            },

        },

        messages: {
            duracion: {
                maxlength: "Ingrese un número de máximo 3 cifras",
                min: "Ingrese una duración válida (mayor a 0 minutos)",
            },
            sinopsis: {
                maxlength: "Ingrese un máximo de 300 caracteres",
            },
            archivo: {
                required: "Seleccione una imagen para adjuntar a la ficha",
                tamanio: "La imagen debe pesar menos de 5MB",
                extension: "Solo se permiten archivos .jpg, .jpeg y .png",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    })
});