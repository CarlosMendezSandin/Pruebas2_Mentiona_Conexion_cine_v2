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
    <link rel="stylesheet" href="css/enc.css">
    <link rel="stylesheet" href="css/avisos.css">
    
    <style>

        section {
            display: grid;
            grid-template-columns: 1r 25%;
            grid-template-rows: auto auto;
            column-gap: 20px;
        }

        h2 {
            grid-column-start: 1;
            grid-column-end: 3;
        }

        article {
            grid-column: 1 / 2;
        }

        aside {
            grid-column: 2 / 3;
        }

        aside>img {
            width: 100%;
            border-radius: 20px;
        }
        @media screen and (max-width: 576px) {
            section {
                grid-template-columns: auto;
                grid-template-rows: 3;
            }

            h2 {
                grid-column: 1 / 2;
                grid-row: 1 / 2;
            }

            article {
                grid-column: 1 / 2;
                grid-row: 2 / 3;
            }

            aside {
                grid-column: 1 / 2;
                grid-row: 3 / 4;
            }
        }

    </style>

</head>
<body>

    <?php
        
        REQUIRE('enc_pie/enc.php');
        
    ?>
    <section>
        <h2>(<?=$fila['pk_id_pelicula']?>) <?=$fila['titulo']?></h2>
        <article>
            <h3>Sinopsis</h3>
            <p><?=$fila['resumen']?></p>
        </article>
        <aside>
            <h3>Ficha</h3>
            <img src="<?=$fila['cartel_pelicula']?>" alt="<?=$fila['titulo']?>">
            <p>Director: <?=$fila['nombre_director']?></p>
            <p>Actor: <?=$fila['nombre_actor']?></p>
            <p>Actriz: <?=$fila['nombre_actriz']?></p>
            <p>Género: <?=$fila['nombre_genero']?></p>
            <p>Producción: <?=$fila['nombre_produccion']?></p>
            <p>Duración: <?=$fila['duracion']?></p>
            <p>Año: <?=$fila['anio']?></p>
            <p>Oscar: <?=$fila['oscar_pelicula']?></p>

        </aside>
    </section>

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