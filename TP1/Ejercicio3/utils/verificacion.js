// Función para verificar si el texto contiene solo letras y espacios
function esAlfabetico(texto) {
    const regex = /^[A-Za-z ]+$/; 
    return regex.test(texto);
}

//Función para verificar si el texto contiene solo letras, números y espacios
function esAlfanumerico(texto){
    const regex = /^[a-zA-Z0-9 ]*$/;
    return regex.test(texto);
}

// Función para validar el formulario
function validarFormulario(event) {
    console.log('Validando formulario');
    const nombre = document.getElementById("nombre").value.trim();
    const apellido = document.getElementById('apellido').value.trim();
    const direccion = document.getElementById('direccion').value.trim();

    let esValido = true;

    // Verificar si el nombre contiene solo letras
    if (!esAlfabetico(nombre)) {
        alert('El nombre solo debe contener letras.');
        esValido = false; 
    }

    // Verificar si el apellido contiene solo letras
    if (!esAlfabetico(apellido)) {
        alert('El apellido solo debe contener letras.');
        esValido = false; 
    }

    //Verificar si la dirección contiene solo letras y números
    if (!esAlfanumerico(direccion)){
        alert("La dirección solo debe contener letras y números.");
        esValido = false;
    }

    // Evitar el envío del formulario si la validación falla
    if (!esValido) {
        event.preventDefault();
    }

    return esValido; 
}

// Asociar la función de validación al evento submit del formulario
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formInfoPersonal');
    form.addEventListener('submit', validarFormulario);
});
