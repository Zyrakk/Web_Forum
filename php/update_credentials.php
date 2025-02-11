<?php
session_start();

include_once('../Config/connect.php');

if (!isset($_SESSION['Id'])) {
    echo json_encode(["success" => false, "detail" => "No has iniciado sesión"]);
    exit();
}

$userId = $_SESSION['Id'];
$data = json_decode(file_get_contents("php://input"), true);

if (!$data || (!isset($data['username']) && !isset($data['password']))) {
    echo json_encode(["success" => false, "detail" => "Datos inválidos"]);
    exit();
}

$response = [];

if (isset($data['username']) && !empty($data['username'])) {
    $username = trim($data['username']);

    $sql = "SELECT * FROM usuarios WHERE NombreUsuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["success" => false, "detail" => "El usuario ya existe"]);
        exit();
    }

    $sql = "UPDATE usuarios SET NombreUsuario = ? WHERE Id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("si", $username, $userId);
    if ($stmt->execute()) {
        $_SESSION['NombreUsuario'] = $username;
        $response['username'] = "Usuario actualizado correctamente";
    }
}

if (isset($data['password']) && !empty($data['password'])) {
    $password = password_hash(trim($data['password']), PASSWORD_BCRYPT, ['cost' => 12]);

    $sql = "UPDATE usuarios SET Clave = ? WHERE Id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("si", $password, $userId);
    if ($stmt->execute()) {
        $response['password'] = "Contraseña actualizada correctamente";
    }
}

if (!empty($response)) {
    echo json_encode(["success" => true, "detail" => $response]);
} else {
    echo json_encode(["success" => false, "detail" => "No se realizaron cambios"]);
}

exit();
?>
