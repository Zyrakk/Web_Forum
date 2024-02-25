<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="website, project, tutorial">
    <meta name="author" content="Stefan Contreras">
    <!--Hojas de Estilo CSS y Favicon-->
    <link rel="stylesheet" href="./assets/styles_compartido.css">
    <link rel="stylesheet" href="./assets/styles_signup.css">
    <link rel="icon" href="./favicon.ico">
    <title>Sign Up</title>
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
                <li><a href="signup.php"><u>Register</u></a></li>
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
                <a href="login.php">Log In</a>
                <a href="signup.php"><u>Register</u></a>
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
    <!--Formulario de Registro-->
    <div class="wrapper">
        <form action="./php/register_iny.php" class="form" method="POST">

            <h1 class="title">Sign Up</h1>

            <br>
            <?php
            if (isset($_GET['error'])) {
                $error_message = htmlspecialchars($_GET['error']);
                ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php } ?>
            <?php
            if (isset($_GET['success'])) {
                $success_message = htmlspecialchars($_GET['success']);
                ?>
                <p class="success"><?php echo $success_message; ?></p>
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
            <div class="inp">
                <input type="password" name="Rpasswd" class="input" placeholder="Repeat the Password">
                <i class="fa-solid fa-lock"></i>
            </div>
            <button class="submit">Sign Up</button>
            <p class="footer">Already have an Account? <a href="login.php" class="link">Please, Log In</a> </p>
        </form>
        <div></div>
        <div class="banner">
            <h1 class="wel_text">Welcome<br/></h1>
            <p class="para">Created by:<br>Stefan<br>:)</p>
        </div>
    </div>
</body>
</html>