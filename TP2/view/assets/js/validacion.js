$(document).ready(function () {

  //Método para verificar que el año de la película sea válido (entre 1895 y 2024)
  jQuery.validator.addMethod("validarAnioPelicula", function (value, element) {
    return this.optional(element) || (value >= 1895 && value <= 2024);
  },
    "Ingrese un año válido (entre 1895 y 2024)"
  );

  //Método para verificar que se ingresen solos caracteres alfanuméricos
  jQuery.validator.addMethod("alfanumerico", function (value, element) {
    return this.optional(element) || /^(?! )[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ0-9,.\s]+$/i.test(value);
  },
    "Utilice solo caracteres alfanuméricos"
  );

  //Método para verificar que se ingresen solos caracteres alfabéticos
  jQuery.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^(?! )[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ,.\s]+$/i.test(value);
  },
    "Ingrese solo caracteres alfabéticos"
  );

  $.validator.addMethod("distintoDe", function (value, element, param) {
    return this.optional(element) || value != $(param).val();
  }, "La contraseña no puede ser igual al usuario")

  $.validator.addMethod("letrasNumeros", function (value, element, param) {
    return this.optional(element) || (/[a-zA-Z]/.test(value) && /[0-9]/.test(value));
  }, "La contraseña debe contener letras y numeros")

  $.validator.messages.required = "Dato requerido";
  $.validator.messages.number = "Ingrese solo números decimales";



  //Valido formulario de Ejercicio 1
  $("#formNumero").validate({

    rules: {
      numIngresado: {
        required: true,
        number: true,
      },
    },

    submitHandler: function (form) {
      form.submit();
    }
  })

  //Valido formulario de Ejercicio 2
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
        min: "El número ingresado debe ser mayor o igual a 0",
        max: "El número ingresado debe ser menor o igual a 6"
      },
      horasMartes: {
        min: "El número ingresado debe ser mayor o igual a 0",
        max: "El número ingresado debe ser menor o igual a 6"
      },
      horasMiercoles: {
        min: "El número ingresado debe ser mayor o igual a 0",
        max: "El número ingresado debe ser menor o igual a 6"
      },
      horasJueves: {
        min: "El número ingresado debe ser mayor o igual a 0",
        max: "El número ingresado debe ser menor o igual a 6"
      },
      horasViernes: {
        min: "El número ingresado debe ser mayor o igual a 0",
        max: "El número ingresado debe ser menor o igual a 6"
      }
    },

    submitHandler: function (form) {
      form.submit();
    }
  })

  //Validación del formulario de Ejercicio 3 TP 1
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
  });

  //Validación del formulario de Ejercicio 3
  $("#form-login").validate({
    rules: {
      "usuario": {
        required: true
      },
      "contrasenia": {
        required: true,
        minlength: 8,
        distintoDe: "#usuario",
        letrasNumeros: true
      }
    },
    messages: {
      "contrasenia": {
        minlength: "Debe contener al menos 8 caracteres",
      }
    }
  });

  //Validación del formulario de Ejercicio 4
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
        min: 1,
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
        min: "Ingrese una duración válida (mayor a 0 minutos)",
      },
      sinopsis: {
        maxlength: "Ingrese un máximo de 300 caracteres",
      },
    },

    submitHandler: function (form) {
      form.submit();
    },
  });

  //Validación del formulario de Ejercicio 7
  $("#formCalculadora").validate({

    rules: {
      numero1: {
        required: true,
        number: true,
      },
      numero2: {
        required: true,
        number: true,
      },
    },

    submitHandler: function (form) {
      form.submit();
    }
  })

  //Validación del formulario de Ejercicio 8
  $("#formPrecioEntrada").validate({

    rules: {
      edad: {
        required: true,
        number: true,
        min: 6,
        max: 110,
      },
    },

    messages: {
      edad: {
        min: "El número ingresado debe ser mayor o igual a 6",
        max: "El número ingresado debe ser menor o igual a 110",
      },
    },

    submitHandler: function (form) {
      form.submit();
    }
  })

});
