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
    <title>Form Pelicula</title>
    <link rel="stylesheet" href="../css/avisos.css">

</head>
<body>
    
    <h2>Nueva Pélicula</h2>

    <form action="../insertar_datos/insert_pelicula.php" method="get">
        <fieldset>
            <legend>Datos de la película</legend>

            <p>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
            </p>
            <p>
                <label for="cartel_pelicula">Cartel:</label>
                <input type="file" id="cartel_pelicula" name="cartel_pelicula">
            </p>
            <p>
                <label for="anio">Año:</label>
                <input type="number" id="anio" name="anio">
            </p>
            <p>
                <label for="duracion">Duración:</label>
                <input type="number" id="duracion" name="duracion">
            </p>
            <p>
                <label for="oscar_pelicula">Oscar:</label>
                <select name="oscar_pelicula" id="oscar_pelicula">
                    <option value="S">Si</option>
                    <option value="N">No</option>
                    <option value="" selected hidden></option>
                </select>
            </p>
            <p>
                <label for="fk_id_actor">Actor:</label>
                <select name="fk_id_actor" id="fk_id_actor">
                    <?php
                        $consulta = "SELECT
                                    pk_id_actor,
                                    nombre_actor
                                    FROM
                                    actores
                                    ORDER BY
                                    nombre_actor ASC";
                                    $datos = $conexion->query($consulta);
                                    while($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
                                        echo "<option value = '{$fila['pk_id_actor']}'>{$fila['nombre_actor']}</option>";
                                    }                
                    ?>
                    <option value="" selected hidden>Seleccione un actor</option>
                </select>
            </p>
            <p>
                <label for="fk_id_actriz">Actriz:</label>
                <select name="fk_id_actriz" id="fk_id_actriz">
                    <?php
                        $consulta = "SELECT
                                    pk_id_actriz,
                                    nombre_actriz
                                    FROM
                                    actrices
                                    ORDER BY
                                    nombre_actriz ASC";
                                    $datos = $conexion->query($consulta);
                                    while($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
                                        echo "<option value = '{$fila['pk_id_actriz']}'>{$fila['nombre_actriz']}</option>";
                                    }                
                    ?>
                    <option value="" selected hidden>Seleccione una actriz</option>
                </select>
            </p>
            
            <p>
                <label for="fk_id_director">Director:</label>
                <select name="fk_id_director" id="fk_id_director">
                    <?php
                    
                        $consulta = "SELECT
                                    pk_id_director,
                                    nombre_director
                                    FROM
                                    director
                                    ORDER BY
                                    nombre_director ASC";
                                    $datos = $conexion->query($consulta);
                                    while($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
                                        echo "<option value = '{$fila['pk_id_director']}'>{$fila['nombre_director']}</option>";
                                    }
                    ?>
                    <option value="" selected hidden>Seleccione un director</option>
                </select>
            </p>
            <p>
                <label for="fk_id_genero">Género:</label>
                <select name="fk_id_genero" id="fk_id_genero">
                    <?php
                    
                        $consulta = "SELECT
                                    pk_id_genero,
                                    nombre_genero
                                    FROM
                                    genero
                                    ORDER BY
                                    nombre_genero ASC";
                                    $datos = $conexion->query($consulta);
                                    while($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
                                        echo "<option value = '{$fila['pk_id_genero']}'>{$fila['nombre_genero']}</option>";
                                    }
                    ?>
                    <option value="" selected hidden>Seleccione un género</option>
                </select>
            </p>
            <p>
                <label for="pk_id_produccion">Producción:</label>
                <select name="pk_id_produccion" id="pk_id_produccion">
                    <?php
                    
                        $consulta = "SELECT
                                    pk_id_produccion,
                                    nombre_produccion
                                    FROM
                                    produccion
                                    ORDER BY
                                    nombre_produccion ASC";
                                    $datos = $conexion->query($consulta);
                                    while($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
                                        echo "<option value = '{$fila['pk_id_produccion']}'>{$fila['nombre_produccion']}</option>";
                                    }
                    ?>
                    <option value="" selected hidden>Seleccione una producción</option>
                </select>
            </p>
        </fieldset>
        <fieldset>
            <legend>Sinopsis:</legend>
            <textarea name="resumen" id="resumen" rows="10" cols="100"></textarea>
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