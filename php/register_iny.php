<?php

    session_start();

    include_once('../Config/connect.php');

    if (isset($_POST['usernm']) && isset($_POST['passwd']) && isset($_POST['Rpasswd'])) {

        function validar($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $usuario = validar($_POST['usernm']);
        $contrasena = validar($_POST['passwd']);
        $rpass = validar($_POST['Rpasswd']);

        if (empty($usuario) || empty($contrasena) || empty($rpass)) {
            header("location: ../signup.php?error=Por favor, complete todos los campos");
            exit();
        } elseif ($contrasena !== $rpass) {
            header("location: ../signup.php?error=Las contraseñas no coinciden");
            exit();
        } else {
            $cost = 12;
            $contrasena = password_hash($contrasena, PASSWORD_BCRYPT, ['cost' => $cost]);

            $sql = "SELECT * FROM usuarios WHERE NombreUsuario = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                header("location: ../signup.php?error=El usuario ya existe");
                exit();
            } else {
                $sql2 = "INSERT INTO usuarios(NombreUsuario, Clave) VALUES(?, ?)";
                $stmt2 = $conexion->prepare($sql2);
                $stmt2->bind_param("ss", $usuario, $contrasena);
                $stmt2->execute();

                if ($stmt2->affected_rows > 0) {
                    header("location: ../login.php");
                    exit();
                } else {
                    header("location: ../signup.php?error=Error en la creacion del usuario");
                    exit();
                }
            }
        }
    } else {
        header("location: ../signup.php");
        exit();
    }

?>
