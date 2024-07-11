<?php

    REQUIRE('abrir_conexion.php');

    $consulta = "SELECT
                pk_id_actriz,
                nombre_actriz
                FROM
                actrices
                ORDER BY
                nombre_actriz ASC";
    
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
    
    <form action="form_actualizar_actriz_datos.php" method="get">
        <fieldset>
            <legend>Seleccionar actriz</legend>
            <p>
                <label for="nombre_actriz">Nombre:</label>
                <select id="nombre_actriz" name="nombre_actriz">
                <?php
                    while($fila = $datos->fetch_assoc()){
                        echo "<option value='{$fila['pk_id_actriz']}'>{$fila['nombre_actriz']}</option>";
                    }
                ?>
                <option value="" selected hidden>Seleccione una actriz</option>
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