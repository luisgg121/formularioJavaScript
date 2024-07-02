// alert("Ya cargué validacion.js");

const btnEnviar = document.getElementById("btnEnviar");
// alert(btnEnviar.value);

const validarFormulario = (e) => {
    e.preventDefault();

    const miElemento = document.getElementById("reporte"); // Limpiamos el reporte de la validación.
    miElemento.innerHTML = ""; 

    var autor = document.forms["formulario"]["autor"].value;
    var email = document.forms["formulario"]["email"].value;
    var telefono = document.forms["formulario"]["telefono"].value;
    var libro = document.forms["formulario"]["libro"].value;
    var fecha = document.forms["formulario"]["fecha"].value;
    var resumen = document.forms["formulario"]["resumen"].value;
    var url = document.forms["formulario"]["url"].value;

    // alert("ya leí las variables del formulario");

    var error = false;
    var expRegular = "";

    expRegular = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
    if (autor === null || autor.length === 0 || ! expRegular.test(autor)) {
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
    // alert("Fecha: " + fecha);
    expRegular = /^\d{4}\-\d{2}\-\d{2}$/;
    // if (fecha === null || fecha.length == 0 || ! expRegular.test(fecha)) {
        if (fecha === null || fecha.length == 0 || ! expRegular.test(fecha)) {    
        document.getElementById('fechaErr').textContent = 'Por favor ingresa una fecha válida de publicación del libro.';
        error = true;
    }
    else {
        document.getElementById('fechaErr').textContent = "";
        
    }

    // Validando el resumen 
    if (resumen === null || resumen.length == 0) {
        document.getElementById('resumenErr').textContent = "El resumen del libro es requerido";
        error = true;
    }
    else {
        document.getElementById('resumenErr').textContent = "";
        
    }


    // Validando la URL    
    expRegular = /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;
    if (url === null || url.length == 0 || ! expRegular.test(url)) {
        document.getElementById('urlErr').textContent = "Un URL válido es requerido, debe iniciar con https o ftp";
        error = true;
    } else {
        document.getElementById('urlErr').textContent = "";
        
    }

    // Si todas las comprobaciones son correctas, se presenta el reporte de campos validados   
    if (!error) {
            param = document.createElement("h2");
            node = document.createTextNode("Los datos se han validado exitosamente 👍");
            param.appendChild(node);
            document.getElementById('reporte').appendChild(param);

            param = document.createElement("p");
            node = document.createTextNode("Autor: " + autor);
            param.appendChild(node);
            document.getElementById('reporte').appendChild(param);

            param = document.createElement("p");
            node = document.createTextNode("Email: " + email);
            param.appendChild(node);
            document.getElementById('reporte').appendChild(param);

            param = document.createElement("p");
            node = document.createTextNode("Teléfono: " + telefono);
            param.appendChild(node);
            document.getElementById('reporte').appendChild(param);

            param = document.createElement("p");
            node = document.createTextNode("Nombre del libro: " + libro);
            param.appendChild(node);
            document.getElementById('reporte').appendChild(param);

            param = document.createElement("p");
            node = document.createTextNode("Fecha de publicación : " + fecha);
            param.appendChild(node);
            document.getElementById('reporte').appendChild(param);

            param = document.createElement("p");
            node = document.createTextNode("Resumen : " + resumen);
            param.appendChild(node);
            document.getElementById('reporte').appendChild(param);

            param = document.createElement("p");
            node = document.createTextNode("Website del libro : " + url );
            param.appendChild(node);
            document.getElementById('reporte').appendChild(param);
        } else {
            param = document.createElement("h2");
            node = document.createTextNode("Hay información inválida ❌");
            param.appendChild(node);
            document.getElementById('reporte').appendChild(param);
            
            param = document.createElement("p");
            node = document.createTextNode("Por favor corrija los datos!");
            param.appendChild(node);
            document.getElementById('reporte').appendChild(param);
        }
    }

btnEnviar.addEventListener("click", validarFormulario);


/* COMENTARIOS AL CÓDIGO DE VALIDACIÓN

En la siguiente línea de código definimos el elemento btnEnviar el cual nos servirá para escuchar el evento clic (ver última línea del código)
  
const btnEnviar = document.getElementById("btnEnviar");

A continuación, creamos una función flecha que nos servirá para validar el formulario:

const validarFormulario = (e) => {
    e.preventDefault();

    const miElemento = document.getElementById("reporte"); 

Limpiamos el reporte de la validación.
    miElemento.innerHTML = ""; 

y leemos los datos cargados en el formulario:
    var autor = document.forms["formulario"]["autor"].value;
    var email = document.forms["formulario"]["email"].value;
    ...

    Vamos a validar con expresiones regulares, antes inicializamos la variable “error” a false, si encontramos algún error en la validación le asignamos true a dicha variable  
    var error = false;
    var expRegular = "";

Ya que todas las validaciones son similares, solamente explicaremos la relativa al campo email.
Primero se define la expresión regular:
    expRegular = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
y validamos que email cumpla con dicha expresión:
    if (expRegular.test(email))
        document.getElementById('emailErr').textContent = "";
en caso contrario presentamos un mensaje de error junto al valor del campo en el formulario.
    else {
        document.getElementById('emailErr').textContent = 'Por favor ingresa un email válido.';
        error = true;
    }

Si todas las comprobaciones son correctas, se presenta el reporte de campos validados   
    if (!error) {
            param = document.createElement("h2");
            node = document.createTextNode("Los datos se han validado exitosamente 👍");
            param.appendChild(node);
            document.getElementById('reporte').appendChild(param);

            param = document.createElement("p");
            node = document.createTextNode("Autor: " + autor);
            param.appendChild(node);
            document.getElementById('reporte').appendChild(param);
… y seguimos desplegandp todos los campos del formulario con sus valores.



En el caso de que exista algún error, éste se despliega junto al campo en cuestión y adicionalmente se genera una nota al final del formulario:
        } else {
            param = document.createElement("h2");
            node = document.createTextNode("Hay información inválida ❌");
            param.appendChild(node);
            document.getElementById('reporte').appendChild(param);
            
            param = document.createElement("p");
            node = document.createTextNode("Por favor corrija los datos!");
            param.appendChild(node);
            document.getElementById('reporte').appendChild(param);
        }
    }

Aquí escuchamos el clic soble el botón “btnEnviar:
btnEnviar.addEventListener("click", validarFormulario);
 */