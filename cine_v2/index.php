<?php

    /* ==================== CONEXIÓN A LA BASE DE DATOS ==================== */

    REQUIRE('php/formularios/abrir_conexion.php');

                /* ================ Consulta ================ */
    
    $consulta = "SELECT
                titulo,
                cartel_pelicula,
                SUBSTRING_INDEX(resumen, ' ', 30) AS resumen,
                anio,
                duracion,
                oscar_pelicula,
                nombre_actor,
                nombre_actriz,
                nombre_director,
                nombre_genero,
                nombre_produccion
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
    $datos = $conexion->query($consulta)

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Una vuelta por nuestro maravilloso planeta azul. Paisajes, gastronomía, fotografía, costumbres, fauna.">
    <meta name="keywords" content="España, Europa, América, África, Asia, gastronomía, fotografía">
    <meta name="author" content="Fco. José">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine para todos</title>
    <link rel="stylesheet" href="css/css_cine_v2.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/avisos.css">
</head>
<body>
    <header>
        <h1>Cine para todos</h1>

    </header>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="actores.php">Actores</a>
        <a href="actrices.php">Actrices</a>
        <a href="directores.php">Directores</a>
        <a href="php/formularios/administrar.php" target="_blank">Administrar sitio</a>
    </nav>
    <div id="contenido">
        <main>
            <section id="cine">

                <h2>Cine para todos</h2>

                <?php
        
                    while($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
        
                ?>

                <article>
                    <h3><?= $fila['titulo'] ?></h3>

                    <img src="<?= $fila['cartel_pelicula']?>" alt="" title="">
                    <p>
                        Año: <?=$fila['anio']?><br>
                        Duración: <?=$fila['duracion']?><br>
                        Oscar: <?=$fila['oscar_pelicula']?><br>
                        Género: <?=$fila['nombre_genero']?><br>
                        Producción: <?=$fila['nombre_produccion']?>
                        <ul>
                            Reparto:
                            <li><?=$fila['nombre_actor']?></li>
                            <li><?=$fila['nombre_actriz']?></li>
                        </ul>
                        <ul>
                            Director:
                            <li><?=$fila['nombre_director']?></li>
                        </ul>
                    </p>
                    <?=$fila['resumen']?> ...
                    <p>Más información</p>
                </article>
                <?php
        
                    }
        
                ?>
                
            </section>
            
        </main>
        <aside id="info" aria-label="información">

            <h4 aria-labelledby="info">Últimos estrenos</h4>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti modi, libero nemo facilis consectetur similique impedit quidem earum nisi repellat dolores, fugiat et ipsam esse consequatur fugit asperiores aliquam ad!</p>

            <details>
                <summary>Cine</summary>
                <img src="" alt=""><img src="" alt=""><img src="" alt="">
            </details>
            
        </aside>
    </div>
    <footer>
        <address>
            &copy;mentiona<br>
            Saavedra, nº1 · Gijón · Principado de Asturias<br>
            Curso Aplicaciones web · 2024
        </address>
    </footer>
    <?php

    /* ==================== CERRAMOS CONEXIÓN CON BASE DE DATOS ==================== */

    REQUIRE('php/formularios/cerrar_conexion.php'); 

    ?>
</body>
</html>