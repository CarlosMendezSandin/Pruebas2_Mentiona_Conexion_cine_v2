<?php

    // Conexión base de datos 

    REQUIRE('../formularios/abrir_conexion.php');

    //Captura de datos

    $titulo_pelicula = $_REQUEST['titulo_pelicula'];
    $retrato = 'img/retratos/' .$_REQUEST['retrato'];

    $consulta = "INSERT INTO retrato(
                 titulo_pelicula,
                 retrato)
                 VALUES(
                 ?,
                 ?)";

    //Preparar los datos

    $datos = $conexion->prepare($consulta);

    //Vincular los datos con las variables del formulario

    $datos->bind_param('ss', $titulo_pelicula, $retrato);
    $datos->execute();

    //Comprobamos que los datos se insertaron correctamente

    if($datos->affected_rows > 0) {
        echo "Retrato correctamente insertado";
    }else {
        echo "Error al insertar el retrato";
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar retrato</title>
</head>
<body>
    
    <h2>Inserción retrato</h2>

    <p><a href="../formularios/form_retrato.php">Volver a introducir otro retrato</a></p>

</body>
</html>