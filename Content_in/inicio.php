<?php

    #     ^ ^
    #    (O,O)
    #    (   )
    #    -"-"--

    session_start();
    if (isset($_SESSION['Id']) && isset($_SESSION['NombreUsuario'])) {
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Hojas de Estilo CSS-->
    <link rel="stylesheet" href="../assets_in/styles_inicio.css">
    <link rel="stylesheet" href="../assets_in/styles_inicio_dark.css">
    <link rel="icon" href="../sources/favicon.ico" type="image/x-icon">
    <title>Inicio</title>
</head>
<body>
    <header>
        <!--Perfil top_right-->
        <nav class="container">
            <button class="btn">
                <i class="fa-solid fa-hashtag"></i><?= $_SESSION['NombreUsuario'] ?>
                <!--<img src="../sources/icon_profile_5.png" class="profile_img" alt="Profile Icon">-->
                <ul class="dropdown">
                    <li><a href="#"><i class="fa-solid fa-user"></i>&#160;&#160;&#160;Profile</a></li>
                    <li><a href="#" id="switch"><i class="fa-solid fa-moon"></i>&#160;&#160;&#160;Dark Mode</a></li>
                    <li><a href="../php/LogOut.php"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>&#160;&#160;&#160;Log Out</a></li>
                </ul>
            </button>
        </nav>
    </header>
    <!--Botones-->
    <div class="buttons">
      <button class="sq_button" onclick="location.href='../mybb'">
        <i class="fa-light fa-messages"></i>
        <span>Z-Forum</span>
      </button>

      <button class="sq_button" onclick="location.href='../metadata/metadata.php'">
        <i class="fa-light fa-fingerprint"></i>
        <span>Metadata</span>
      </button>

      <button class="sq_button">
        <i class="fa-light fa-dna"></i>
        <span>Soon</span>
      </button>

      <button class="sq_button">
        <i class="fa-light fa-chart-mixed"></i>
        <span>Soon</span>
      </button>

      <button class="sq_button">
        <i class="fa-light fa-seedling"></i>
        <span>Soon</span>
      </button>

      <button class="sq_button">
        <i class="fas fa-terminal"></i>
        <span>Soon</span>
      </button>
    </div>
    <script type="text/javascript" src="../scripts/dark_switch.js"></script>
    <script type="text/javascript" src="../scripts/user_menu.js"></script>
</body>
</html>

<?php
    }else {
        header("location: ../portfolio.html");
    }
?>
