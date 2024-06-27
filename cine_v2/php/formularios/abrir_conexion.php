
<?php

    $servidor = 'localhost';
    $usuario = 'root';
    $pass = '';
    $bd = 'cine_v2';
    $conexion = new mysqli($servidor, $usuario, $pass, $bd);

    if(!$conexion->connect_errno) {
        echo '<p class = "encendido">CONEXIÓN ESTABLECIDA</p>';
    }

?>
