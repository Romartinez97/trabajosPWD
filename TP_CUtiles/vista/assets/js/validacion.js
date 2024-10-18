$(document).ready(function () {
  // Método para verificar que no se coloque un espacio al inicio de un campo
  jQuery.validator.addMethod(
    "sinEspacioInicial",
    function (value, element) {
      return this.optional(element) || /^[^\s]/.test(value);
    },
    "No se permiten espacios iniciales"
  );

  $.validator.messages.required = "Dato requerido";

  //Validación del formulario de languageDetectionEjemplos.php
  $("#formDetectarIdioma").validate({
    rules: {
      textoIngresado: {
        required: true,
        sinEspacioInicial: true,
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
