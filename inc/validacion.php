<!-- Filename: validacion.php -->

<?php
// Para definir variables
// Para mostrar errores
$autorErr = "";
$emailErr = "";
$telefonoErr = "";
$libroErr = "";
$fechaErr = "";
$resumenErr = "";
$urlErr = "";

// Para los datos del libro
$autor = "";
$email = "";
$telefono = "";
$libro = "";
$fecha = "";
$resumen = "";
$url = "";

// Validación de los campos de entrada

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación del nombre del autor
    if (empty($_POST["autor"])) {
        $autorErr = "El nombre del autor es requerido";
    } else {
        $autor = input_data($_POST["autor"]);
        // Checamos que el nombre del autor contenga únicamente letras del alfabeto, espacios, números y guiones bajos.
        if (!preg_match("/^[a-zA-Z0-9_\sñáéíóúÁÉÍÓÚ]*$/", $autor)) {
            $autorErr = "Únicamente letras del alfabeto, números y guión bajo son permitidos para el nombre del autor";
        }
    }

    // Validamos el email
    if (empty($_POST["email"])) {
        $emailErr = "El Email es requerido";
    } else {
        $email = input_data($_POST["email"]);
        // Checamos que el e-mail esté bien formateado
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de email inválido";
        }
    }

    // Validamos el número de teléfono
    if (empty($_POST["telefono"])) {
        $telefonoErr = "El número telefónico es requerido";
    } else {
        $telefono = input_data($_POST["telefono"]);
        if (!preg_match("/^[0-9]*$/", $telefono)) {
            $telefonoErr = "Únicamente valores numéricos son permitidos!!";
        }
        // Checamos que la longitud sea de 10  dígitos
        if (strlen($telefono) != 10) {
            $telefonoErr = "Por favor introduzca un número telefónico de 10 digitos!!";
        }
    }

    // Validando el nombre del libro 
    if (empty($_POST["libro"])) {
        $libroErr = "El nombre del libro es requerido";
    } else {
        $libro = input_data($_POST["libro"]);
        // Checamos que el nombre del libro contenga únicamente letras del alfabeto, números, espacios y guión bajo.
        if (!preg_match("/^[a-zA-ZÀ-ž0-9_\sñáéíóúÁÉÍÓÚ]*$/", $libro)) {
            $libroErr = "Únicamente letras del alfabeto, números y guión bajo son permitidos para el nombre del libro";
        }
    }

    // Validando la fecha de publicación 
    if (empty($_POST["fecha"])) {
        $fechaErr = "La fecha es requerida";
    } else {
        $fecha = input_data($_POST["fecha"]);
        $fechaComoEntero = $fechaComoEntero = strtotime($fecha);
        $anio = date("Y", $fechaComoEntero);
        $mes = date("m", $fechaComoEntero);
        $dia = date("d", $fechaComoEntero);
        if (!checkdate($mes, $dia, $anio)) {
            $fechaErr = "El formato de fecha es erroneo";
        }
    }

    // Validando el resumen 
    if (empty($_POST["resumen"])) {
        $resumenErr = "El resumen del libro es requerido";
    }
    // Permitimos cualquier caracter en el resumen
    else {
        $resumen = input_data($_POST["resumen"]);
    }


    // Validando la URL    
    if (empty($_POST["url"])) {
        $urlErr = "El URL es requerido";
    } else {
        $url = input_data($_POST["url"]);
        // Validando la sintaxis de l aURL
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
            $urlErr = "El URL no es válido, debe inicias con https o ftp";
        }
    }
}


// Para manejar espacios en blanco y caracteres especiales en los datos
function input_data($data)
{
    $data = trim($data); // para remover espacios al inicio de los datos
    // Para evitar ataques Cross-Site Scripting (XSS) debemos convertir caracteres especiales en sus correspondientes entidades HTML, ejemplo - "&" -> "&amp"
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!-- 
Explicación del funcionamiento del código implementado:

Inicialmente definimos e inicializamos las variables tanto para mostrar errores como para los datos del libro que recibimos para validación.

Para mostrar errores de validación
$autorErr = "";
$emailErr = "";
$telefonoErr = "";
$libroErr = "";
$fechaErr = "";
$resumenErr = "";
$urlErr = "";

Para los datos del libro
$autor = "";
$email = "";
$telefono = "";
$libro = "";
$fecha = "";
$resumen = "";
$url = "";

Validación de los campos de entrada recibidos con el método POST
Únicamente explicaré la validación de un campo, en este caso el nombre del autor, ya que todas las validaciones son similares

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación del nombre del autor
    // Primero validamos que el campo no sea vacío
    if (empty($_POST["autor"])) {
        $autorErr = "El nombre del autor es requerido";
    } else {
        $autor = input_data($_POST["autor"]);
        // Checamos que el nombre del autor contenga únicamente letras del alfabeto, espacios, números y guiones bajos.
        if (!preg_match("/^[a-zA-Z0-9_\sñáéíóúÁÉÍÓÚ]*$/", $autor)) {
            $autorErr = "Únicamente letras del alfabeto, números y guión bajo son permitidos para el nombre del autor";
        }
    }

...     
}


// Para manejar espacios en blanco y caracteres especiales en los datos utilizamos la siguiente función:
function input_data($data)
{
    $data = trim($data); // para remover espacios al inicio de los datos
    // Para evitar ataques Cross-Site Scripting (XSS) debemos convertir caracteres especiales en sus correspondientes entidades HTML, ejemplo - "&" -> "&amp"
    $data = htmlspecialchars($data);
    return $data;
}

-->