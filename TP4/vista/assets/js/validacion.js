$(document).ready(function () {

    //Método para verificar que se ingresen solos caracteres alfanuméricos
    jQuery.validator.addMethod("alfanumerico", function (value, element) {
        return this.optional(element) || /^(?! )[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ0-9,.\s]+$/i.test(value);

    }, "Utilice solo caracteres alfanuméricos");

    //Método para verificar que se ingresen solos caracteres alfabéticos
    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^(?! )[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ,.\s]+$/i.test(value);
    }, "Ingrese solo caracteres alfabéticos");

    $.validator.messages.required = "Dato requerido";
    $.validator.messages.number = "Ingrese solo números decimales";

    //Validación de formularios de Ejercicio 4
    //Formulario de buscarAuto.php
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

    $("#formNuevaPersona").validate({

        rules: {
            nroDni: {
                required: true,
                number: true,
                min: 1,
                max: 9999999999,
            },
            nombre: {
                required: true,
                lettersonly: true,
                max: 50,
            },
            apellido: {
                required: true,
                lettersonly: true,
                max: 50,
            },
            fechaNac: {
                required: true,
            },
            codigoArea: {
                required: true,
                number: true,
                min: 1,
                max: 999,
            },
            telefono: {
                required: true,
                number: true,
            },
            domicilio: {
                required: true,
                alfanumerico: true,
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    })

    //Formulario de buscarPersona.php
    $("#formBuscarPersona").validate({

        rules: {
            nroDni: {
                required: true,
                number: true,
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    })
    //Formulario de accionBuscarPersona.php
    $("#actualizarDatosPersona").validate({

        rules: {
            nombre: {
                required: true,
                lettersonly: true,
            },
            apellido: {
                required: true,
                lettersonly: true,
            },
            fechaNac: {
                required: true,
            },
            telefono: {
                required: true,
                number: true,
            },
            domicilio: {
                required: true,
                alfanumerico: true,
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    })



});