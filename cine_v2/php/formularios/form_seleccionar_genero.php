<?php

    REQUIRE('abrir_conexion.php');

    $consulta = "SELECT
                pk_id_genero,
                nombre_genero
                FROM
                genero
                ORDER BY
                nombre_genero ASC";
    
    $datos = $conexion->query($consulta);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar género</title>
    <link rel="stylesheet" href="../../css/administrar.css">

</head>
<body>
    
    <form action="form_actualizar_genero_datos.php" method="get">
        <fieldset>
            <legend>Seleccionar Género</legend>
            <p>
                <label for="nombre_genero">Nombre:</label>
                <select id="nombre_genero" name="nombre_genero">
                <?php
                    while($fila = $datos->fetch_assoc()){
                        echo "<option value='{$fila['pk_id_genero']}'>{$fila['nombre_genero']}</option>";
                    }
                ?>
                <option value="" selected hidden>Seleccione un género</option>
                </select>
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