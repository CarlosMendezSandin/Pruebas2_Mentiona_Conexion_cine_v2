<?php

    REQUIRE('abrir_conexion.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form género</title>
    <link rel="stylesheet" href="../../css/administrar.css">
</head>
<body>
    
    <form action="../insertar_datos/insertar_genero.php" method="get">
        <fieldset>
            <legend>Nuevo Género</legend>
            <p>
                <label for="nombre_genero">Género:</label>
                <input type="text" id="nombre_genero" name="nombre_genero">
            </p>
            <p>
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion">
            </p>
            <input type="submit" value="Enviar">
            <input type="reset" value="Limpiar">
        </fieldset>
    </form>

    <?php
    
        REQUIRE('cerrar_conexion.php');
    
    ?>

</body>
</html>