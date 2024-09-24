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
        } elseif (empty($clave)) {
            header("location: ../login.php?error=Introduce una contraseña valida");
            exit();
        } else {
            $sql = "SELECT * FROM usuarios WHERE NombreUsuario = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $userquery = $result->fetch_assoc();
                $Id = $userquery['Id'];
                $NombreUsuario = $userquery['NombreUsuario'];
                $Clave = $userquery['Clave'];

                if ($usuario === $NombreUsuario) {
                    if (password_verify($clave, $Clave)) {
                        $_SESSION['Id'] = $Id;
                        $_SESSION['NombreUsuario'] = $NombreUsuario;

                        #     ^ ^
                        #    (O,O)
                        #    (   )
                        #    -"-"--

                        echo "<script>
                                location.href = '../Content_in/inicio.php'
                            </script>";
                    } else {
                        header("location: ../login.php?error=Usuario o contrasena incorrectos");
                        exit();
                    }
                } else {
                    header("location: ../login.php?error=Usuario o contrasena incorrectos");
                    exit();
                }
            } else {
                header("location: ../login.php?error=Usuario o contrasena incorrectos");
                exit();
            }
        }
    }
?>