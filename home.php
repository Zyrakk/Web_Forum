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
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
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
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
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
                <figcaption>From Github</figcaption>
            </figure>
            <p>
                <code class="comment inline">In the following lines I'll explain step by step how I created and hosted this page. Implementing security and covering some common vulnerabilities. <br><br> If you have questions go to the <a href="contact.html"><y>Contact</y></a> section to send a question</code>
            </p>
            <p class="code_p">
                <br><h2 class="subtitle">Content:</h2><br>
                <h3><a href="#part_1"><c>Part 1</c></a></h3>
                <h3><a href="#part_2"><c>Part 2</c></a></h3>
            </p>
        </div>
        <address id="part_1""></address>
        <!--Bloque de Contenido 1-->
        <div class="content">
            <h3 class="subtitle">Programs and dependencies</h3><br>
            <div>
                <p class="code_p">
                    <span class="comment"># - Update the system</span>
                    <code><l>sudo apt update</l> && <l>sudo apt upgrade</l></code>
                </p>
                    <h3 class="subtitle">Apache2 Web Server</h3>

                <!--Bloque 1-->

                <p class="code_p">
                    <span class="comment"># Install and test Apache2</span>
                    <code><l>sudo apt install</l> <m>apache2</m> <r>-y</r></code>
                                <span class="comment tab"># Get the hostname</span>
                    <code><l>sudo</l> <v>hostname</v> <r>-I</r></code>
                                <span class="comment tab"># Test it in the web browser -> http://192.168.1.XXX/</span>
                    <span class="comment"># Grant your user the permissions for apache2</span>
                    <code><l>sudo usermod</l> <r>-a -G</r> <v>www-data 'user'</v><br><l>sudo chown</l> <r>-R -f</r> <v>www-data:www-data /var/www/html</v></code>
                                <span class="comment tab"># To apply the changes you need to log out and log in</span>
                    <span class="comment"># Inside the directory /var/www/html you can put all the assets for your web page</span>
                </p>
                    <h3 class="subtitle">PHP for Apache</h3>

                <!--Bloque 2-->

                <p class="code_p">
                    <span class="comment"># Installing dependencies</span>
                    <code><l>sudo apt install</l> <m>php libapache2-mod-php php-mbstring php-mysql php-curl</m> <br><m>php-gd php-zip php-cgi php-json</m> <r>-y</r></code>
                    <span class="comment"># Test if PHP is correctly installed</span>
                    <code><l>sudo nano</l> <v>/var/www/html/example.php</v></code>
                                <span class="comment tab"># Enter this prompt in the file</span>
                    <code><l>&lt;?php</l><br><l>echo</l> <v>"Today's date is "</v><l>.date(</l><v>'Y-m-d H:i:s'</v><l>);<br>?></l></code>
                                <span class="comment tab"># Go to the page http://192.168.1.XXX/example.php</span>
                                <span class="comment tab"># Replace XXX with your local address</span>
                                <span class="comment tab"># It should appear like: 'Today's date is 2019-06-28 21:30:45'</span>
                </p>
                    <h3 class="subtitle">MySQL Database</h3>

                <!--Bloque 3-->

                <p class="code_p">
                    <span class="comment"># Install and set up MySQL</span>
                    <code><l>sudo apt install</l> <m>mariadb-server mariadb-common mariadb-client</m> <r>-y</r></code>
                    <span class="comment"># Make secure your database with a preinstalled shell script</span>
                    <code><l>sudo</l> <v>mariadb_secure_installation</v></code>
                                <span class="comment tab"># Set a password for root user</span>
                                <span class="comment tab"># Mark 'yes' on all the others options</span>
                    <span class="comment"># Set up a new user for the database</span>
                    <code><l>sudo</l> <v>mysql</v> <r>-u</r> <v>root</v> <r>-p</r></code>
                                <span class="comment tab"># Enter the MySQL root password</span>
                    <span class="comment"># Create the user for the database</span>
                    <code>> <l>CREATE USER</l> <v>'username'@'localhost'</v> <l>IDENTIFIED BY</l> <v>'password'</v>;</code>
                                <span class="comment tab"># Replace username and password, keep the ''</span>
                    <span class="comment"># Grant all privileges to the new user</span>
                    <code>> <l>GRANT ALL PRIVILEGES ON</l> <r>* . *</r> <l>TO</l> <v>'username'@'localhost'</v>;<br>> <l>FLUSH PRIVILEGES</l>;</code>
                    <span class="comment"># If you dont want to use the command line to administrate your databases</span>
                    <span class="comment">you can install PHPMyAdmin</span>
                    <span class="comment"># If you want to use your database from PHP you need to install this module</span>
                    <code><l>sudo apt install</l> <m>php-mysql</m> <r>-y</r></code>
                </p>
                    <h3 class="subtitle">PHPMyAdmin</h3>

                <!--Bloque 4-->

                <p class="code_p">
                    <span class="comment"># Installing the package</span>
                    <code><l>sudo apt install</l> <m>phpmyadmin</m> <r>-y</r></code>
                                <span class="comment tab"># In the config screen select 'apache2' option pressing SPACE and ENTER</span>
                                <span class="comment tab"># Select whatever you want on the other options, I recommend 'no'</span>
                                <span class="comment tab"># Set a strong password to connect to MySQL through PHPMyAdmin</span>
                    <span class="comment"># Configure Apache for PHPMyAdmin</span>
                    <code><l>sudo nano</l> <v>/etc/apache2/apache2.conf</v></code>
                    <span class="comment"># Add the following line to the bottom of this file without the ''</span>
                    <code><v>'Include /etc/phpmyadmin/apache.conf'</v></code>
                                <span class="comment tab"># Save and exit the file</span>
                    <span class="comment"># Disable the directory listing for apache2</span>
                    <code><l>sudo</l> <v>a2dismod</v> <r>--force</r> <v>autoindex</v></code>
                    <span class="comment"># Use the page you want adding that</span>
                    <code><l>sudo nano</l> <v>/etc/apache2/sites-enabled/000-default.conf</v></code>
                                <span class="comment tab"># Add before &#60;/VirtualHost&#62; label</span>
                                <code>
                                    &#60;<l>Directory</l> <v>/var/www/html</v>&#62;<br>
                                    <span class="tab"><l>DirectoryIndex</l> <v>'index'.html</v><br></span>
                                    <span class="tab"><l>Options</l> <v>FollowSymLinks</v><br></span>
                                    <span class="tab"><l>AllowOverride</l> <v>None</v><br></span>
                                    <span class="tab"><l>Require</l> <v>all granted</v><br></span>
                                    &#60;<l>/Directory</l>&#62;
                                </code>
                                <span class="comment tab"># Add this if you only want connections to the "PHPMyAdmin" module by the localhost</span>
                                <code>
                                    &#60;<l>Directory</l> <v>"/usr/share/phpmyadmin"</v>&#62;<br>
                                    <span class="tab"><l>order</l> <v>deny,allow</v><br></span>
                                    <span class="tab"><l>deny</l> <v>from all</v><br></span>
                                    <span class="tab"><l>allow</l> <v>from</v> <n>127.0.0.0</n><v>/</v><n>255.0.0.0</n> <n>192.168.0.0</n><v>/</v><n>255.255.0.0</n><br></span>
                                    &#60;<l>/Directory</l>&#62;</code>
                    <span class="comment"># Restart apache2 service</span>
                    <code><l>sudo systemctl</l> <r>restart</r> <v>apache2</v></code>
                </p><br><br><br>
            </div>
        </div>
        <address id="part_2"></address>
        <!--Bloque de Contenido 2-->
        <div class="content" id="cont_3">
            
        </div>
    </div>
</body>
</html>
