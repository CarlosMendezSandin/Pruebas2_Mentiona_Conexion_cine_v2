<?php

    /* Abrimos conexión con la BD y se comprueba su éxito*/

    REQUIRE('../formularios/abrir_conexion.php');

    /* Capturamos los datos del formulario */

    $nombre_actor = $_REQUEST['nombre_actor'];
    $foto_actor = 'img/fotos/actores/' .$_REQUEST['foto_actor'];
    $edad_actor = $_REQUEST['edad_actor'];
    $fecha_nacimiento_actor = $_REQUEST['fecha_nacimiento_actor'];
    $nacionalidad_actor = $_REQUEST['nacionalidad_actor'];
    $oscar = $_REQUEST['oscar'];
    $actor_fallecido = $_REQUEST['actor_fallecido'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Actor</title>
    <link rel="stylesheet" href="../../css/avisos.css">
</head>
<body>
    

    <?php
    
        /* Variable para introducir un nuevo actor con sus parametros */

        $consulta = "INSERT INTO actores(
                        nombre_actor,
                        foto_actor,
                        edad_actor,
                        fecha_nacimiento_actor,
                        nacionalidad_actor,
                        oscar,
                        actor_fallecido)
                    VALUES(
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?,
                        ?)";

        /* 
        * Variable para crear un objeto de sentencia preparada
        * Variable para la consulta SQL que deseas ejecutar
         */

        $datos = $conexion->prepare($consulta);

        /* Enlazar los valores a los marcadores de parámetros */

        $datos->bind_param('ssissss', $nombre_actor, $foto_actor, $edad_actor, $fecha_nacimiento_actor, $nacionalidad_actor, $oscar, $actor_fallecido);

        /* Se ejecuta la sentencia preparada */

        $datos->execute();

        /* Mensajes de informacion si ha sido con éxito o no */

        if($datos->affected_rows > 0) {
            echo "<p class='encendido'>Actor insertado correctamente</p>";
        } else {
            echo "<p class='apagado'>Error al insertar actor</p>";
        }
    
    ?>

    <?php

        /* Cerramos conexión con la BD */

        REQUIRE('../formularios/cerrar_conexion.php');
    
    ?>

    <a href="../formularios/form_actores.php">Volver a introducir un actor</a>

</body>
</html>