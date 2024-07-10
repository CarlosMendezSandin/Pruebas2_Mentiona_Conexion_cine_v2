<?php
    $conexion = new mysqli('localhost','root','','cine_v2');

    /* 3. Consulta TIMESTAMPDIFF(YEAR, fecha_nacimiento_actor, CURDATE()) 
    calcula la edad del actor, hace los cálculos teniendo en cuenta la fecha completa, 
    día y mes, a la hora de establecer la diferencia entre las dos */

    $consulta = "SELECT 
                nombre_actriz,
                actriz_fallecida,
                TIMESTAMPDIFF(YEAR, fecha_nacimiento_actriz, CURDATE()) AS edad_actriz_calculada,
                foto_actriz,
                DATE_FORMAT(fecha_nacimiento_actriz, '%d-%m-%Y') AS fecha_nacimiento_actriz,
                nacionalidad_actriz,
                oscar_actriz,
                pk_id_actriz
                FROM 
                actrices
                ORDER BY 
                pk_id_actriz ASC";
    
    $datos = $conexion->query($consulta);

    /* 3bis. Realizamos otra consulta: Películas de este año y posteriores ordenadas.
    CURDATE() función que devuelve la fecha actual. YEAR(CURDATE()) extrae el año de la fecha actual. */

    $consulta2 = "SELECT  
                pk_id_pelicula,
                titulo as Titulo,
                cartel_pelicula as Cartel,
                anio as Anio,
                SUBSTRING_INDEX(peliculas.resumen,' ',29) as Resumen
                FROM
                peliculas
                WHERE
                Anio = YEAR(CURDATE())
                ORDER BY
                pk_id_pelicula DESC 
                LIMIT 10;";

    $datos2 = $conexion->query($consulta2);
     
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Estrenos de cine para los amantes del séptimo arte">
        <meta name="keywords" content="cine, estrenos, actore, actrices, direcotes, gratis, películas">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actores</title>
        <!-- <link rel="stylesheet" href="css/media.css"> -->
        <!-- <link rel="stylesheet" href="css/avisos.css"> -->
        <link rel="stylesheet" href="css/enc.css"> 
        <link rel="stylesheet" href="css/css_cine_v2.css">
        <style>

            #titulo{
                position: relative;
            }

            article>figure>img {
                width: 100%;
                height: 100%;
                color: yellow;
            }

        </style>

    </head>
    <body>

        <?php

            require('enc_pie/enc.php');

        ?>

        <div id="contenido">   
            <main>         
                <section id="cine" class="texto-cursiva texto-negrita">
                    <h2>Cine para todos</h2>
                    <?php
                        while($fila = $datos->fetch_array(MYSQLI_ASSOC)){
                            //echo "Oscar: {$fila['oscar_pelicula']}<br>"
                    ?>                      
                        <article>
                            <div id="oscar">
                                <?=$fila['oscar_actriz'] == 'S' ? '<img src="img/oscar.png" alt="Actriz premiada con Oscar" title="Actriz premiada con Oscar">' : ''?>
                            </div>

                            <h3><?= $fila['nombre_actriz'] ?></h3> 
                            <img src="<?= $fila['foto_actriz']?>"  alt="<?=$fila['nombre_actriz']?>" title="<?=$fila['nombre_actriz']?>">
                            <p></p>
                            <div id="info_peliculas">
                                <div id="info_tecnica">
                                   <p>Fecha nacimiento <?= $fila['fecha_nacimiento_actriz'] ?></p>
                                   <p>Edad: <?= $fila['edad_actriz_calculada'] ?></p>
                                   <p>Nacionalidad: <?= $fila['nacionalidad_actriz'] ?></p>
                                   <p>Fallecido: <?= $fila['actriz_fallecida'] ?> 
                                                        <?= $fila['actriz_fallecida']== 'S' ? '<span style="color:yellow"> &#8224</span>' : '' ?></p>
                                    <div id="btn_info">
                                        <a href="filmografia_actrices.php?pk_id_actriz=<?= $fila['pk_id_actriz']?>">
                                            Filmografía
                                        </a>
                                    </div>
                                </div>             
                            </div>
                            
                        </article>
                    <?php
                        }//while
                        //$conexion->close();
                    ?>
                </section>
            </main>
            <!-- ..............aside..................... -->
            <!-- <aside class="ocultar"> --> 
            <!-- Que aparezcan las peliculas de este año y posteriores en el aside, titulo, año, cartel y un pequeño resumen con unas cuantas palabras -->
            <aside id="estrenos" aria-label="Últimos estrenos">
               <h4 aria-labelledby="estrenos" >Últimos estrenos</h4>
                <?php
                    while($fila2 = $datos2->fetch_array(MYSQLI_ASSOC)){
                ?>
                       <h5 aria-labelledby="info">
                            <a href="ficha-pelicula.php?pk_id_pelicula=<?=$fila2['pk_id_pelicula']?>">
                                <?= $fila2['Titulo'] ?> <?= $fila2['Anio']?>
                            </a>
                       </h5> 
                       <a href="ficha-pelicula.php?pk_id_pelicula=<?=$fila2['pk_id_pelicula']?>">
                            <img src="<?=$fila2['Cartel']?>" alt="<?= $fila2['Titulo'] ?>">
                       </a>
                       <p>
                            <?=$fila2['Resumen']?>
                       </p>
                <?php
                    }//while
                ?>

                <!-- <h4>Información.</h4>
                <p></p>
                <details>
                    <summary>
                        Cine
                    </summary>
                        <img src="" alt="">
                        <img src="" alt="">
                        <img src="" alt="">
                </details>     -->   
                
                
                <?php
                    // while($fila2 = $datos2->fetch_array(MYSQLI_ASSOC)){
                    //     echo <<< peli
                    //         <div>
                    //            <p> Título: {$fila2['Titulo']} </p>
                    //            <p> Año: {$fila2['Anio']} </p>
                    //            <figure>
                    //                 <img src="{$fila2['Cartel']}" alt="">
                    //                 <figcaption></figcaption>
                    //            </figure>
                    //            <p> Resumen: {$fila2['Resumen']} ... </p>
                    //         </div>
                    //     peli;
                    // };
                ?>

            </aside>
        </div>
        <?php
          require_once('enc_pie/pie.php');
          $conexion->close();
        ?>

    </body>
</html>