<?php
session_start();

// Conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'cancha_linares';

$conn = new mysqli($host, $user, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$reservaExitosa = false;

// Procesar la reserva
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['usuario_id'])) {
        echo "<h3 style='color: red; text-align: center;'>Por favor, inicia sesión para hacer una reserva.</h3>";
        exit;
    }

    $usuario_id = $_SESSION['usuario_id'];
    $cancha_id = $_POST['cancha_id'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $sql = "INSERT INTO reservas (usuario_id, cancha_id, fecha, hora) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $usuario_id, $cancha_id, $fecha, $hora);

    if ($stmt->execute()) {
        $reservaExitosa = true;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Cancha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d3f9d8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .form-container h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input[type="date"], input[type="time"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: green;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: darkgreen;
        }
        /* Estilo de anuncio */
        .anuncio {
            display: none;
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
    </style>
</head>
<body>
    <?php if ($reservaExitosa): ?>
        <div class="anuncio" id="anuncio">Reserva guardada con éxito</div>
        <script>
            // Mostrar el anuncio por unos segundos y luego redirigir
            document.getElementById('anuncio').style.display = 'block';
            setTimeout(function() {
                document.getElementById('anuncio').style.display = 'none';
                window.location.href = 'index.php'; // Cambia al HTML correspondiente si es necesario
            }, 3000); // 3 segundos de duración
        </script>
    <?php endif; ?>
    
    <div class="form-container">
        <h2>Reservar Cancha</h2>
        <form method="POST" action="reservar.php">
            <input type="hidden" name="cancha_id" value="1">
            
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" required>

            <label for="hora">Hora:</label>
            <input type="time" name="hora" required>

            <button type="submit">Reservar</button>
        </form>
    </div>
</body>
</html>


