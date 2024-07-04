<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form retrato</title>
    <link rel="stylesheet" href="../../css/administrar.css">
</head>
<body>
    <form action="../insertar_datos/insertar_retrato.php" method="get">
        <fieldset>
            <legend>Retrato</legend>
            <p>
                <label for="titulo_pelicula">Título película:</label>
                <input type="text" id="titulo_pelicula" name="titulo_pelicula">
            </p>
            <p>
                <label for="retrato">Retrato (img):</label>
                <input type="file" id="retrato" name="retrato">
            </p>
            <p>
                <label for="pelicula">Título película (BD):</label>
                <select neme="pelicula" id="pelicula">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""  selected hidden>Pendiente</option>
                </select>
            </p>
            
            <input type="submit" value="Enviar">
            <input type="reset" value="Borrar">
        </fieldset>
        
    </form>
</body>
</html>