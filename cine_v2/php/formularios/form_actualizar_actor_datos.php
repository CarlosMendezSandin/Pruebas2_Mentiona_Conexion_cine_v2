<?php

    REQUIRE('abrir_conexion.php');

    $pk_id_actor = $_REQUEST['nombre_actor'];

    $consulta = "SELECT
                *
                FROM
                actores
                WHERE
                pk_id_actor = ?
                ORDER BY
                nombre_actor ASC";
    
    $datos = $conexion->prepare($consulta);

    /* Vincula el "?" del WHERE  con el valor de la variable $pk_id_actor */

    $datos->bind_param('i', $pk_id_actor);

    $datos->execute();

    $resultado = $datos->get_result();

    $fila = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form actualizar actor</title>
    <link rel="stylesheet" href="../../css/administrar.css">


</head>
<body>

    <!-- Form en el que se puede actualizar los datos vacios (sin valor) de las actrices
     y en caso contrario (con valor) muestra lo guardado en la Base de Datos -->
    
    <form action="../actualizar_datos/actualizar_actor.php" method="get">
        <fieldset>
            <legend>Modificar datos actor</legend>
            <p>
                <label for="pk_id_actor">ID:</label>
                <input type="text" id="pk_id_actor" name="pk_id_actor" value="<?=$fila['pk_id_actor']?>" readonly>
            </p>
            <p>
                <label for="nombre_actor">Nombre:</label>
                <input type="text" id="nombre_actor" name="nombre_actor" value="<?=$fila['nombre_actor']?>">
            </p>
            <p>
                <label for="foto_actor">Fotografía:</label>
                <input type="file" id="foto_actor" name="foto_actor">
                <img src="../../<?=$fila['foto_actor']?>" alt="Fotografía del actor" title="Fotografía del actor" id="img_profesional">

            </p>
            <p>
                <label for="edad_actor">Edad:</label>
                <input type="number" id="edad_actor" name="edad_actor" value="<?= $fila['edad_actor'] ?>">

            </p>
            <p>
                <label for="fecha_nacimiento_actor">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento_actor" name="fecha_nacimiento_actor" value="<?= $fila['fecha_nacimiento_actor'] ?>">
            </p>
            <p>
                <label for="nacionalidad_actor">Nacionalidad:</label>
                <input type="text" id="nacionalidad_actor" name="nacionalidad_actor" value="<?= $fila['nacionalidad_actor'] ?>">
            </p>
            <p>
                <label for="oscar">Oscar:</label>
                <select name="oscar" id="oscar" >
                    <option value="S" <?=$fila['oscar'] == 'S' ? 'selected' : ''?>>Si</option>
                    <option value="N" <?=$fila['oscar'] == 'N' ? 'selected' : ''?>>No</option>
                    <option value="" <?=$fila['oscar'] == '' ? 'selected' : ''?> hidden>Seleccione una opción</option>

                </select>
            </p>
            <p>
                <label for="actor_fallecido">Fallecido:</label>
                <label for="si">Sí
                    <input type="radio" id="si" name="actor_fallecido" value="S" <?=$fila['actor_fallecido'] == 'S' ? 'checked' : ''?>>
                </label>
                <label for="no">No
                <input type="radio" id="no" name="actor_fallecido" value="N" <?=$fila['actor_fallecido'] == 'N' ? 'checked' : ''?>>
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