<?php
session_start();
$conn = include('connection.php'); // Ahora $conn será una instancia de PDO

// Obtener datos del formulario de inicio de sesión
$username = $_POST['user'];
$password = $_POST['password'];

try {
    $stmt = $conn->prepare("SELECT u.id_usuario, u.usuario, u.nombre, u.contrasena, r.nombre as rol 
                            FROM usuarios u 
                            INNER JOIN roles r ON u.id_rol = r.id_rol 
                            WHERE u.usuario = :username
                        ");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $password_db = $user['contrasena'];

        if ($password === $password_db) {
            $_SESSION['id'] = $user['id_usuario'];
            $_SESSION['username'] = $user['usuario'];
            $_SESSION['name'] = $user['nombre'];
            $_SESSION['rol'] = $user['rol'];

            echo "success";
        } else {
            echo "Usuario o contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }

} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}

?>
