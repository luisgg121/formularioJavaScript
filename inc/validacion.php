<!-- Filename - validation.php -->

<?php
// For defining variables to empty values  
// For Showing Errors
$autorErr = "";
$emailErr = "";
$telefonoErr = "";
$libroErr = "";
$fechaErr = "";
$resumenErr = "";
$urlErr = "";

// For holding user data
$autor = "";
$email = "";
$telefono = "";
$libro = "";
$fecha = "";
$resumen = "";
$url = "";

// Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validating the User Name 
    if (empty($_POST["autor"])) {
        $autorErr = "Author Name is required";
    } else {
        $autor = input_data($_POST["autor"]);
        // To check that User Name only contains alphabets, numbers, and underscores 
        if (!preg_match("/^[a-zA-Z0-9_\sñáéíóúÁÉÍÓÚ]*$/", $autor)) {
            $autorErr = "Únicamente letras del alfabeto, números y guión bajo son permitidos para el nombre del autor";
        }
    }

    // Validating the User EmailID ID  
    if (empty($_POST["email"])) {
        $emailErr = "Email ID is required";
    } else {
        $email = input_data($_POST["email"]);
        // To check that the e-mail address is well-formed  
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid Email ID format";
        }
    }

    // Validating the User Phone Number 
    if (empty($_POST["telefono"])) {
        $telefonoErr = "El número telefónico es requerido";
    } else {
        $telefono = input_data($_POST["telefono"]);
        // To check that Phone No is well-formed  
        if (!preg_match("/^[0-9]*$/", $telefono)) {
            $telefonoErr = "Únicamente valores numéricos son permitidos!!";
        }
        // To check that Phone No length should not be less and greator than 10  
        if (strlen($telefono) != 10) {
            $telefonoErr = "Por favor introduzca un número telefónico de 10 digitos!!";
        }
    }

    // Validando el nombre del libro 
    if (empty($_POST["libro"])) {
        $libroErr = "El nombre del libro es requerido";
    } else {
        $libro = input_data($_POST["libro"]);
        // To check that User Name only contains alphabets, numbers, and underscores 
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
        if (!checkdate($mes,$dia,$anio)) {
            $fechaErr = "El formato de fecha es erroneo";
        }
    }

    // Validando el resumen 
    if (empty($_POST["resumen"])) {
        $resumenErr = "El resumen del libro es requerido";
    } else {
        $resumen = input_data($_POST["resumen"]);
        // To check that User Name only contains alphabets, numbers, and underscores 
        if (!preg_match("/^[a-zA-ZÀ-ž0-9_\sñáéíóúÁÉÍÓÚ]*$/", $resumen)) {
            $resumenErr = "Únicamente letras del alfabeto, números y guión bajo son permitidos para el nombre del libro";
        }
    }

    // Validating the User Website URL    
    if (empty($_POST["url"])) {
        $urlErr = "El URL es requerido";
    } else {
        $url = input_data($_POST["url"]);
        // To check that URL address syntax is valid  
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
            $urlErr = "El URL no es válido";
        }
    }
}

// For handling whitespaces and special characters in the data
function input_data($data)
{
    // trim() is used to remove any trailing whitespace
    $data = trim($data);
    // htmlspecialchars() is used to convert 
    // special characters into their HTML entities
    // Example - "&" -> "&amp"
    $data = htmlspecialchars($data);
    return $data;
}

?>