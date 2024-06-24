
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
    <title>Form Actriz</title>
    <link rel="stylesheet" href="../css/avisos.css">
</head>
<body>

    <h2>Nuevo Actriz</h2>

    <form action="../insertar_datos/insertar_actriz.php" method="get">
        <fieldset>
            <legend>Datos de la Actriz</legend>
            <p>
                <label for="nombre_actriz">Nombre:</label>
                <input type="text" id="nombre_actriz" name="nombre_actriz" required>
            </p>
            <p>
                <label for="foto_actriz">Fotografía:</label>
                <input type="file" id="foto_actriz" name="foto_actriz" required>
            </p>
            <p>
                <label for="edad_actriz">Edad:</label>
                <input type="number" id="edad_actriz" name="edad_actriz" required>
            </p>
            <p>
                <label for="fecha_nacimiento_actriz">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento_actriz" name="fecha_nacimiento_actriz">
            </p>
            <p>
                <label for="nacionalidad_actriz">Nacionalidad:</label>
                <input type="text" id="nacionalidad_actriz" name="nacionalidad_actriz">
            </p>
            <p>
                <label for="oscar_actriz">Oscar:</label>
                <select name="oscar_actriz" id="oscar_actriz">
                    <option value="S">Si</option>
                    <option value="N">No</option>
                    <option value="" selected hidden></option>
                </select>
            </p>
            <!-- <p>
                <label for="actriz_fallecida">Fallecida:</label>
                <select name="actriz_fallecida" id="actriz_fallecida">
                    <option value="S">Si</option>
                    <option value="N">No</option>
                    <option value="" selected hidden></option>
                </select>
            </p> -->
            <p>
                <label for="actriz_fallecida">Fallecida:</label>
                <label for="si">Sí
                    <input type="radio" id="si" name="actriz_fallecida" value="S">
                </label>
                <label for="no">No
                <input type="radio" id="no" name="actriz_fallecida" value="N">
                </label>
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