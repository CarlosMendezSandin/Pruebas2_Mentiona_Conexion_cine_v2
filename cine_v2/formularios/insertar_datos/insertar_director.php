<?php

    /* Abrimos conexión con la BD y se comprueba su éxito*/

    REQUIRE('../abrir_conexion.php');

    /* Capturamos los datos del formulario */

    $nombre_director = $_REQUEST['nombre_director'];
    $foto_director = 'img/fotos/director' .$_REQUEST['foto_director'];
    $edad_director = $_REQUEST['edad_director'];
    $fecha_nacimiento_director = $_REQUEST['fecha_nacimiento_director'];
    $nacionalidad_director = $_REQUEST['nacionalidad_director'];
    $oscar_director = $_REQUEST['oscar_director'];
    $director_fallecido = $_REQUEST['director_fallecido'];
    $sexo = $_REQUEST['sexo'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Director</title>
    <link rel="stylesheet" href="../../css/avisos.css">
</head>
<body>
    

    <?php
    
        /* Variable para introducir un nuevo actor con sus parametros */

        $consulta = "INSERT INTO director(
                        nombre_director,
                        foto_director,
                        edad_director,
                        fecha_nacimiento_director,
                        nacionalidad_director,
                        oscar_director,
                        director_fallecido,
                        sexo)
                    VALUES(
                        ?,
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

        $datos->bind_param('ssisssss', $nombre_director, $foto_director, $edad_director, $fecha_nacimiento_director, $nacionalidad_director, $oscar_director, $director_fallecido, $sexo);

        /* Se ejecuta la sentencia preparada */

        $datos->execute();

        /* Mensajes de informacion si ha sido con éxito o no */

        if($datos->affected_rows > 0) {
            echo "<p class='encendido'>Director insertado correctamente</p>";
        } else {
            echo "<p class='apagado'>Error al insertar director</p>";
        }
    
    ?>

    <?php

        /* Cerramos conexión con la BD */

        REQUIRE('../cerrar_conexion.php');
    
    ?>

    <a href="../form_director.php">Volver a introducir un director</a>

</body>
</html>