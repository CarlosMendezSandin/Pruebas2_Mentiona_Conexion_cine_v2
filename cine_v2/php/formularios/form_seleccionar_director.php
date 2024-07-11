<?php

    REQUIRE('abrir_conexion.php');

    $consulta = "SELECT
                pk_id_director,
                nombre_director
                FROM
                director
                ORDER BY
                nombre_director ASC";
    
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
    
    <form action="form_actualizar_director_datos.php" method="get">
        <fieldset>
            <legend>Seleccionar director</legend>
            <p>
                <label for="nombre_director">Nombre:</label>
                <select id="nombre_director" name="nombre_director">
                <?php
                    while($fila = $datos->fetch_assoc()){
                        echo "<option value='{$fila['pk_id_director']}'>{$fila['nombre_director']}</option>";
                    }
                ?>
                <option value="" selected hidden>Seleccione un director</option>
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