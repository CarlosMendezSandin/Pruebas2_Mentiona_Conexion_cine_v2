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
                         actor_fallecido,
                         nombre_actriz,
                         actriz_fallecida,
                         nombre_director,
                         director_fallecido,
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

        body {
            background-color: black;
            color: white;
            margin: 0px;
        }

        section {
            display: grid;
            grid-template-columns: 3;
            grid-template-rows: 3;
            column-gap: 20px;
            row-gap: 20px;
            margin: 20px;
        }

        h2 {
            grid-column: 1 / 4;
            grid-row: 1 / 2;
            text-align: center;
        }

        article {
            grid-column: 2 / 4;
            grid-row: 2 / 4;
        }

        aside {
            grid-column: 1 / 2;
            grid-row: 2 / 4;
        }
        aside>img {
            border-radius: 15px;
        }

        aside>img {
            width: 30%;
            border-radius: 20px;
        }

        h2,
        article,
        aside {
            border: 4px solid rgb(205, 205, 205);
            border-radius: 10px;
            padding: 10px;
        }

        h2,
        h3 {
            font-family: "Dancing Script";
            text-transform: uppercase;
        }

        .info_aside {
            float: right;
        }

        .oscar{
            width:  15px;
            object-fit: contain;
            float: right;
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
            .oscar{
                width: 15px;
                object-fit: contain;
                position: absolute;
                right: 25px;
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
            <h3>
                Ficha
                <?=$fila['oscar_pelicula'] == 'S' ?  '<img class="oscar" src="img/oscar.png" alt="Pelicula premiada con Oscar" title="Pelicula premiada con Oscar">' : ''?>
            </h3>
            <img src="<?=$fila['cartel_pelicula']?>" alt="<?=$fila['titulo']?>">
            <div class="info_aside">
                <p>Director: <?=$fila['nombre_director']?> <?=$fila['director_fallecido'] == 'S' ? '<span style="color:red">&#8224</span>' : ''?></p>
                <p>Actor: <?=$fila['nombre_actor']?> <?=$fila['actor_fallecido'] == 'S' ? '<span style="color:red">&#8224</span>' : ''?></p>
                <p>Actriz: <?=$fila['nombre_actriz']?> <?=$fila['actriz_fallecida'] == 'S' ? '<span style="color:red">&#8224</span>' : ''?></p>
                <p>Género: <?=$fila['nombre_genero']?></p>
                <p>Producción: <?=$fila['nombre_produccion']?></p>
                <p>Duración: <?=$fila['duracion']?></p>
                <p>Año: <?=$fila['anio']?></p>
            </div>
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