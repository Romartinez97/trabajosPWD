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

//Valido formulario de Ejercicio 4

    $("#formBuscarAuto").validate({

        rules: {
            patente: {
                required: true,
                alfanumerico: true,
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    })


    
});