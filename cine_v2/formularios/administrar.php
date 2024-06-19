
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar BD cine_v2</title>

    <style>

        main {
            display: flex;
        }

        #caja_1 {
            width: 20%;
            background-color: #eee;
            border-radius: 10px;
            border: 2px solid rgb(84, 84, 84);
            padding: 10px;
        }

        #caja_2 {
            width: 80%;
        }

        #marco {
            width: 100%;
            height: 80vh;
        }

        ul {
            list-style: none;
        }

        ul li {
            line-height: 35px;
        }

        #caja_1 a {
            text-decoration: none;
            padding: 5px;
            border: 2px solid rgb(84, 84, 84);
            border-radius: 5px;
        }

        #caja_1 a:visited {
            color: purple;
        }

        #caja_1 a:hover {
            color: orange;
            border: 2px solid orange;
        }

    </style>

</head>
<body>
    
    <h1>Administrar sitio</h1>

    <main>
        <div id="caja_1">
            <h2>Insertar nuevos datos</h2>
            <ul>
                <li>
                    <a href="form_actores.php" target="marco">Insertar Actor</a>
                </li>
                <li>
                    <a href="form_actrices.php" target="marco">Insertar Actriz</a>
                </li>
                <li>
                    <a href="form_director.php" target="marco">Insertar Director</a>
                </li>
                <li>
                    <a href="form_peliculas.php" target="marco">Insertar Película</a>
                </li>
                <li>
                    <a href="form_genero.php" target="marco">Insertar Género</a>
                </li>
                <li>
                    <a href="form_produccion.php" target="marco">Insertar Producción</a>
                </li>
            </ul>
        </div>

        <div id="caja_2">
            <iframe src="" frameborder="0" id="marco" name="marco"></iframe>
        </div>

    </main>

</body>
</html>