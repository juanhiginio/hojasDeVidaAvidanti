<?php
session_start();

$conn = include('./connection.php'); 

if (!$conn) {
    die(json_encode(['status' => 'error', 'message' => 'Error en la conexión a la base de datos.']));
}

$user = $_POST['user'] ?? null;
$name = $_POST['name'] ?? null;
$password = $_POST['password'] ?? null;
$rolSeleccionado = $_POST['rolSeleccionado'] ?? null;

if (empty($user) || empty($name) || empty($password) || empty($rolSeleccionado)) {
    echo json_encode(['status' => 'error', 'message' => 'Faltan datos obligatorios.']);
    exit;
}

$rolSeleccionadoId = ($rolSeleccionado === 'Administrador') ? 1 : (($rolSeleccionado === 'Editor') ? 2 : 0);

if ($rolSeleccionadoId === 0) {
    echo json_encode(['status' => 'error', 'message' => 'Rol seleccionado inválido.']);
    exit;
}

$passwordHashed = password_hash($password, PASSWORD_BCRYPT);

try {

    $stmt = $conn->prepare("SELECT  u.usuario 
                            FROM usuarios u 
                            WHERE u.usuario = :username
                        ");
    $stmt->bindParam(':username', $user);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo json_encode(['status' => 'duplicado', 'message' => 'El usuario ya existe en los registros']);
        exit;
    }

    $sql = "INSERT INTO usuarios (nombre, usuario, contrasena, id_rol) VALUES (:nombre, :usuario, :contrasena, :id_rol)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":nombre", $name);
    $stmt->bindParam(":usuario", $user);
    $stmt->bindParam(":contrasena", $passwordHashed);
    $stmt->bindParam(":id_rol", $rolSeleccionadoId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $response = ['status' => 'success', 'message' => 'Usuario agregado exitosamente.'];
    } else {
        $response = ['status' => 'error', 'message' => 'No se pudo agregar el usuario.'];
    }

    header('Content-Type: application/json');
    echo json_encode($response);

} catch (PDOException $err) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Error al insertar el usuario: ' . $err->getMessage()]);
}
