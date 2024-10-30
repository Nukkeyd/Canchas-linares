<?php
session_start(); // Asegúrate de que las sesiones están activadas

// Conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'cancha_linares';

$conn = new mysqli($host, $user, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    echo "<h2 style='text-align: center;'>Acceso denegado. Por favor, inicia sesión.</h2>";
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Consulta para obtener la información del usuario
$sql = "SELECT username, email FROM usuarios WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
} else {
    echo "No se encontró información del usuario.";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d3f9d8; /* Verde pastel */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            margin: 0 0 20px;
            color: #333;
        }
        p {
            margin: 5px 0;
            color: #555;
        }
        .button {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        .button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Perfil de Usuario</h2>
        <p><strong>Nombre de Usuario:</strong> <?php echo htmlspecialchars($usuario['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
        <button class="button" onclick="window.location.href='index.php'">Volver al Inicio</button>
    </div>
</body>
</html>


