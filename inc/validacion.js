alert("Ya cargué validacion.js");

const btnEnviar = document.getElementById("btnEnviar");
// alert(btnEnviar.value);

const validarFormulario = (e) => {
    e.preventDefault();

    var autor = document.forms["formulario"]["autor"].value;
    var email = document.forms["formulario"]["email"].value;
    var telefono = document.forms["formulario"]["telefono"].value;
    var libro = document.forms["formulario"]["libro"].value;
    var fecha = document.forms["formulario"]["fecha"].value;
    var resumen = document.forms["formulario"]["resumen"].value;
    var url = document.forms["formulario"]["url"].value;

    alert("ya leí las variables del formulario");

    var error = false;
    var expRegular = "";

    expRegular = /^\s+$/
    // alert(expRegular);
    if (autor === null || autor.length === 0 || !expRegular.test(autor)) {
        document.getElementById('autorErr').textContent = 'Por favor ingresa el nombre del autor.';
        error = true;
    } else {
        document.getElementById('autorErr').textContent = "";

    }

    expRegular = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
    if (expRegular.test(email))
        document.getElementById('emailErr').textContent = "";
    else {
        document.getElementById('emailErr').textContent = 'Por favor ingresa un email válido.';
        error = true;
    }

    // Validamos el número de teléfono
    expRegular = /^[0-9]*$/;
    if (telefono === null || telefono.length != 10 || !expRegular.test(telefono)) {
        document.getElementById('telefonoErr').textContent = 'Por favor ingresa un número telfónico válido de 10 dígitos.';
        error = true;
    } else {
        document.getElementById('telefonoErr').textContent = "";
    }

    // Validando el nombre del libro 
    expRegular = /^[a-zA-ZÀ-ž0-9_\sñáéíóúÁÉÍÓÚ]*$/;
    if (libro === null || libro.length == 0 || !expRegular.test(libro)) {
        document.getElementById('libroErr').textContent = 'Por favor ingresa el nombre del libro.';
        error = true;
    } else {
        document.getElementById('libroErr').textContent = "";
    }

    // Validando la fecha de publicación 
    expRegular = /^\d{2}\/\d{2}\/\d{4}$/;
    if (fecha === null || fecha.length == 0 || !expRegular.test(fecha)) {
        document.getElementById('fechaErr').textContent = 'Por favor ingresa la fecha de publicación del libro.';
        error = true;
    }
    else {
        document.getElementById('fechaErr').textContent = "";
    }


    // Si todas las comprobaciones son correctas, se presenta el reporte de campos validados
    if (!error) {


    }
    else {


    }

}


alert("Voy a entrar a: " + "creación de btnEnviar.addEventListener");
btnEnviar.addEventListener("click", validarFormulario);
alert("Exito en creación de btnEnviar.addEventListener");



