<?php

    /* ==================== CONEXIÓN A LA BASE DE DATOS ==================== */

    REQUIRE('php/formularios/abrir_conexion.php');

                /* ================ Consulta ================ */
    
    $consulta = "SELECT
                pk_id_pelicula,
                titulo,
                cartel_pelicula,
                SUBSTRING_INDEX(resumen, ' ', 30) AS resumen,
                anio,
                duracion,
                oscar_pelicula,
                nombre_actor,
                actor_fallecido,
                nombre_actriz,
                actriz_fallecida,
                nombre_director,
                director_fallecido,
                nombre_genero,
                nombre_produccion,
                TIMESTAMPDIFF(YEAR, fecha_nacimiento_actor, CURDATE()) AS edad_actor_calculada,
                TIMESTAMPDIFF(YEAR, fecha_nacimiento_actriz, CURDATE()) AS edad_actriz_calculada,
                TIMESTAMPDIFF(YEAR, fecha_nacimiento_director, CURDATE()) AS edad_director_calculada
                FROM
                peliculas
                INNER JOIN
                actores
                ON
                fk_id_actor = pk_id_actor
                INNER JOIN
                actrices
                ON
                fk_id_actriz = pk_id_actriz
                INNER JOIN
                director
                ON
                fk_id_director = pk_id_director
                INNER JOIN
                genero
                ON
                fk_id_genero = pk_id_genero
                INNER JOIN
                produccion
                ON
                fk_id_produccion = pk_id_produccion
                ORDER BY
                titulo ASC
                LIMIT 21";

                /* ============== Captura datos ============== */
    $datos = $conexion->query($consulta);

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
    <meta name="description" content="Una vuelta por nuestro maravilloso planeta azul. Paisajes, gastronomía, fotografía, costumbres, fauna.">
    <meta name="keywords" content="España, Europa, América, África, Asia, gastronomía, fotografía">
    <meta name="author" content="Carlos Méndez">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine para todos</title>
    <link rel="stylesheet" href="css/css_cine_v2.css">
    <link rel="stylesheet" href="css/enc.css">
    <link rel="stylesheet" href="css/media.css">
</head>
<body>
    <?php
    
        REQUIRE('enc_pie/enc.php');
    
    ?>
    <div id="contenido">
        <main>
            <section id="cine">

                <h2>Cine para todos</h2>


                <?php
        
                    while($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
        
                ?>
                <article>
                    <div id="oscar">
                        <?=$fila['oscar_pelicula'] == 'S' ?  '<img src="img/oscar.png" alt="Pelicula premiada con Oscar" title="Pelicula premiada con Oscar">' : ''?>
                    </div>
                    <h3><?= $fila['titulo'] ?></h3>

                    <img src="<?= $fila['cartel_pelicula']?>" alt="" title="">
                    <p></p>
                    <div id="info_peliculas">
                        <div class="info_tecnica">
                            <p>Año: <?=$fila['anio']?></p>
                            <p>Duración: <?=$fila['duracion']?></p>
                            <p>Género: <?=$fila['nombre_genero']?></p>
                            <p>Producción: <?=$fila['nombre_produccion']?></p>
                        </div>
                        <div class="info_reparto">
                            <p>Reparto:</p>
                                <p><?=$fila['nombre_actor']?> <?=$fila['actor_fallecido'] == 'S' ? '<span style="color:red">&#8224</span>' : ''?><br>
                                Edad: <?=$fila['edad_actor_calculada']?></p>
                                <p><?=$fila['nombre_actriz']?> <?=$fila['actriz_fallecida'] == 'S' ? '<span style="color:red">&#8224</span>' : ''?><br>
                                Edad: <?=$fila['edad_actriz_calculada']?></p>
                        </div>
                        <div class="info_direccion">
                            <p>Director:</p>
                                <p><?=$fila['nombre_director']?> <?=$fila['director_fallecido'] == 'S' ? '<span style="color:red">&#8224</span>' : ''?><br>
                                Edad: <?=$fila['edad_director_calculada']?></p>
                        </div>
                        <div class="info_add">
                            <p><?=$fila['resumen']?> ...</p>
                            <div id="btn_info"><a href="ficha_pelicula.php?pk_id_pelicula=<?=$fila['pk_id_pelicula']?>">Más información</a></div>
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

        REQUIRE('enc_pie/pie.php'); 

    ?>
    
    <?php

        /* ==================== CERRAMOS CONEXIÓN CON BASE DE DATOS ==================== */

        REQUIRE('php/formularios/cerrar_conexion.php'); 

    ?>
</body>
</html>