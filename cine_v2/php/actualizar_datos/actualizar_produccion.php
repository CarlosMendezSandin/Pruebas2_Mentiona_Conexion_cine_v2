<?php

    REQUIRE('../formularios/abrir_conexion.php');

?>
<?php
    // capturamos los datos del formulario

    $pk_id_produccion = $_REQUEST['pk_id_produccion'];
    $nombre_produccion = $_REQUEST['nombre_produccion'];

    if(empty($nombre_produccion))
    {
        echo "Nombre NO modificado";
    } else {
        $consulta = "UPDATE
                    produccion
                    SET
                    nombre_produccion = '$nombre_produccion'
                    WHERE
                    pk_id_produccion = $pk_id_produccion";

        $conexion->query($consulta);
    }

    if(empty($descripcion))
    {
        echo "Nombre NO modificado";
    } else {
        $consulta = "UPDATE
                    produccion
                    SET
                    descripcion = '$descripcion'
                    WHERE
                    pk_id_produccion = $pk_id_produccion";

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