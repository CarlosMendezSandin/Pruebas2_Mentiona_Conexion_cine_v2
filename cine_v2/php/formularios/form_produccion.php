<?php

    REQUIRE('abrir_conexion.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form producción</title>
    <link rel="stylesheet" href="../../css/administrar.css">
</head>
<body>
    
    <form action="../insertar_datos/insertar_produccion.php" method="get">
        <fieldset>
            <legend>Nueva Producción</legend>
            <p>
                <label for="nombre_produccion">Producción:</label>
                <input type="text" id="nombre_produccion" name="nombre_produccion">
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