<?php

    REQUIRE('../formularios/abrir_conexion.php');

?>
<?php
    // capturamos los datos del formulario

    $pk_id_genero = $_REQUEST['pk_id_genero'];
    $nombre_genero = $_REQUEST['nombre_genero'];
    $descripcion = $_REQUEST['descripcion'];

    if(empty($nombre_genero))
    {
        echo "Nombre NO modificado";
    } else {
        $consulta = "UPDATE
                    genero
                    SET
                    nombre_genero = '$nombre_genero'
                    WHERE
                    pk_id_genero = $pk_id_genero";

        $conexion->query($consulta);
    }

    if(empty($descripcion))
    {
        echo "Nombre NO modificado";
    } else {
        $consulta = "UPDATE
                    genero
                    SET
                    descripcion = '$descripcion'
                    WHERE
                    pk_id_genero = $pk_id_genero";

        $conexion->query($consulta);
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producción</title>
</head>
<body>
    
</body>
</html>
<?php

    REQUIRE('../formularios/cerrar_conexion.php');

?>