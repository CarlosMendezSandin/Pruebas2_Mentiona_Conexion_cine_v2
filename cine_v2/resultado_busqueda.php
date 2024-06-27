<?php

    REQUIRE('php/formularios/abrir_conexion.php');

?>
<?php

    /* Captura de datos del formulario */

    $terminos_busqueda = trim($_REQUEST['terminos_busqueda']);

    /* Cadena de busqueda en la base de datos */

    $consulta = "SELECT 
                titulo,
                resumen
                FROM
                peliculas
                WHERE MATCH(
                titulo,
                resumen)
                AGAINST(?)
                ORDER BY
                titulo ASC";

    $resultado = $conexion->prepare($consulta);

    $resultado->bind_param("s", $terminos_busqueda);

    $resultado->execute();

    /* Conteo de filas */

    $resultado->store_result();

    $resultado->bind_result($titulo, $resumen);

    echo "<p>Nº de resultados encontrados".$resultado->num_rows."</p>";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado busqueda</title>
    <link rel="stylesheet" href="css/avisos.css">
</head>
<body>

    <h2>Resultados de la busqueda</h2>

    <section>
        <?php
        
            while ($resultado->fetch()) {
        
        ?>

                <p>Título: <?=$titulo?></p>

        <?php
        
            }
    
        ?>
    </section>
    
</body>
</html>
<?php

    REQUIRE('php/formularios/cerrar_conexion.php');

?>