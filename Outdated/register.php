<?php

    session_start();

    include_once('../Config/connect.php');
    if (isset($_POST['usernm']) && isset($_POST['passwd']) && isset($_POST['Rpasswd'])) {
        function validar($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }


        $usuario = validar($_POST['usernm']);
        $contraseña = validar($_POST['passwd']);
        $rpass = validar($_POST['Rpasswd']);


        # $datosUser = 'Usuario=' . $usuario . '&contraseña=' . $contraseña;

        if (empty($usuario)) {
            header("location: ../signup.php?error=Introduce un usuario valido");
            exit();
        }elseif(empty($contraseña)) {
            header("location: ../signup.php?error=Introduce una contraseña valida");
            exit();
        }elseif(empty($rpass)) {
            header("location: ../signup.php?error=Debes repetir la contraseña");
            exit();
        }elseif($contraseña !== $rpass) {
            header("location: ../signup.php?error=Las contraseñas no coinciden");
            exit();
        }else {
            $contraseña = password_hash($contraseña, PASSWORD_DEFAULT);

            $sql = "SELECT * FROM usuarios WHERE NombreUsuario = '$usuario'";
            $query = $conexion->query($sql);

            if (mysqli_num_rows($query) > 0) {
                header("location: ../signup.php?error=El usuario ya existe");
                exit();
            }else {
                $sql2 = "INSERT INTO usuarios(NombreUsuario, Clave) VALUES('$usuario','$contraseña')";
                $query2 = $conexion->query($sql2);

                if ($query2) {
                    header("location: ../signup.php?success=Usuario creado con exito");
                    exit();
                }else {
                    header("location: ../signup.php?success=Error en la creacion del usuario");
                    exit();
                }
            }
        }
    }else {
        header("location: ../signup.php");
        exit();
    }

?>