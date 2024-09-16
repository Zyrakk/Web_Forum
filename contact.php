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
    <link rel="stylesheet" href="./assets/styles_contact.css">
    <link rel="icon" href="./favicon.ico">
    <title>Contact</title>
    <!--Librería de FontsAwesome-->
    <script src="https://kit.fontawesome.com/4cfcd8f4d3.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--Menú Superior-->
    <header class="header1">
        <!--Menu de Escritorio-->
        <nav class="nav1">
            <ul class="top_menu">
                <li><a href="home.php">Home</a></li>
                <li><a href="login.php">Log In</a></li>
                <li><a href="signup.php">Register</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php"><u>Contact</u></a></li>
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
                <a href="home.php">Home</a>
                <a href="login.php">Log In</a>
                <a href="signup.php">Register</a>
                <a href="about.php">About</a>
                <a href="contact.php"><u>Contact</u></a>
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
    <div class="consulta">
        <form action="#" class="form" method="POST">
            <h1 class="title">FAQ</h1>
            <hr>
            <div class="inp">
                <i class="fa-solid fa-arrow-right"></i>
                <input type="text" name="faq" class="input" placeholder="Introduce your question here" required>
                <i class="fa-solid fa-question"></i>
            </div>
            <div class="inp">
                <i class="fa-solid fa-arrow-right" style="color: transparent;"></i>
                <input type="email" name="email" class="input" placeholder="Introduce your email (Optional)" 
                pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="inp_2">
                <input type="number" name="user_id" class="user_id" placeholder="User ID" min="0" max="100">
                <i class="fa-solid fa-fingerprint"></i>
                <select class="options" name="topic">
                    <option value="predet" selected hidden>Choose a topic for your FAQ</option>
                    <optgroup label="Problems with the Code" class="c">
                        <option value="1">Technical Problems</option>
                        <option value="2">Syntax Error</option>
                        <option value="3">Other</option>
                    </optgroup>
                    <optgroup label="Problems with the Webpage" class="c">
                        <option value="4">Log-In</option>
                        <option value="5">Register</option>
                        <option value="6">Other</option>
                    </optgroup>
                </select>
            </div>
            <div class="inp_3">
                <label class="lab_opt">
                    <input type="radio" name="privacy" class="opt_radio" value="1" checked>&#160;&#160;Show User
                </label>
                <label class="lab_opt">
                    <input type="radio" name="privacy" class="opt_radio" value="2">&#160;&#160;Don't show User
                </label>
                <label class="lab_opt">
                    <input type="radio" name="privacy" class="opt_radio" value="2">&#160;&#160;Private FAQ
                </label>
            </div>
            <div class="inp_3">
                <label class="lab_opt">
                    <input type="checkbox" name="terms" class="check" value="terminos" checked>&#160;&#160;&#160;
                    I accept <a href="https://www.termsandconditionsgenerator.com/live.php?token=dQ9KgX8x8QLBzkOmio9hVfG9qlXVqaLS" target="_blank"> <i><c>terms and conditions</c></i></a>
                </label>
            </div>
            <hr>
            <div class="inp_3">
                <input type="submit" name="send" class="sub_res" value="Submit">
                <input type="reset" name="reset" class="sub_res" value="Reset">
            </div>
        </form>
    </div>
</body>
</html>
