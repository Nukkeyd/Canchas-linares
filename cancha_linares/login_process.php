<?php
include 'db_connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Consulta de usuario
$sql = "SELECT * FROM usuarios WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        echo "Inicio de sesión exitoso";
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}

$conn->close();
?>
