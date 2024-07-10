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
    <title>Actualizar datos director</title>
    <link rel="stylesheet" href="../../css/administrar.css">

</head>
<body>

    <form action="../actualizar_datos/actualizar_director.php" method="get">
        <fieldset>
            <legend>Modificar datos director</legend>
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
            <p>
                <label for="foto_director">Fotografía:</label>
                <input type="file" id="foto_director" name="foto_director">
            </p>
            <p>
                <label for="edad_director">Edad:</label>
                <input type="number" name="edad_director" id="edad_director">
            </p>
            <p>
                <label for="fecha_nacimiento_director">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento_director" name="fecha_nacimiento_director">
            </p>
            <p>
                <label for="nacionalidad_director">Nacionalidad:</label>
                <input type="text" name="nacionalidad_director" id="nacionalidad_director">
            </p>
            <p>
                <label for="oscar_director">Oscar:</label>
                <select name="oscar_director" id="oscar_director">
                    <option value="S">Sí</option>
                    <option value="N">No</option>
                    <option value="" selected hidden></option>
                </select>
            </p>
            <!-- <p>
                <label for="director_fallecido">Fallecido:</label>
                <select name="director_fallecido" id="director_fallecido">
                    <option value="S">Sí</option>
                    <option value="N">No</option>
                    <option value="" selected hidden></option>
                </select>
            </p> -->
            <p>Fallecido:
                <label for="si">Sí
                    <input type="radio" id="si" name="director_fallecido" value="S">
                </label>
                <label for="no">No
                    <input type="radio" id="no" name="director_fallecido" value="N">
                </label>
            </p>
            <p>
            <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo">
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="" selected hidden></option>
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