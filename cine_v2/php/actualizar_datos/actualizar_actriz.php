<?php

    REQUIRE('../formularios/abrir_conexion.php');

?>
<?php
    // capturamos los datos del formulario

    $pk_id_actriz = $_REQUEST['pk_id_actriz'];
    $nombre_actriz = intval($_REQUEST['nombre_actriz']);
    $foto_actriz = $_REQUEST['foto_actriz'];
    $edad_actriz = intval($_REQUEST['edad_actriz']);
    $fecha_nacimiento_actriz = $_REQUEST['fecha_nacimiento_actriz'];
    $nacionalidad_actriz = $_REQUEST['nacionalidad_actriz'];
    $oscar_actriz = $_REQUEST['oscar'];
    $actriz_fallecido = $_REQUEST['actriz_fallecido'];

    if(empty($nombre_actriz))
    {
        echo "Nombre NO modificado";
    } else {
        $consulta = "UPDATE
                    actrices
                    SET
                    nombre_actriz = '$nombre_actriz'
                    WHERE
                    pk_id_actriz = $pk_id_actriz";

        $conexion->query($consulta);
    }

    if(empty($foto_actriz))
    {
        echo "Foto actriz NO modificado";
    } else {
        $consulta = "UPDATE
                    actrices
                    SET
                    foto_actriz = 'img/fotos/actrices/$foto_actriz'
                    WHERE
                    pk_id_actriz = $pk_id_actriz";

        $conexion->query($consulta);
    }

    if(empty($edad_actriz))
    {
        echo "Edad NO modificada";
    } else {
        $consulta = "UPDATE
                    actrices
                    SET
                    edad_actriz = $edad_actriz
                    WHERE
                    pk_id_actriz = $pk_id_actriz";

        $conexion->query($consulta);
    }

    if(empty($fecha_nacimiento_actriz))
    {
        echo "Fecha nacimiento NO modificada";
    } else {  
        $consulta = "UPDATE
                    actrices
                    SET
                    fecha_nacimiento_actriz = '$fecha_nacimiento_actriz'
                    WHERE
                    pk_id_actriz = $pk_id_actriz";

        $conexion->query($consulta);
    }

    if(empty($nacionalidad_actriz))
    {
        echo "Nacionalidad NO modificada";
    } else {
        $consulta = "UPDATE
                    actrices
                    SET
                    nacionalidad_actriz = '$nacionalidad_actriz'
                    WHERE
                    pk_id_actriz = $pk_id_actriz";

        $conexion->query($consulta);
    }

    if(empty($oscar))
    {
        echo "Oscar NO modificado";
    } else {
        $consulta = "UPDATE
                    actrices
                    SET
                    oscar = '$oscar'
                    WHERE
                    pk_id_actriz = $pk_id_actriz";

        $conexion->query($consulta);
    }

    if(empty($actriz_fallecido))
    {
        echo "Fallecido NO ha sido modificado";
    } else {
        $consulta = "UPDATE
                    actrices
                    SET
                    actriz_fallecido = '$actriz_fallecido'
                    WHERE
                    pk_id_actriz = $pk_id_actriz";

        $conexion->query($consulta);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar actriz</title>
</head>
<body>
    
</body>
</html>
<?php

    REQUIRE('../formularios/cerrar_conexion.php');

?>