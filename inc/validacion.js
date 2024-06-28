alert("Ya cargué validacion.js");

const btnEnviar = document.getElementById("btnEnviar");
alert(btnEnviar.value);

const validarFormulario = (e) => {
    e.preventDefault();

    var autor = document.forms["formulario"]["autor"].value;
    var email = document.forms["formulario"]["email"].value;

    if (autor === "") {
        alert("Por favor ingresa el nombre del autor.");
        return false;
    }

    const patronEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (patronEmail.test(email)) 
        document.getElementById('emailErr').textContent = "";   
    else {
        document.getElementById('emailErr').textContent = 'Por favor ingresa un email válido.';
        return false;
    }



    // Si todas las comprobaciones son correctas, retorna true
    return true;
}


alert("Voy a entrar a: " + "creación de btnEnviar.addEventListener");
btnEnviar.addEventListener("click", validarFormulario);
alert("Exito en creación de btnEnviar.addEventListener");


function validarAutor() {
    var valor = document.getElementById("autor").value;

    if (valor === null || valor.length === 0 || /^\s+$/.test(valor)) {
        alert("Falta llenar el campo de autor.");
        return false;
    } else {
        return true;
    }
}

function validarEmail(email) {
    const patronEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return patronEmail.test(email);
}

const emailInput = document.getElementById('email');
const emailValido = validarEmail(emailInput.value);
if (!emailValido) {
    alert("Por favor, ingresa una dirección de correo electrónico válida.");
    emailInput.focus();
}
