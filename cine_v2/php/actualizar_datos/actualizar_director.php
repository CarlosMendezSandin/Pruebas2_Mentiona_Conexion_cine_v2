<?php

    REQUIRE('../formularios/abrir_conexion.php');

?>
<?php
    // capturamos los datos del formulario
    $nombre_director = intval($_REQUEST['nombre_director']);
    $foto_director = $_REQUEST['foto_director'];
    $edad_director = intval($_REQUEST['edad_director']);
    $fecha_nacimiento_director = $_REQUEST['fecha_nacimiento_director'];
    $nacionalidad_director = $_REQUEST['nacionalidad_director'];
    $oscar_director = $_REQUEST['oscar'];
    $director_fallecido = $_REQUEST['director_fallecido'];
    $sexo = $_REQUEST['sexo'];

    if(empty($foto_director))
    {
        echo "Foto director NO modificado";
    } else {
        $consulta = "UPDATE
                    director
                    SET
                    foto_director = 'img/fotos/directores/$foto_director'
                    WHERE
                    pk_id_director = $nombre_director";

        $conexion->query($consulta);
    }

    if(empty($edad_director))
    {
        echo "Edad NO modificada";
    } else {
        $consulta = "UPDATE
                    director
                    SET
                    edad_director = $edad_director
                    WHERE
                    pk_id_director = $nombre_director";

        $conexion->query($consulta);
    }

    if(empty($fecha_nacimiento_director))
    {
        echo "Fecha nacimiento NO modificada";
    } else {  
        $consulta = "UPDATE
                    director
                    SET
                    fecha_nacimiento_director = '$fecha_nacimiento_director'
                    WHERE
                    pk_id_director = $nombre_director";

        $conexion->query($consulta);
    }

    if(empty($nacionalidad_director))
    {
        echo "Nacionalidad NO modificada";
    } else {
        $consulta = "UPDATE
                    director
                    SET
                    nacionalidad_director = '$nacionalidad_director'
                    WHERE
                    pk_id_director = $nombre_director";

        $conexion->query($consulta);
    }

    if(empty($oscar))
    {
        echo "Oscar NO modificado";
    } else {
        $consulta = "UPDATE
                    director
                    SET
                    oscar = '$oscar'
                    WHERE
                    pk_id_director = $nombre_director";

        $conexion->query($consulta);
    }

    if(empty($director_fallecido))
    {
        echo "Fallecido NO ha sido modificado";
    } else {
        $consulta = "UPDATE
                    director
                    SET
                    director_fallecido = '$director_fallecido'
                    WHERE
                    pk_id_director = $nombre_director";

        $conexion->query($consulta);
    }

    if(empty($sexo))
    {
        echo "sexo NO modificada";
    } else {
        $consulta = "UPDATE
                    director
                    SET
                    sexo = '$sexo'
                    WHERE
                    pk_id_director = $nombre_director";

        $conexion->query($consulta);
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar director</title>
</head>
<body>
    
</body>
</html>
<?php

    REQUIRE('../formularios/cerrar_conexion.php');

?>