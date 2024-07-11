<?php

    REQUIRE('abrir_conexion.php');

    $consulta = "SELECT
                pk_id_produccion,
                nombre_produccion
                FROM
                produccion
                ORDER BY
                nombre_produccion ASC";
    
    $datos = $conexion->query($consulta);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar producción</title>
    <link rel="stylesheet" href="../../css/administrar.css">

</head>
<body>
    
    <form action="form_actualizar_produccion_datos.php" method="get">
        <fieldset>
            <legend>Seleccionar Producción</legend>
            <p>
                <label for="nombre_produccion">Nombre:</label>
                <select id="nombre_produccion" name="nombre_produccion">
                <?php
                    while($fila = $datos->fetch_assoc()){
                        echo "<option value='{$fila['pk_id_produccion']}'>{$fila['nombre_produccion']}</option>";
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