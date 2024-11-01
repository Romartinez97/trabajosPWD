$(document).ready(function () {

    //Método para verificar que se ingresen solos caracteres alfanuméricos
    jQuery.validator.addMethod("alfanumerico", function (value, element) {
        return this.optional(element) || /^(?! )[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ0-9,.\s]+$/i.test(value);

    }, "Utilice solo caracteres alfanuméricos");

    //Método para verificar que se ingresen solos caracteres alfabéticos
    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^(?! )[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ,.\s]+$/i.test(value);
    }, "Ingrese solo caracteres alfabéticos");

    jQuery.validator.addMethod("formatoNumero", function (value, element) {
        return this.optional(element) || /^\d{3}-\d{7}$/.test(value);
    }, "Ingrese un formato de telefono válido");

    $.validator.messages.required = "Dato requerido";
    $.validator.messages.number = "Ingrese solo números decimales";

    //Validación de formularios de Ejercicio 4
    //Formulario de buscarAuto.php
    $("#formBuscarAuto").validate({

        rules: {
            patente: {
                required: true,
                alfanumerico: true,
                minlength: 6,
                maxlength: 10,
            },
        },
        messages: {
            patente: {
                minlength: "La patente no puede tener menos de 6 caracteres",
                maxlength: "La patente no puede tener más de 10 caracteres",
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
                maxlength: 10,
            },
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
            fechaNac: {
                required: true,
            },
            codigoArea: {
                required: true,
                number: true,
                min: 1,
                maxlength: 3,
            },
            telefono: {
                required: true,
                number: true,
                maxlength: 15,
            },
            domicilio: {
                required: true,
                alfanumerico: true,
                maxlength: 200,
            },
        },
        messages: {
            nroDni: {
                min: "El DNI no puede ser menor a 1",
                maxlength: "El DNI no puede tener más de 10 caracteres",
            },
            nombre: {
                maxlength: "El nombre no puede tener más de 50 caracteres",
            },
            apellido: {
                maxlength: "El apellido no puede tener más de 50 caracteres",
            },
            codigoArea: {
                min: "El código de área no puede ser menor a 1",
                maxlength: "El código de área no puede tener más de 3 caracteres",
            },
            telefono: {
                maxlength: "El teléfono no puede tener más de 15 caracteres",
            },
            domicilio: {
                maxlength: "El domicilio no puede tener más de 200 caracteres",
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
                min: 1,
                maxlength: 10,
            },
        },
        messages: {
            nroDni: {
                min: "El DNI no puede ser menor a 1",
                maxlength: "El DNI no puede tener más de 10 caracteres",
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    })
    //Formulario de accionBuscarPersona.php
    $("#formActualizarPersona").validate({

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
            fechaNac: {
                required: true,
            },
            telefono: {
                required: true,
                formatoNumero: true,
                maxlength: 20,
            },
            domicilio: {
                required: true,
                alfanumerico: true,
                maxlength: 200,
            },
        },
        messages: {
            nroDni: {
                min: "El DNI no puede ser menor a 1",
                maxlength: "El DNI no puede tener más de 10 caracteres",
            },
            nombre: {
                maxlength: "El nombre no puede tener más de 50 caracteres",
            },
            apellido: {
                maxlength: "El apellido no puede tener más de 50 caracteres",
            },
            telefono: {
                maxlength: "El teléfono no puede tener más de 20 caracteres",
            },
            domicilio: {
                maxlength: "El domicilio no puede tener más de 200 caracteres",
            },
        },

        submitHandler: function (form) {
            form.submit();
        }
    })

    //Formulario de nuevoAuto.php
    $("#formNuevoAuto").validate({
        rules:{
            patente: {
                required: true,
                alfanumerico: true,
                minlength: 6,
                maxlength: 10,
            },
            marca: {
                required: true,
            },
            modelo: {
                required: true,
                number: true,
                maxlength:9
            },
            dniDuenio: {
                required: true,
                number: true,
                minlength: 1,
                maxlength: 10,
            },
        },
        messages:{
            patente: {
                minlength: "La patente no puede tener menos de 6 caracteres",
                maxlength: "La patente no puede tener más de 10 caracteres",
            },
            dniDuenio: {
                minlength: "El DNI no puede tener menos de 1 numero",
                maxlength: "El DNI no puede tener más de 10 caracteres",
            }
        },

        submitHandler: function (form) {
            form.submit();
        }
    })

    //formulario de cambioDuenio.php
    $("#formCambioDuenio").validate({
        rules: {
            patente: {
                required: true,
                alfanumerico: true,
                minlength: 6,
                maxlength: 10,
            },
            dni: {
                required: true,
                number: true,
                minlength: 1,
                maxlength: 10,
            }
        },
        messages: {
            patente: {
                minlength: "La patente no puede tener menos de 6 caracteres",
                maxlength: "La patente no puede tener más de 10 caracteres",
            },
            dniDuenio: {
                minlength: "El DNI no puede tener menos de 1 numero",
                maxlength: "El DNI no puede tener más de 10 caracteres",
            }
        },

        submitHandler: function (form) {
            form.submit();
        }
    })

});