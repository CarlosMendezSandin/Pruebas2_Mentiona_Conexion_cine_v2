<?php

    /* Abrimos conexión con la BD y se comprueba su éxito*/

    REQUIRE('../abrir_conexion.php');

    /* Capturamos los datos del formulario */

    $nombre_produccion = $_REQUEST['nombre_produccion'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Producción</title>
    <link rel="stylesheet" href="../../css/avisos.css">
</head>
<body>
    

    <?php
    
        /* Variable para introducir un nuevo actor con sus parametros */

        $consulta = "INSERT INTO produccion(
                        nombre_produccion)
                    VALUES(
                        ?)";

        /* 
        * Variable para crear un objeto de sentencia preparada
        * Variable para la consulta SQL que deseas ejecutar
         */

        $datos = $conexion->prepare($consulta);

        /* Enlazar los valores a los marcadores de parámetros */

        $datos->bind_param('s', $nombre_produccion);

        /* Se ejecuta la sentencia preparada */

        $datos->execute();

        /* Mensajes de informacion si ha sido con éxito o no */

        if($datos->affected_rows > 0) {
            echo "<p class='encendido'>Producción insertada correctamente</p>";
        } else {
            echo "<p class='apagado'>Error al insertar Producción</p>";
        }
    
    ?>

    <?php

        /* Cerramos conexión con la BD */

        REQUIRE('../cerrar_conexion.php');
    
    ?>

    <a href="../form_produccion.php">Volver a introducir una producción</a>

</body>
</html>