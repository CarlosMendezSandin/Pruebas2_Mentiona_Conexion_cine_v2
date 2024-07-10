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
    <title>Actualizar datos actriz</title>
    <link rel="stylesheet" href="../../css/administrar.css">

</head>
<body>

    <form action="../actualizar_datos/actualizar_actriz.php" method="get">
        <fieldset>
            <legend>Modificar datos actriz</legend>
            <p>
                <label for="nombre_actriz">Nombre:</label>
                <select id="nombre_actriz" name="nombre_actriz">
                <?php
                    while($fila = $datos->fetch_assoc()){
                        echo "<option value='{$fila['pk_id_actriz']}'>{$fila['nombre_actriz']}</option>";
                    }
                ?>
                <option value="" selected hidden>Seleccione un actriz</option>
                </select>
            </p>
            <p>
                <label for="foto_actriz">Fotografía:</label>
                <input type="file" id="foto_actriz" name="foto_actriz">
            </p>
            <p>
                <label for="edad_actriz">Edad:</label>
                <input type="number" name="edad_actriz" id="edad_actriz">
            </p>
            <p>
                <label for="fecha_nacimiento_actriz">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento_actriz" name="fecha_nacimiento_actriz">
            </p>
            <p>
                <label for="nacionalidad_actriz">Nacionalidad:</label>
                <input type="text" name="nacionalidad_actriz" id="nacionalidad_actriz">
            </p>
            <p>
                <label for="oscar_actriz">Oscar:</label>
                <select name="oscar_actriz" id="oscar_actriz">
                    <option value="S">Sí</option>
                    <option value="N">No</option>
                    <option value="" selected hidden></option>
                </select>
            </p>
            <!-- <p>
                <label for="actriz_fallecido">Fallecido:</label>
                <select name="actriz_fallecido" id="actriz_fallecido">
                    <option value="S">Sí</option>
                    <option value="N">No</option>
                    <option value="" selected hidden></option>
                </select>
            </p> -->
            <p>Fallecido:
                <label for="si">Sí
                    <input type="radio" id="si" name="actriz_fallecido" value="S">
                </label>
                <label for="no">No
                    <input type="radio" id="no" name="actriz_fallecido" value="N">
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