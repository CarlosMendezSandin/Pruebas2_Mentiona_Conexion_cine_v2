<?php

    REQUIRE('abrir_conexion.php');

    $pk_id_produccion = $_REQUEST['nombre_produccion'];

    $consulta = "SELECT
                *
                FROM
                produccion
                WHERE
                pk_id_produccion = ?
                ORDER BY
                nombre_produccion ASC";
    
    $datos = $conexion->prepare($consulta);

    /* Vincula el "?" del WHERE  con el valor de la variable $pk_id_produccion */

    $datos->bind_param('i', $pk_id_produccion);

    $datos->execute();

    $resultado = $datos->get_result();

    $fila = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form actualizar Producción</title>
    <link rel="stylesheet" href="../../css/administrar.css">


</head>
<body>

    <!-- Form en el que se puede actualizar los datos vacios (sin valor) de las actrices
     y en caso contrario (con valor) muestra lo guardado en la Base de Datos -->
    
    <form action="../actualizar_datos/actualizar_produccion.php" method="get">
        <fieldset>
            <legend>Modificar datos Producción</legend>
            <p>
                <label for="pk_id_produccion">ID:</label>
                <input type="text" id="pk_id_produccion" name="pk_id_produccion" value="<?=$fila['pk_id_produccion']?>" readonly>
            </p>
            <p>
                <label for="nombre_produccion">Nombre:</label>
                <input type="text" id="nombre_produccion" name="nombre_produccion" value="<?=$fila['nombre_produccion']?>">
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