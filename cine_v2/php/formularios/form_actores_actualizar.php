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
    <title>Actualizar datos actor</title>
    <link rel="stylesheet" href="../../css/administrar.css">

</head>
<body>

    <form action="../actualizar_datos/actualizar_actor.php" method="get">
        <fieldset>
            <legend>Modificar datos actor</legend>
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
            <p>
                <label for="foto_actor">Fotografía:</label>
                <input type="file" id="foto_actor" name="foto_actor">
            </p>
            <p>
                <label for="edad_actor">Edad:</label>
                <input type="number" name="edad_actor" id="edad_actor">
            </p>
            <p>
                <label for="fecha_nacimiento_actor">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento_actor" name="fecha_nacimiento_actor">
            </p>
            <p>
                <label for="nacionalidad_actor">Nacionalidad:</label>
                <input type="text" name="nacionalidad_actor" id="nacionalidad_actor">
            </p>
            <p>
                <label for="oscar">Oscar:</label>
                <select name="oscar" id="oscar">
                    <option value="S">Sí</option>
                    <option value="N">No</option>
                    <option value="" selected hidden></option>
                </select>
            </p>
            <!-- <p>
                <label for="actor_fallecido">Fallecido:</label>
                <select name="actor_fallecido" id="actor_fallecido">
                    <option value="S">Sí</option>
                    <option value="N">No</option>
                    <option value="" selected hidden></option>
                </select>
            </p> -->
            <p>Fallecido:
                <label for="si">Sí
                    <input type="radio" id="si" name="actor_fallecido" value="S">
                </label>
                <label for="no">No
                    <input type="radio" id="no" name="actor_fallecido" value="N">
                </label>
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