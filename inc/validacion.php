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
        if (!preg_match("/^[a-zA-Z0-9_]*$/", $autor)) {
            $autorErr =
                "Only alphabets, numbers, and underscores are allowed for User Name";
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
        $telefonoErr = "Phone Number is required";
    } else {
        $telefono = input_data($_POST["telefono"]);
        // To check that Phone No is well-formed  
        if (!preg_match("/^[0-9]*$/", $telefono)) {
            $telefonoErr = "Only numeric values are allowed!!";
        }
        // To check that Phone No length should not be less and greator than 10  
        if (strlen($telefono) != 10) {
            $telefonoErr = "Please provide a phone number of 10 digits!!";
        }
    }

    // Validating the User Website URL    
    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = input_data($_POST["website"]);
        // To check that URL address syntax is valid  
        if (
            !preg_match(
                "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",
                $website
            )
        ) {
            $urlErr = "You entered an INVALID URL";
        }
    }

    // Checking if user has shared his gender
    // if (empty($_POST["gender"])) {
    //     $genderErr = "Please provide your Gender";
    // } else {
    //     $gender = input_data($_POST["gender"]);
    // }

    // Checking if user has agreed to the terms and conditions  
    // if (!isset($_POST['tc'])) {
    //     $tcErr = "Please accept our terms & conditions.";
    // } else {
    //     $tc = input_data($_POST["tc"]);
    // }
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