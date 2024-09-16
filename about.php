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
    <link rel="stylesheet" href="./assets/styles_about.css">
    <link rel="icon" href="./favicon.ico">
    <title>About Us</title>
    <!--Librería de FontsAwesome-->
    <script src="https://kit.fontawesome.com/4cfcd8f4d3.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--Menú Superior-->
    <header class="header1">
        <!--Menu de Escritorio-->
        <nav class="nav1">
            <ul class="top_menu">
                <li><a href="home.html">Home</a></li>
                <li><a href="login.php">Log In</a></li>
                <li><a href="signup.php">Register</a></li>
                <li><a href="about.html"><u>About</u></a></li>
                <li><a href="contact.html">Contact</a></li>
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
                <a href="home.html">Home</a>
                <a href="login.php">Log In</a>
                <a href="signup.php">Register</a>
                <a href="about.html"><u>About</u></a>
                <a href="contact.html">Contact</a>
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
</body>
</html>