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
                <li><a class="active" href="formato.php">Formato</a></li>
                <li><a href="acerca.html">Acerca de</a></li>
            </ul>
        </div>
        <div class="contenedor">
            <h2>Alta de libros:</h2>
            <form method="post" class="container" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="autor" class="etiqueta">Nombre completo del autor:</label><br>
                <input type="text" id="autor" name="autor" maxlength="50" size="50" value="<?php echo htmlspecialchars($autor); ?>">
                <div class="error"><?php echo $autorErr; ?></div><br><br>
                <label for="email" class="etiqueta">Email</label><br>
                <input type="email" name="email" size="50" value="<?php echo htmlspecialchars("$email"); ?>">
                <div class="error"><?php echo $emailErr; ?></div><br><br>
                <label for="telefono" class="etiqueta">Teléfono</label><br>
                <input type="tel" name="telefono" size="50" value="<?php echo htmlspecialchars("$telefono"); ?>">
                <div class="error"><?php echo $telefonoErr; ?></div><br><br>
                <label for="libro" class="etiqueta">Nombre del libro:</label><br>
                <input type="text" id="libro" name="libro" maxlength="50" size="50" value="<?php echo htmlspecialchars("$libro"); ?>">
                <div class="error"><?php echo $libroErr; ?></div><br><br>
                <label for="fecha" class="etiqueta">Fecha de publicación:</label><br>
                <input type="date" id="fecha" name="fecha" value="<?php echo htmlspecialchars("$fecha"); ?>">
                <div class="error"><?php echo $fechaErr; ?></div><br><br>
                <label for="resumen" class="etiqueta">Resumen:</label><br>
                <textarea id="resumen" name="resumen" rows="10" cols="100" maxlength="1000" value="<?php echo htmlspecialchars($resumen); ?>"></textarea>
                <div class="error"><?php echo $resumenErr; ?></div><br><br>
                <label for="url" class="etiqueta">Website del libro:</label><br>
                <input type="url" name="url" maxlength="50" size="50" value="<?php echo htmlspecialchars("$url"); ?>">
                <div class="error"><?php echo $urlErr; ?></div><br><br>
                <input type="submit" name="enviar" value="Enviar" class="btn"><br><br>
            </form>
            <a href="formato.php" display="inline">Para volver a cargar la forma de clic aquí </a><p display="inline">o edite los datos para enviar.</p>
        </div>
    </div>

    <div class="contenedor">
        <?php
        // Checamos si el boton submit ha sido presionado
        if (isset($_POST['enviar'])) {
            // Checamos si hay o no errores:
            if (
                $autorErr == "" && $emailErr == "" && $telefonoErr == "" && $libroErr == "" && $fechaErr == "" && $resumenErr == "" && $urlErr == ""
            ) {
                echo "<p class='msg'>Los datos se han validado exitosamente 👍</p>";
                echo "<h3>La información es :</h3>";
                echo "<p class='info'>Autor : " . $autor . "</p>";
                echo "<p class='info'>Email : " . $email . "</p>";
                echo "<p class='info'>Telefono : " . $telefono . "</p>";
                echo "<p class='info'>Nmbre del libro : " . $libro . "</p>";
                echo "<p class='info'>Fecha de publicación : " . $fecha . "</p>";
                echo "<p class='info'>Resumen : " . $resumen . "</p>";
                echo "<p class='info'>Website del libro : " . $url . "</p>";
                $autor = "";
                $email = "";
                $telefono = "";
                $libro = "";
                $fecha = "";
                $resumen = "";
                $url = "";
            } else {
                echo "<p class='msg'>Hay información inválida ❌
                    <br/>Por favor corrija los datos!</p>";
            }
        }
        ?>
    </div>
</body>

</html>