<?php

    #     ^ ^
    #    (O,O)
    #    (   )
    #    -"-"--

    session_start();
    session_unset();
    session_destroy();

    header("location: ../home.php");

?>