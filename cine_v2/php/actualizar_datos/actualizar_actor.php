<?php

    REQUIRE('../formularios/abrir_conexion.php');

?>
<?php
    // capturamos los datos del formulario

    $pk_id_actor = $_REQUEST['pk_id_actor'];
    $nombre_actor = $_REQUEST['nombre_actor'];
    $foto_actor = $_REQUEST['foto_actor'];
    $edad_actor = $_REQUEST['edad_actor'];
    $fecha_nacimiento_actor = $_REQUEST['fecha_nacimiento_actor'];
    $nacionalidad_actor = $_REQUEST['nacionalidad_actor'];
    $oscar = $_REQUEST['oscar'];
    $actor_fallecido = $_REQUEST['actor_fallecido'];

    if(empty($nombre_actor))
    {
        echo "Nombre NO modificado";
    } else {
        $consulta = "UPDATE
                    actores
                    SET
                    nombre_actor = '$nombre_actor'
                    WHERE
                    nombre_actor = $nombre_actor";

        $conexion->query($consulta);
    }

    if(empty($foto_actor))
    {
        echo "Foto actor NO modificado";
    } else {
        $consulta = "UPDATE
                    actores
                    SET
                    foto_actor = 'img/fotos/actores/$foto_actor'
                    WHERE
                    pk_id_actor = $pk_id_actor";

        $conexion->query($consulta);
    }

    if(empty($edad_actor))
    {
        echo "Edad NO modificada";
    } else {
        $consulta = "UPDATE
                    actores
                    SET
                    edad_actor = $edad_actor
                    WHERE
                    pk_id_actor = $pk_id_actor";

        $conexion->query($consulta);
    }

    if(empty($fecha_nacimiento_actor))
    {
        echo "Fecha nacimiento NO modificada";
    } else {  
        $consulta = "UPDATE
                    actores
                    SET
                    fecha_nacimiento_actor = '$fecha_nacimiento_actor'
                    WHERE
                    pk_id_actor = $pk_id_actor";

        $conexion->query($consulta);
    }

    if(empty($nacionalidad_actor))
    {
        echo "Nacionalidad NO modificada";
    } else {
        $consulta = "UPDATE
                    actores
                    SET
                    nacionalidad_actor = '$nacionalidad_actor'
                    WHERE
                    pk_id_actor = $pk_id_actor";

        $conexion->query($consulta);
    }

    if(empty($oscar))
    {
        echo "Oscar NO modificado";
    } else {
        $consulta = "UPDATE
                    actores
                    SET
                    oscar = '$oscar'
                    WHERE
                    pk_id_actor = $pk_id_actor";

        $conexion->query($consulta);
    }

    if(empty($actor_fallecido))
    {
        echo "Fallecido NO ha sido modificado";
    } else {
        $consulta = "UPDATE
                    actores
                    SET
                    actor_fallecido = '$actor_fallecido'
                    WHERE
                    pk_id_actor = $pk_id_actor";

        $conexion->query($consulta);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar actor</title>
</head>
<body>
    
</body>
</html>
<?php

    REQUIRE('../formularios/cerrar_conexion.php');

?>