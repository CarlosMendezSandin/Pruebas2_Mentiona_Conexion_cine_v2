<?php

    /* Abrimos conexión con la BD y se comprueba su éxito*/

    REQUIRE('../formularios/abrir_conexion.php');

    /* Capturamos los datos del formulario */

    $nombre_genero = $_REQUEST['nombre_genero'];
    $descripcion = $_REQUEST['descripcion'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Género</title>
    <link rel="stylesheet" href="../../css/avisos.css">
</head>
<body>
    

    <?php
    
        /* Variable para introducir un nuevo actor con sus parametros */

        $consulta = "INSERT INTO genero(
                        nombre_genero,
                        descripcion)
                    VALUES(
                        ?,
                        ?)";

        /* 
        * Variable para crear un objeto de sentencia preparada
        * Variable para la consulta SQL que deseas ejecutar
         */

        $datos = $conexion->prepare($consulta);

        /* Enlazar los valores a los marcadores de parámetros */

        $datos->bind_param('ss', $nombre_genero, $descripcion);

        /* Se ejecuta la sentencia preparada */

        $datos->execute();

        /* Mensajes de informacion si ha sido con éxito o no */

        if($datos->affected_rows > 0) {
            echo "<p class='encendido'>Género insertada correctamente</p>";
        } else {
            echo "<p class='apagado'>Error al insertar género</p>";
        }
    
    ?>

    <?php

        /* Cerramos conexión con la BD */

        REQUIRE('../formularios/cerrar_conexion.php');
    
    ?>

    <a href="../formularios/form_genero.php">Volver a introducir una género</a>

</body>
</html>