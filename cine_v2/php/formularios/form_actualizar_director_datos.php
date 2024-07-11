<?php

    REQUIRE('abrir_conexion.php');

    $pk_id_director = $_REQUEST['nombre_director'];

    $consulta = "SELECT
                *
                FROM
                director
                WHERE
                pk_id_director = ?
                ORDER BY
                nombre_director ASC";
    
    $datos = $conexion->prepare($consulta);

    /* Vincula el "?" del WHERE  con el valor de la variable $pk_id_director */

    $datos->bind_param('i', $pk_id_director);

    $datos->execute();

    $resultado = $datos->get_result();

    $fila = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form actualizar director</title>
    <link rel="stylesheet" href="../../css/administrar.css">


</head>
<body>

    <!-- Form en el que se puede actualizar los datos vacios (sin valor) de los directores
     y en caso contrario (con valor) muestra lo guardado en la Base de Datos -->
    
    <form action="../actualizar_datos/actualizar_director.php" method="get">
        <fieldset>
            <legend>Modificar datos director</legend>
            <p>
                <label for="pk_id_director">ID:</label>
                <input type="text" id="pk_id_director" name="pk_id_director" value="<?=$fila['pk_id_director']?>" readonly>
            </p>
            <p>
                <label for="nombre_director">Nombre:</label>
                <input type="text" id="nombre_director" name="nombre_director" value="<?=$fila['nombre_director']?>">
            </p>
            <p>
                <label for="foto_director">Fotografía:</label>
                <input type="file" id="foto_director" name="foto_director">
                <img src="../../<?=$fila['foto_director']?>" alt="Fotografía del director" title="Fotografía del director" id="img_profesional">

            </p>
            <p>
                <label for="edad_director">Edad:</label>
                <input type="number" id="edad_director" name="edad_director" value="<?= $fila['edad_director'] ?>">

            </p>
            <p>
                <label for="fecha_nacimiento_director">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento_director" name="fecha_nacimiento_director" value="<?= $fila['fecha_nacimiento_director'] ?>">
            </p>
            <p>
                <label for="nacionalidad_director">Nacionalidad:</label>
                <input type="text" id="nacionalidad_director" name="nacionalidad_director" value="<?= $fila['nacionalidad_director'] ?>">
            </p>
            <p>
                <label for="oscar_director">Oscar:</label>
                <select name="oscar_director" id="oscar_director" >
                    <option value="S" <?=$fila['oscar_director'] == 'S' ? 'selected' : ''?>>Si</option>
                    <option value="N" <?=$fila['oscar_director'] == 'N' ? 'selected' : ''?>>No</option>
                    <option value="" <?=$fila['oscar_director'] == '' ? 'selected' : ''?> hidden>Seleccione una opción</option>

                </select>
            </p>
            <p>
                <label for="director_fallecido">Fallecido:</label>
                <label for="si">Sí
                    <input type="radio" id="si" name="director_fallecido" value="S" <?=$fila['director_fallecido'] == 'S' ? 'checked' : ''?>>
                </label>
                <label for="no">No
                <input type="radio" id="no" name="director_fallecido" value="N" <?=$fila['director_fallecido'] == 'N' ? 'checked' : ''?>>
                </label>
            </p>
            <p>
            <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo" value="<?= $fila['sexo'] ?>">
                    <option value="Hombre" <?=$fila['sexo'] == 'Hombre' ? 'selected' : ''?>>Hombre</option>
                    <option value="Mujer" <?=$fila['sexo'] == 'Mujer' ? 'selected' : ''?>>Mujer</option>
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