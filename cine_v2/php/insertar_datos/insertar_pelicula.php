<?php

    /* Abrimos conexión con la BD y se comprueba su éxito*/

    REQUIRE('../formularios/abrir_conexion.php');

    /* Capturamos los datos del formulario */

    $titulo = $_REQUEST['titulo'];
    $cartel_pelicula = 'img/carteles_peliculas' .$_REQUEST['cartel_pelicula'];
    $anio = $_REQUEST['anio'];
    $duracion = $_REQUEST['duracion'];
    $oscar_pelicula = $_REQUEST['oscar_pelicula'];
    $fk_id_actor = $_REQUEST['fk_id_actor'];
    $fk_id_actriz = $_REQUEST['fk_id_actriz'];
    $fk_id_director = $_REQUEST['fk_id_director'];
    $fk_id_genero = $_REQUEST['fk_id_genero'];
    $pk_id_produccion = $_REQUEST['pk_id_produccion'];
    $resumen = $_REQUEST['resumen'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Película</title>
    <link rel="stylesheet" href="../../css/avisos.css">
</head>
<body>
    

    <?php
    
        /* Variable para introducir un nuevo actor con sus parametros */

        $consulta = "INSERT INTO peliculas(
                        titulo,
                        cartel_pelicula,
                        anio,
                        duracion,
                        oscar_pelicula,
                        fk_id_actor,
                        fk_id_actriz,
                        fk_id_director,
                        fk_id_genero,
                        pk_id_produccion,
                        resumen)
                    VALUES(
                        ?,
                        ?,
                        ?,
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

        $datos->bind_param('ssiisiiiiis', $titulo, $cartel_pelicula, $anio, $duracion, $oscar_pelicula, $fk_id_actor, $fk_id_actriz, $fk_id_director, $fk_id_genero, $pk_id_produccion, $resumen);

        /* Se ejecuta la sentencia preparada */

        $datos->execute();

        /* Mensajes de informacion si ha sido con éxito o no */

        if($datos->affected_rows > 0) {
            echo "<p class='encendido'>Insertada(s) {$datos->affected_rows} fila(s) <br>Película insertada correctamente</p>";
        } else {
            echo "<p class='apagado'>Error al insertar película</p>";
        }
    
    ?>

    <?php

        /* Cerramos conexión con la BD */

        REQUIRE('../formularios/cerrar_conexion.php');
    
    ?>

    <a href="../formularios/form_peliculas.php">Volver a introducir una película</a>

</body>
</html>