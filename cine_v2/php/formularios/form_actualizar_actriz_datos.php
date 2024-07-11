<?php

    REQUIRE('abrir_conexion.php');

    $pk_id_actriz = $_REQUEST['nombre_actriz'];

    $consulta = "SELECT
                *
                FROM
                actrices
                WHERE
                pk_id_actriz = ?
                ORDER BY
                nombre_actriz ASC";
    
    $datos = $conexion->prepare($consulta);

    /* Vincula el "?" del WHERE  con el valor de la variable $pk_id_actriz */

    $datos->bind_param('i', $pk_id_actriz);

    $datos->execute();

    $resultado = $datos->get_result();

    $fila = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form actualizar actriz</title>
    <link rel="stylesheet" href="../../css/administrar.css">


</head>
<body>

    <!-- Form en el que se puede actualizar los datos vacios (sin valor) de las actrices
     y en caso contrario (con valor) muestra lo guardado en la Base de Datos -->
    
    <form action="../actualizar_datos/actualizar_actriz.php" method="get">
        <fieldset>
            <legend>Modificar datos actriz</legend>
            <p>
                <label for="pk_id_actriz">ID:</label>
                <input type="text" id="pk_id_actriz" name="pk_id_actriz" value="<?=$fila['pk_id_actriz']?>" readonly>
            </p>
            <p>
                <label for="nombre_actriz">Nombre:</label>
                <input type="text" id="nombre_actriz" name="nombre_actriz" value="<?=$fila['nombre_actriz']?>">
            </p>
            <p>
                <label for="foto_actriz">Fotografía:</label>
                <input type="file" id="foto_actriz" name="foto_actriz">
                <img src="../../<?=$fila['foto_actriz']?>" alt="Fotografía del actriz" title="Fotografía del actriz" id="img_profesional">

            </p>
            <p>
                <label for="edad_actriz">Edad:</label>
                <input type="number" id="edad_actriz" name="edad_actriz" value="<?= $fila['edad_actriz'] ?>">

            </p>
            <p>
                <label for="fecha_nacimiento_actriz">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento_actriz" name="fecha_nacimiento_actriz" value="<?= $fila['fecha_nacimiento_actriz'] ?>">
            </p>
            <p>
                <label for="nacionalidad_actriz">Nacionalidad:</label>
                <input type="text" id="nacionalidad_actriz" name="nacionalidad_actriz" value="<?= $fila['nacionalidad_actriz'] ?>">
            </p>
            <p>
                <label for="oscar_actriz">Oscar:</label>
                <select name="oscar_actriz" id="oscar_actriz" >
                    <option value="S" <?=$fila['oscar_actriz'] == 'S' ? 'selected' : ''?>>Si</option>
                    <option value="N" <?=$fila['oscar_actriz'] == 'N' ? 'selected' : ''?>>No</option>
                    <option value="" <?=$fila['oscar_actriz'] == '' ? 'selected' : ''?> hidden>Seleccione una opción</option>

                </select>
            </p>
            <p>
                <label for="actriz_fallecida">Fallecido:</label>
                <label for="si">Sí
                    <input type="radio" id="si" name="actriz_fallecida" value="S" <?=$fila['actriz_fallecida'] == 'S' ? 'checked' : ''?>>
                </label>
                <label for="no">No
                <input type="radio" id="no" name="actriz_fallecida" value="N" <?=$fila['actriz_fallecida'] == 'N' ? 'checked' : ''?>>
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