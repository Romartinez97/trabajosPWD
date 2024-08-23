$(document).ready(function(){

    $.validator.addMethod("distintoDe", function(value, element, param){
        return this.optional(element) || value != $(param).val();
    }, "La contraseña no puede ser igual al usuario")

    $.validator.addMethod("letrasNumeros", function(value, element, param){
        return this.optional(element) || (/[a-zA-Z]/.test(value) && /[0-9]/.test(value));
    }, "La contraseña debe contener letras y numeros")


    $("#form-login").validate({
        rules:{
            "usuario":{
                required: true
            },
            "contrasenia":{
                required: true,
                minlength: 8,
                distintoDe: "#usuario",
                letrasNumeros: true
            }
        },
        messages:{
            "usuario":{
                required: "Este campo es obligatorio"
            },
            "contrasenia":{
                required: "Este campo es obligatorio",
                minlength: "Debe contener al menos 8 caracteres",
            }
        }
    });
});

