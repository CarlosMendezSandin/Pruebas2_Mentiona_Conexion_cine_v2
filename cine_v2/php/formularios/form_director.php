
<?php

    $servidor = 'localhost';
    $usuario = 'root';
    $pass = '';
    $bd = 'cine_v2';
    $conexion = new mysqli($servidor, $usuario, $pass, $bd);

    if(!$conexion->connect_errno) {
        echo '<p class = "encendido">CONEXIÓN ABIERTA</p>';
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form director</title>
    <link rel="stylesheet" href="../css/avisos.css">
</head>
<body>

    <h2>Nuevo director</h2>

    <form action="../insertar_datos/insertar_director.php" method="get">
        <fieldset>
            <legend>Datos del director</legend>
            <p>
                <label for="nombre_director">Nombre:</label>
                <input type="text" id="nombre_director" name="nombre_director" required>
            </p>
            <p>
                <label for="foto_director">Fotografía:</label>
                <input type="file" id="foto_director" name="foto_director" required>
            </p>
            <p>
                <label for="edad_director">Edad:</label>
                <input type="number" id="edad_director" name="edad_director" required>
            </p>
            <p>
                <label for="fecha_nacimiento_director">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento_director" name="fecha_nacimiento_director">
            </p>
            <p>
                <label for="nacionalidad_director">Nacionalidad:</label>
                <input type="text" id="nacionalidad_director" name="nacionalidad_director">
            </p>
            <p>
                <label for="oscar_director">Oscar:</label>
                <select name="oscar_director" id="oscar_director">
                    <option value="S">Si</option>
                    <option value="N">No</option>
                    <option value="" selected hidden></option>
                </select>
            </p>
            <!-- <p>
                <label for="director_fallecido">Fallecido:</label>
                <select name="director_fallecido" id="director_fallecido">
                    <option value="S">Si</option>
                    <option value="N">No</option>
                    <option value="" selected hidden></option>
                </select>
            </p> -->
            <p>
                <label for="si">Sí
                    <input type="radio" id="si" name="director_fallecido" value="S">
                </label>
                <label for="no">No
                <input type="radio" id="no" name="director_fallecido" value="N">
                </label>
            </p>
            <p>
            <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo">
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="" selected hidden></option>
                </select>
            </p>
        </fieldset>
        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">
    </form>
    <?php

    if(mysqli_close($conexion)) {
        echo "<p class='apagado'>La conexión se ha cerrado con éxito</p>";
    }

    ?>
    
</body>
</html>