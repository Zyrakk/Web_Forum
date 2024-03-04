<?php 
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
    <!--Libreria de FontsAwesome-->
    <script src="https://kit.fontawesome.com/4cfcd8f4d3.js" crossorigin="anonymous"></script>
    <title>Inicio</title>
</head>
<body>
    <header>
        <!--Perfil top_right-->
        <nav class="nav_user">
            <ul class="list_user">
                <li>
                <button class="perfil" onclick="">
                    <i class="fa-solid fa-hashtag"></i><?= $_SESSION['NombreUsuario'] ?> &#160;
                    <img src="./IMG/icon_profile_5.png" class="profile_img" alt="Profile Icon">
                </button>
                    <ul>
                        <li><button class="profile" onclick=""><i class="fa-solid fa-circle-user"></i>Profile</button></li>
                        <li><button class="settings" onclick=""><i class="fa-solid fa-sliders"></i>Settings</button></li>
                        <li><button class="other" onclick=""><i class="fa-solid fa-bomb"></i></i>Other</button></li>
                        <li><button class="logout" onclick="location.href='../php/LogOut.php'"><i class="fa-solid fa-right-from-bracket"></i>Log Out</button></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
</body>
</html>

<?php   
    }else {
        header("location: ../home.html");
    }
?>