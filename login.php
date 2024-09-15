<?php
    require('php/mantenimiento.php');
?>

<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="./assets/styles_login.css">
    <link rel="icon" href="./favicon.ico">
    <title>Log In</title>
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
                <li><a href="login.php"><u>Log In</u></a></li>
                <li><a href="signup.php">Register</a></li>
                <li><a href="about.html">About</a></li>
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
                <a href="login.php"><u>Log In</u></a>
                <a href="signup.php">Register</a>
                <a href="about.html">About</a>
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
    <!--Formulario de Inicio de Sesión-->
    <div class="wrapper">
        <form action="./php/loginp_iny.php" class="form" method="POST">
            <h1 class="title">Log In</h1>

            <br>
            <?php
            if (isset($_GET['error'])) {
                $error_message = htmlspecialchars($_GET['error']);
            ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php } ?>
            <br>

            <div class="inp">
                <input type="text" name="usernm" class="input" placeholder="Username">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="inp">
                <input type="password" name="passwd" class="input" placeholder="Password">
                <i class="fa-solid fa-lock"></i>
            </div>
            <button class="submit">Log In</button>
            <p class="footer">Don't have an Account? <a href="signup.php" class="link">Please, Sign Up</a></p>
        </form>
        <div></div>
        <div class="banner">
            <h1 class="wel_text">Welcome<br></h1>
            <p class="para">Created by:<br>Stefan<br>:)</p>
        </div>
    </div>
</body>
</html>