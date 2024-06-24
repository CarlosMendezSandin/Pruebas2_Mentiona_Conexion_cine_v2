<?php

    REQUIRE('php/formularios/abrir_conexion.php')

?>
<?php

    /* Capturamos la id de la pelicula para extraer su información */

    $pk_id_pelicula = $_REQUEST['pk_id_pelicula'];

    /* Consulta a la base de datos */

    $consulta_pelicula = "SELECT
                         pk_id_pelicula,
                         titulo,
                         cartel_pelicula,
                         anio,
                         duracion,
                         oscar_pelicula,
                         resumen,
                         nombre_actor,
                         nombre_actriz,
                         nombre_director,
                         nombre_genero,
                         nombre_produccion
                         FROM
                         peliculas,
                         actores,
                         actrices,
                         director,
                         genero,
                         produccion
                         WHERE
                         pk_id_pelicula = $pk_id_pelicula
                         AND
                         fk_id_actor = pk_id_actor
                         AND
                         fk_id_actriz = pk_id_actriz
                         AND
                         fk_id_director = pk_id_director
                         AND
                         fk_id_genero = pk_id_genero
                         AND
                         fk_id_produccion = pk_id_produccion";
    
    /* Ejecuto la consulta en la BD y almaceno la respuesta */

    $datos = $conexion->query($consulta_pelicula);

    /* Capturo el registro completo de la película */

    $fila = $datos->fetch_array(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
    <link rel="stylesheet" href="css/css_cine_v2.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/avisos.css">
</head>
<body>

        <?php
        
            REQUIRE('enc_pie/enc.php');
        
        ?>

    <main>
        <h2>(<?=$fila['pk_id_pelicula']?>) <?=$fila['titulo']?></h2>
        <p><?=$fila['resumen']?></p>
    </main>
    <footer>

        <?php
        
            REQUIRE('enc_pie/pie.php')
        
        ?>

    </footer>
    <?php

    REQUIRE('php/formularios/cerrar_conexion.php')

    ?>
</body>
</html>