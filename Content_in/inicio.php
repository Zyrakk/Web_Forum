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
    <!--Perfil top-->
        <nav class="nav_user">
            <ul>
                <li class="perfil">Perfil</li>
                    <ul>
                        <li><a href="">Perfil</a></li>
                        <li><a href="">Configuracion</a></li>
                        <li><a href="">otros</a></li>
                        <li><a href="../php/LogOut.php"><i class="fa-regular fa-user"></i>Cerrar Sesión</a></li>
                    </ul>
                
            </ul>
        </nav>
    </header>
    <h1>Has iniciado sesión</h1>
    <br>
    <button class="logout" onclick="location.href='../php/LogOut.php'"><i class="fa-regular fa-user"></i>Cerrar Sesión</button>
</body>
</html>

<?php   }else {
    header("location: ./home.html");
} ?>