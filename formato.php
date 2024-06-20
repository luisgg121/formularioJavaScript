<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php require "./inc/validacion.php" ?>
    <div>
        <div id="menu" class="contenedor">
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="principito.html">El Principito</a></li>
                <li><a class="active" href="formato.html">Formato</a></li>
                <li><a href="acerca.html">Acerca de</a></li>
            </ul>
        </div>
        <div class="contenedor">
            <h2>Alta de libros:</h2>
            <form method="post" class="container" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="autor" class="etiqueta">Nombre completo del autor:</label><br>
                <input type="text" id="autor" name="autor" maxlength="50" size="50" value="<?php echo htmlspecialchars($autor); ?>">
                <?php echo $autorErr; ?><br><br>
                <label for="email" class="etiqueta">Email</label><br>
                <input type="email" name="email" size="50">
                <?php echo $emailErr; ?><br><br>
                <label for="telefono" class="etiqueta">Teléfono</label><br>
                <input type="tel" name="telefono" size="50"><br><br>
                <label for="libro" class="etiqueta">Nombre del libro:</label><br>
                <input type="text" id="libro" name="libro" maxlength="50" size="50" pattern="([^\s][A-zÀ-ž\s]+)"><br><br>
                <label for="fecha" class="etiqueta">Fecha de publicación:</label><br>
                <input type="date" id="fecha" name="fecha"><br><br>
                <label for="resumen" class="etiqueta">Resumen:</label><br>
                <textarea id="resumen" name="resumen" rows="10" cols="100" maxlength="1000"></textarea><br>
                <label for="website" class="etiqueta">Website del libro:</label><br>
                <input type="url" name="website" maxlength="50" size="50"><br><br>
                <input type="submit" name="enviar" value="Enviar" class="btn"><br><br>
            </form>
        </div>
    </div>

    <?php
    // Checking if submit button is pressed or not
    if (isset($_POST['enviar'])) {
        // Checking if there is any error or not
        if (
            $autorErr == "" && $emailErr == "" && $telefonoErr == "" && $libroErr == "" && $fechaErr == "" && $resumenErr == "" && $urlErr == ""
        ) {
            echo "<p class='msg'>You have been sucessfully registered👍</p>";
            echo "<h3>Your Details are :</h3>";
            echo "<p class='info'>Autor : " . $autor . "</p>";
            echo "<p class='info'>Email : " . $email . "</p>";
            echo "<p class='info'>Telefono : " . $telefono . "</p>";
            echo "<p class='info'>Libro : " . $libro . "</p>";
            echo "<p class='info'>Resumen : " . $resumen . "</p>";
            echo "<p class='info'>Website : " . $website . "</p>";
            $autor = "";
            $email = "";
            $telefono = "";
            $libro = "";
            $fecha = "";
            $resumen = "";
            $url = "";
        } else {
            echo "<p class='msg'>You shared Invalid details❌
                    <br/>Please provide correct data!</p>";
        }
    }
    ?>

</body>

</html>