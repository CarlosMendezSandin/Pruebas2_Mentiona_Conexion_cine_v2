<?php

$servidor = 'localhost';
$usuario = 'root';
$pass = '';
$bd = 'cine_v2';
$conexion = new mysqli($servidor, $usuario, $pass, $bd);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form actor</title>
    <link rel="stylesheet" href="../../css/administrar.css">
    
</head>

<body>

    <form action="../insertar_datos/insertar_actor.php" method="get">
        <fieldset>
            <legend>Datos del actor</legend>
            <p>
                <label for="nombre_actor">Nombre:</label>
                <input type="text" id="nombre_actor" name="nombre_actor" required>
            </p>
            <p>
                <label for="foto_actor">Fotografía:</label>
                <input type="file" id="foto_actor" name="foto_actor" required>
            </p>
            <p>
                <label for="edad_actor">Edad:</label>
                <input type="number" id="edad_actor" name="edad_actor" required>
            </p>
            <p>
                <label for="fecha_nacimiento_actor">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento_actor" name="fecha_nacimiento_actor">
            </p>
            <p>
                <label for="nacionalidad_actor">Nacionalidad:</label>
                <input type="text" id="nacionalidad_actor" name="nacionalidad_actor">
            </p>
            <p>
                <label for="oscar">Oscar:</label>
                <select name="oscar" id="oscar">
                    <option value="S">Si</option>
                    <option value="N">No</option>
                    <option value="" selected hidden></option>
                </select>
            </p>
            <!-- <p>
                <label for="actor_fallecido">Fallecido:</label>
                <select name="actor_fallecido" id="actor_fallecido">
                    <option value="S">Si</option>
                    <option value="N">No</option>
                    <option value="" selected hidden></option>
                </select>
            </p> -->
            <p>
                <label for="actor_fallecido">Fallecido:</label>
                <label for="si">Sí
                    <input type="radio" id="si" name="actor_fallecido" value="S">
                </label>
                <label for="no">No
                    <input type="radio" id="no" name="actor_fallecido" value="N">
                </label>
            </p>
            <input type="submit" value="Enviar">
            <input type="reset" value="Limpiar">
        </fieldset>
    </form>

    <?php

    mysqli_close($conexion)

    ?>

</body>

</html>