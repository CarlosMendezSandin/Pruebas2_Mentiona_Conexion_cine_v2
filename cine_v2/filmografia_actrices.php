<?php

    // Capturo el pk_id_actor

    $pk_id_actriz = $_REQUEST['pk_id_actriz'];

    // Conexión a la base de datos cine_v2

    REQUIRE('php/formularios/abrir_conexion.php');

    // Consulta (definición)

    $consulta = "SELECT 
                titulo,
                cartel_pelicula,
                oscar_pelicula,
                nombre_actriz,
                SUBSTRING_INDEX(resumen, ' ', 50) AS resumen,
                anio,
                duracion,
                pk_id_pelicula
                FROM 
                peliculas, 
                actrices
                WHERE 
                peliculas.fk_id_actriz = $pk_id_actriz
                AND
                pk_id_actriz = $pk_id_actriz
                ORDER BY
                titulo ASC";

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

    // Capturamos los datos una vez ejecutada la consulta

    $datos = $conexion->query($consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Estrenos de cine para los amantes del séptimo arte.">
    <meta name="keywords" content="cine, estrenos, actores, actrices, directores, gratis, películas">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine para todos</title>
    <link rel="stylesheet" href="css/enc.css">
    <link rel="stylesheet" href="css/css_cine_v2.css">
    <link rel="stylesheet" href="css/media.css">
    
</head>
<body>

    <?php

        require('enc_pie/enc.php');

    ?>

    <div id="contenido">
        <main>
            <section id="cine">

                <?php
                    $otro_nombre = null;
                    while($fila = $datos->fetch_array(MYSQLI_ASSOC))
                    {
                        $nombre_actriz = $fila['nombre_actriz'];
                        if($nombre_actriz !== $otro_nombre)
                        {
                            echo "<h2>$nombre_actriz</h2>";
                            $otro_nombre = $nombre_actriz;
                        }
                ?>
                <article>
                    <div id="oscar">
                        <?=$fila['oscar_pelicula'] == 'S' ?  '<img src="img/oscar.png" alt="Pelicula premiada con Oscar" title="Pelicula premiada con Oscar">' : ''?>
                    </div>
                    <h3><?= $fila['titulo'] ?></h3>
                        <img src="<?= $fila['cartel_pelicula'] ?>" alt="<?=$fila['titulo']?>" title="">
                    <div id="info_peliculas">
                        <div id="info_tecnica">
                            <p>Año: <?= $fila['anio'] ?></p>
                            <p>Duración: <?= $fila['duracion'] ?></p>
                            <p>Sinopsis: <?= $fila['resumen'] ?></p>
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

        require('enc_pie/pie.php');

    ?>

<?php

    REQUIRE('php/formularios/cerrar_conexion.php');

?>
</body>
</html>