<?php

    session_start();

    include_once('../Config/connect.php');
    if (isset($_POST['usernm']) && isset($_POST['passwd'])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $usuario = validate($_POST['usernm']);
        $clave = validate($_POST['passwd']);

        if (empty($usuario)) {
            header("location: ../login.php?error=Introduce un usuario valido");
            exit();
        }elseif (empty($clave)) {
            header("location: ../login.php?error=Introduce una contraseña valida");
            exit();
        }else {
            # $clave = password_hash($clave, PASSWORD_DEFAULT);

            $sql = "SELECT * FROM usuarios WHERE NombreUsuario = '$usuario'";
            $query = $conexion->query($sql);

            if ($query->num_rows==1) {
                $userquery = $query->fetch_assoc();

                $Id = $userquery['Id'];
                $NombreUsuario = $userquery['NombreUsuario'];
                $Clave = $userquery['Clave'];

                if ($usuario === $NombreUsuario) {
                    if (password_verify($clave, $Clave)) {
                        $_SESSION['Id'] = $Id;
                        $_SESSION['NombreUsuario'] = $NombreUsuario;
                        
                        echo "<script>
                            alert('Bienvenido $NombreUsuario');
                            location.href = '../inicio.php'
                        </script>";
                    }else {
                        header("location: ../login.php?error=Usuario o contraseña incorrectos1");
                        exit();
                    }
                }else {
                    header("location: ../login.php?error=Usuario o contraseña incorrectos2");
                    exit();
                }
            }else {
                header("location: ../login.php?error=Usuario o contraseña incorrectos3");
                exit();
            }
        }
    }

?>