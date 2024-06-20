<?php

    /* Abrimos conexión con la BD y se comprueba su éxito*/

    REQUIRE('../formularios/abrir_conexion.php');

    /* Capturamos los datos del formulario */

    $nombre_actriz = $_REQUEST['nombre_actriz'];
    $foto_actriz = 'img/fotos/actrices' .$_REQUEST['foto_actriz'];
    $edad_actriz = $_REQUEST['edad_actriz'];
    $fecha_nacimiento_actriz = $_REQUEST['fecha_nacimiento_actriz'];
    $nacionalidad_actriz = $_REQUEST['nacionalidad_actriz'];
    $oscar_actriz = $_REQUEST['oscar_actriz'];
    $actriz_fallecida = $_REQUEST['actriz_fallecida'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Actriz</title>
    <link rel="stylesheet" href="../../css/avisos.css">
</head>
<body>
    

    <?php
    
        /* Variable para introducir un nuevo actor con sus parametros */

        $consulta = "INSERT INTO actrices(
                        nombre_actriz,
                        foto_actriz,
                        edad_actriz,
                        fecha_nacimiento_actriz,
                        nacionalidad_actriz,
                        oscar_actriz,
                        actriz_fallecida)
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

        $datos->bind_param('ssissss', $nombre_actriz, $foto_actriz, $edad_actriz, $fecha_nacimiento_actriz, $nacionalidad_actriz, $oscar_actriz, $actriz_fallecida);

        /* Se ejecuta la sentencia preparada */

        $datos->execute();

        /* Mensajes de informacion si ha sido con éxito o no */

        if($datos->affected_rows > 0) {
            echo "<p class='encendido'>Actriz insertada correctamente</p>";
        } else {
            echo "<p class='apagado'>Error al insertar actriz</p>";
        }
    
    ?>

    <?php

        /* Cerramos conexión con la BD */

        REQUIRE('../formularios/cerrar_conexion.php');
    
    ?>

    <a href="../formularios/form_actrices.php">Volver a introducir una actriz</a>

</body>
</html>