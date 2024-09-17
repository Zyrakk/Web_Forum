<?php
    require('php/maintenance_check.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="website, project, tutorial">
    <!-- ^ ^
        (O,O)
        (   )
        -"-"-- -->
    <!--Hojas de Estilo CSS y Favicon-->
    <link rel="stylesheet" href="./assets/styles_compartido.css">
    <link rel="stylesheet" href="./assets/styles_colors.css">
    <link rel="stylesheet" href="./assets/styles_home.css">
    <link rel="icon" href="./favicon.ico">
    <title>Home</title>
    <!--Librería de FontsAwesome-->
    <script src="https://kit.fontawesome.com/4cfcd8f4d3.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--Menú Superior-->
    <header class="header1">
        <!--Menu de Escritorio-->
        <nav class="nav1">
            <ul class="top_menu">
                <li><a href="home.php"><u>Home</u></a></li>
                <li><a href="login.php">Log In</a></li>
                <li><a href="signup.php">Register</a></li>
            </ul>
        </nav>
    </header>
    <header class="header2">
        <!--Menu de Movil-->
        <nav class="nav2">
            <div id="main">
                <span class="menu_but" onclick="openNav()">&#9776;</span>
            </div>
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="home.php"><u>Home</u></a>
                <a href="login.php">Log In</a>
                <a href="signup.php">Register</a>
            </div>
            <script>
                function openNav() {
                document.getElementById("mySidenav").style.width = "100%";
                }
                
                function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                }
            </script>
        </nav>
    </header>
    <div class="bodyy">
        <!--Portada-->
        <div class="content">
            <h1 class="title">Website Project</h1><br>
            <figure>
                <img src="https://readme-typing-svg.demolab.com?font=Fira+Code&pause=1000&color=0ef&center=true&vCenter=true&random=false&width=435&lines=Welcome+to+my+Website" alt="Typing SVG">
            </figure>
        </div>
        <address id="part_1""></address>
        <!--Bloque de Contenido 1-->
        
    </div>
</body>
</html>
