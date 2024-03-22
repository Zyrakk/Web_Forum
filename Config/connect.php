<?php

    #     ^ ^
    #    (O,O)
    #    (   )
    #    -"-"--

    $host = "localhost";
    $user = "lyra";
    $pass = "zyrak0612";
    $db = "vouchfads";

    $conexion = new mysqli($host, $user, $pass, $db);

    if (!$conexion) {
        echo "Conexion fallida";
    }

?>
