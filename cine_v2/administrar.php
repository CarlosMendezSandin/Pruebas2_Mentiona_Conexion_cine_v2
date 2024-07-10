<?php

    REQUIRE('php/formularios/abrir_conexion.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar sitio</title>
    <link rel="stylesheet" href="css/enc.css">
    <link rel="stylesheet" href="css/css_cine_v2.css">
    <link rel="stylesheet" href="css/administrar.css">

    <style>
        main {
            width: 100%;
            padding-bottom: 0px;
        }
    </style>


</head>

<body>

    <?php

        require('enc_pie/enc.php');

    ?>

    <h2>Administrar sitio</h2>

    <main>
        <div id="caja_1">
            <h3>Insertar nuevos datos</h3>
            <ul>
                <li>
                    <a href="php/formularios/form_actores.php" target="marco">Insertar Actor</a>
                </li>
                <li>
                    <a href="php/formularios/form_actrices.php" target="marco">Insertar Actriz</a>
                </li>
                <li>
                    <a href="php/formularios/form_director.php" target="marco">Insertar Director</a>
                </li>
                <li>
                    <a href="php/formularios/form_peliculas.php" target="marco">Insertar Película</a>
                </li>
                <li>
                    <a href="php/formularios/form_genero.php" target="marco">Insertar Género</a>
                </li>
                <li>
                    <a href="php/formularios/form_produccion.php" target="marco">Insertar Producción</a>
                </li>
                <li>
                    <a href="php/formularios/form_retrato.php" target="marco">Insertar Retrato</a>
                </li>
            </ul>
            <h3>Insertar nuevos datos</h3>
            <ul>
                <li>
                    <a href="php/formularios/form_actores_actualizar.php" target="marco">Actualizar Actor</a>
                </li>
                <li>
                    <a href="php/formularios/form_actrices_actualizar.php" target="marco">Actualizar Actriz</a>
                </li>
                <li>
                    <a href="php/formularios/form_directores_actualizar.php" target="marco">Actualizar Director</a>
                </li>
            </ul>
        </div>

        <div id="caja_2">
            <iframe src="" frameborder="0" id="marco" name="marco"></iframe>
        </div>

        
    </main>

    <?php

        require('enc_pie/pie.php');

    ?>

</body>

</html>
<?php

    REQUIRE('php/formularios/cerrar_conexion.php');

?>