$(document).ready(function () {

  // Método para verificar que se ingresen solo caracteres alfanuméricos
  jQuery.validator.addMethod(
    "alfanumerico",
    function (value, element) {
      return (
        this.optional(element) ||
        /^(?! )[\p{L}\p{N},.\s-]+$/u.test(value)
      );
    },
    "Utilice solo caracteres alfanuméricos"
  );

  //Método para verificar que se ingresen solos caracteres alfabéticos
  jQuery.validator.addMethod(
    "lettersonly",
    function (value, element) {
      return (
        this.optional(element) ||
        /^(?! )[^\W_]+$/i + $ / i.test(value)
      );
    },
    "Ingrese solo caracteres alfabéticos"
  );

  jQuery.validator.addMethod(
    "formatoNumero",
    function (value, element) {
      return this.optional(element) || /^\d{3}-\d{7}$/.test(value);
    },
    "Ingrese un formato de telefono válido"
  );

  

  $.validator.messages.required = "Dato requerido";
  $.validator.messages.number = "Ingrese solo números decimales";

  //Validación del formulario de languageDetectionEjemplos.php
  $("#formDetectarIdioma").validate({
    rules: {
      textoIngresado: {
        required: true,
        alfanumerico: true,
        minWords: 5,
      },
    },
    messages: {
      textoIngresado: {
        minWords: "Ingrese al menos 5 palabras",
      },
    },

    submitHandler: function (form) {
      form.submit();
    },
  });
});
