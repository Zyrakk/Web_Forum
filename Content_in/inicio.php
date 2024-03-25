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
    <title>Inicio</title>
</head>
<body>
    <header>
        <!--Perfil top_right-->
        <nav class="container">
            <button class="btn">
                <i class="fa-solid fa-hashtag"></i><?= $_SESSION['NombreUsuario'] ?>
                <!--<img src="./IMG/icon_profile_5.png" class="profile_img" alt="Profile Icon">-->
                <ul class="dropdown">
                    <li><a href="#"><i class="fa-duotone fa-user"></i>&#160;&#160;&#160;Profile</a></li>
                    <li><a href="#"><i class="fa-duotone fa-gears"></i>&#160;&#160;Settings</a></li>
                    <li><a href="#"><i class="fa-duotone fa-right-from-bracket"></i>&#160;&#160;&#160;Log Out</a></li>
                </ul>
            </button>
        </nav>
        <!--Boton modo oscuro-->
        <button class="darkModeSwitch ms-2" id="switch">
            <span><i class="fas fa-sun"></i></span>
            <span><i class="fas fa-moon"></i></span> 
        </button>
    </header>
    <!--Botones-->
    <div class="buttons">  
      <button class="sq_button">
        <i class="fa-light fa-messages"></i>
        <span>Z-Forum</span>
      </button>

      <button class="sq_button">
        <i class="fa-light fa-clapperboard-play"></i>
        <span>Soon</span>
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
</body>
</html>

<?php   
    }else {
        header("location: ../home.html");
    }
?>