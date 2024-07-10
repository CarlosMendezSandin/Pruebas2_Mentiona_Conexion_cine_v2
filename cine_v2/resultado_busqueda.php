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

    $consulta2 = "SELECT
                 pk_id_pelicula,
                 titulo,
                 cartel_pelicula,
                 SUBSTRING_INDEX(resumen, ' ', 10) AS resumen,
                 anio
                 FROM
                 peliculas
                 WHERE
                 anio >=
                 '2024'
                 ORDER BY
                 titulo";

    $datos2 = $conexion->query($consulta2);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado busqueda</title>
    <link rel="stylesheet" href="css/css_cine_v2.css">
    <link rel="stylesheet" href="css/enc.css">
    <link rel="stylesheet" href="css/media.css">
</head>
<body>

    <?php
    
        REQUIRE('enc_pie/enc.php')
    
    ?>
    
    <div id="contenido">
        <main>
            <section id="cine">

                <h2>Resultados de la busqueda<br>
                    La busqueda: <?=$terminos_busqueda?>
                </h2>

                <?php
                    
                    while ($resultado->fetch()) {
                    
                ?>
                <article>
                    <div id="oscar">
                        <?=$oscar_pelicula == 'S' ? '<img src="img/oscar.png" alt="Película premiada con Oscar" title="Película premiada con Oscar">' : ''?>
                    </div>
                    <h3><?=$titulo?></h3>
                    <img src="<?=$cartel_pelicula?>" alt="<?=$titulo?>" title="<?=$titulo?>">
                    <p></p>
                    <div id="info_peliculas">
                        <div id="info_tecnica">
                            <p>Genero: <?=$nombre_genero?></p>
                            <p>Producción: <?=$nombre_produccion?></p>
                        </div>
                        <div id="info_reparto">
                            <p>Actor: <?=$nombre_actor?></p>
                            <p>Actriz: <?=$nombre_actriz?></p>
                            <p>Dirección: <?=$nombre_director?></p>
                        </div>
                        <div id="info_add">
                            <p>sinopsis: <?=$resumen?></p>
                        </div>
                    </div> 
                </article>
                <?php
                
                    }
            
                ?>

            </section>
        </main>
        <aside class="info_aside" aria-label="información">

            <h4 aria-labelledby="info">Últimos estrenos</h4>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti modi, libero nemo facilis consectetur similique impedit quidem earum nisi repellat dolores, fugiat et ipsam esse consequatur fugit asperiores aliquam ad!</p>

            <?php
        
                while($fila2 = $datos2->fetch_array(MYSQLI_ASSOC)) {
        
            ?>

            <div class="estrenos">
                <p class="est_1"><a href="ficha_pelicula.php?pk_id_pelicula=<?=$fila2['pk_id_pelicula']?>"><?=$fila2['titulo']?></a></p>
                <p class="est_2"><?=$fila2['anio']?></p>
                <p class="est_3"><?=$fila2['resumen']?></p>
                <p class="est_4"><a href="ficha_pelicula.php?pk_id_pelicula=<?=$fila2['pk_id_pelicula']?>"><img src="<?= $fila2['cartel_pelicula']?>" alt=""></a></p>
            </div>

            <?php
        
                }
        
            ?>
            
        </aside>
    </div>

    <?php
    
        REQUIRE('enc_pie/pie.php')
    
    ?>
    
</body>
</html>
<?php

    REQUIRE('php/formularios/cerrar_conexion.php');

?>