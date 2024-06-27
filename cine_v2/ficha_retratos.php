<?php

    REQUIRE('php/formularios/abrir_conexion.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/avisos.css">

    <style>

        section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        figure {
            border: 4px solid rgb(205, 205, 205);
            border-radius: 10px;
            padding: 15px;
            background-color: rgb(240, 240, 240);
            width: 16%;
            box-shadow: 0px 10px 10px;
            transition: 1s;
        }

        figcaption {
            font-size: 1em;
            font-family:  'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif, cursive, bold;
            padding: 10px;
            margin-bottom: 10px;
            text-transform: uppercase;
            border: 4px solid rgb(205, 205, 205);
            width: auto;
            text-align: center;
            border-radius: 10px;
        }

        img {
            border-radius: 15px;
            width: 100%;
        }

        p {
            display: none;
        }
        
        /* ============================================== */
        /* Voltear como si le dieras la vuelta a un cromo */
        /* ============================================== */

        figure:hover {
            transform: rotateY(180deg);        
            p {
                transform: rotateY(180deg);
                display: block;
            }
            figcaption,
            img {
                display: none;
            }
        }

    </style>

</head>
<body>
    
    <h2>Personajes de películas</h2>

    <?php
    
        $consulta = "SELECT 
                    *
                    FROM
                    retrato
                    ORDER BY
                    titulo_pelicula ASC";
        
        $datos = $conexion->query($consulta);
    
    ?>

    <!-- ASSOC => asociacion por nombre;valor -->
    <!-- NUM => asociacion numerica correspondiente al nº posicional de la columna de la tabla -->
    <!-- fetch_array() sin especificar devuelve los dos metodos "NUM" y "ASSOC" -->

    <section >
        <?php
        
            while($fila = $datos->fetch_array(MYSQLI_ASSOC)){
        
        ?>
            <figure>
                <figcaption><?=$fila['titulo_pelicula']?></figcaption>
                <img src="<?=$fila['retrato']?>" alt="<?=$fila['titulo_pelicula']?>">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam, a! Perferendis quis voluptatibus nostrum velit voluptate omnis! Minus veritatis incidunt, placeat soluta ducimus tenetur modi, rerum alias quidem, odit doloribus?</p>
            </figure>
            
        <?php
            
            }
        
        ?>
    </section>

</body>
</html>
<?php

    REQUIRE('php/formularios/cerrar_conexion.php');

?>