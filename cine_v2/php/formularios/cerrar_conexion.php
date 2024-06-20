<?php

    if(mysqli_close($conexion)) {
        echo "<p class='apagado'>La conexión se ha cerrado con éxito</p>";
    }

?>