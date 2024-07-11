<?php

    REQUIRE('abrir_conexion.php');

    $consulta = "SELECT
                pk_id_actor,
                nombre_actor
                FROM
                actores
                ORDER BY
                nombre_actor ASC";
    
    $datos = $conexion->query($consulta);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar actor</title>
    <link rel="stylesheet" href="../../css/administrar.css">

</head>
<body>
    
    <form action="form_actualizar_actor_datos.php" method="get">
        <fieldset>
            <legend>Seleccionar actor</legend>
            <p>
                <label for="nombre_actor">Nombre:</label>
                <select id="nombre_actor" name="nombre_actor">
                <?php
                    while($fila = $datos->fetch_assoc()){
                        echo "<option value='{$fila['pk_id_actor']}'>{$fila['nombre_actor']}</option>";
                    }
                ?>
                <option value="" selected hidden>Seleccione un actor</option>
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