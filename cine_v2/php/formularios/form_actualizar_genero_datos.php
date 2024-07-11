<?php

    REQUIRE('abrir_conexion.php');

    $pk_id_genero = $_REQUEST['nombre_genero'];

    $consulta = "SELECT
                *
                FROM
                genero
                WHERE
                pk_id_genero = ?
                ORDER BY
                nombre_genero ASC";
    
    $datos = $conexion->prepare($consulta);

    /* Vincula el "?" del WHERE  con el valor de la variable $pk_id_genero */

    $datos->bind_param('i', $pk_id_genero);

    $datos->execute();

    $resultado = $datos->get_result();

    $fila = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form actualizar genero</title>
    <link rel="stylesheet" href="../../css/administrar.css">


</head>
<body>

    <!-- Form en el que se puede actualizar los datos vacios (sin valor) de las actrices
     y en caso contrario (con valor) muestra lo guardado en la Base de Datos -->
    
    <form action="../actualizar_datos/actualizar_genero.php" method="get">
        <fieldset>
            <legend>Modificar datos Género</legend>
            <p>
                <label for="pk_id_genero">ID:</label>
                <input type="text" id="pk_id_genero" name="pk_id_genero" value="<?=$fila['pk_id_genero']?>" readonly>
            </p>
            <p>
                <label for="nombre_genero">Nombre:</label>
                <input type="text" id="nombre_genero" name="nombre_genero" value="<?=$fila['nombre_genero']?>">
            </p>
            <p>
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" value="<?=$fila['descripcion']?>">
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