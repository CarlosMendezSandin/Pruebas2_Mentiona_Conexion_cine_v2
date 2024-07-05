<?php

    REQUIRE('php/formularios/abrir_conexion.php');

?>
<?php

    /* Captura de datos del formulario */

    $terminos_busqueda = trim($_REQUEST['terminos_busqueda']);

    /* Cadena de busqueda en la base de datos */

    $consulta = "SELECT
                pk_id_pelicula,
                titulo,
                cartel_pelicula,
                SUBSTRING_INDEX(resumen, ' ', 30) AS resumen,
                oscar_pelicula,
                nombre_actor,
                nombre_actriz,
                nombre_director,
                nombre_genero,
                nombre_produccion
                FROM
                peliculas
                JOIN
                actores
                ON
                fk_id_actor = pk_id_actor
                JOIN
                actrices
                ON
                fk_id_actriz = pk_id_actriz
                JOIN
                director
                ON
                fk_id_director = pk_id_director
                JOIN
                genero
                ON
                fk_id_genero = pk_id_genero
                JOIN
                produccion
                ON
                fk_id_produccion = pk_id_produccion
                WHERE MATCH(
                titulo,
                resumen)
                AGAINST(?)
                OR
                MATCH(
                nombre_actor)
                AGAINST(?)
                OR
                MATCH(
                nombre_actriz)
                AGAINST(?)
                OR
                MATCH(
                nombre_director)
                AGAINST(?)
                OR
                MATCH(
                nombre_genero)
                AGAINST(?)
                OR
                MATCH(
                nombre_produccion)
                AGAINST(?)
                ORDER BY
                titulo ASC";

    $resultado = $conexion->prepare($consulta);

    $resultado->bind_param("ssssss", $terminos_busqueda, $terminos_busqueda, $terminos_busqueda, $terminos_busqueda, $terminos_busqueda, $terminos_busqueda);

    $resultado->execute();

    /* Conteo de filas */

    $resultado->store_result();

    $resultado->bind_result($pk_id_pelicula, $titulo, $cartel_pelicula, $resumen, $oscar_pelicula, $nombre_actor, $nombre_actriz, $nombre_director, $nombre_genero, $nombre_produccion);

    echo "<p>Nº de resultados encontrados ".$resultado->num_rows."</p>";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado busqueda</title>
    <link rel="stylesheet" href="css/avisos.css">
    <link rel="stylesheet" href="css/css_cine_v2.css">
    <link rel="stylesheet" href="css/enc.css">
    <style>

        h2,
        h4 {
            color: rgb(205, 205, 205);
            font-family: "Dancing Script", cursive;
            text-align: center;
        }

        section {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;
            color: rgb(205, 205, 205);
            margin: 20px;
        }

        #busqueda {
            display: grid;
            grid-template-columns: 2;
            column-gap: 5px;
            row-gap: 5px;
            border: 4px solid rgb(205, 205, 205);
            border-radius: 10px;
            width: max-content;
            margin: 5px;
            padding: 5px;
            width: 350px;
        }

        img {
            grid-column: 1 / 2;
            width: 150px;
            height: 200px;
        }
        
        #reparto {
            grid-column: 2 / 3;
        }

        #oscar img {
            grid-column: 2 / 3;
            height: 50px;
        }

        #info {
            grid-column: 1 / 2;
        }

        #resumen {
            grid-column: 1 / 3;
        }

    </style>
</head>
<body>

    <?php
    
        REQUIRE('enc_pie/enc.php')
    
    ?>

    <h2>Resultados de la busqueda</h2>
    <h4>La busqueda: <?=$terminos_busqueda?></h4>

    <section>
        <?php
        
            while ($resultado->fetch()) {
        
        ?>
            <section>
                <div id="busqueda">
                    <p style="text-align: center; grid-column: 1 / 3;"><?=$titulo?></p>
                    <img src="<?=$cartel_pelicula?>" alt="<?=$titulo?>" title="<?=$titulo?>">
                    <div id="reparto">
                        <p>Actor: <?=$nombre_actor?></p>
                        <p>Actriz: <?=$nombre_actriz?></p>
                        <p>Dirección: <?=$nombre_director?></p>
                    </div>
                    <div id="info">
                        <p>Genero: <?=$nombre_genero?></p>
                        <p>Producción: <?=$nombre_produccion?></p>
                    </div>
                    <div id="oscar">
                        <?=$oscar_pelicula == 'S' ? '<img src="img/oscar.png" alt="Película premiada con Oscar" title="Película premiada con Oscar">' : ''?>
                    </div>
                    <div id="resumen">
                        <p>sinopsis: <?=$resumen?></p>
                    </div>
                </div> 
            </section>

        <?php
        
            }
    
        ?>
    </section>

    <?php
    
        REQUIRE('enc_pie/pie.php')
    
    ?>
    
</body>
</html>
<?php

    REQUIRE('php/formularios/cerrar_conexion.php');

?>