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

// Procesar el inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Asegúrate de que los nombres de columna son correctos
    $sql = "SELECT id FROM usuarios WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $contraseña);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // El usuario existe
        $row = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $row['id']; // Guarda el ID del usuario en la sesión

        // Redirige al usuario a index.php
        header("Location: index.php");
        exit;
    } else {
        // Usuario no encontrado o contraseña incorrecta
        echo "<h2 style='text-align: center;'>Usuario o contraseña incorrectos</h2>";
    }
}

$conn->close();
?>

<!-- Formulario de inicio de sesión -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d3f9d8; /* Verde pastel */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px; /* Más cuadrado */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px; /* Ancho fijo */
        }
        input[type="text"], input[type="password"] {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: green;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            border-radius: 4px;
        }
        .register-link {
            text-align: center;
            margin-top: 10px;
        }
        .register-link p {
            font-size: 14px; /* Texto más pequeño */
        }
        .register-link a {
            color: green; /* Enlace en verde */
            text-decoration: none;
        }
    </style>
</head>
<body>
    <form method="POST" action="login.php">
        <h2 style="text-align: center;">Iniciar Sesión</h2>
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <input type="submit" value="Iniciar Sesión">
        <div class="register-link">
            <p>¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
        </div>
    </form>
</body>
</html>



