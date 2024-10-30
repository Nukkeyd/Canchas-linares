<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    echo "<h2>Por favor, inicia sesión para ver tus reservas.</h2>";
    exit;
}

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'cancha_linares';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$usuario_id = $_SESSION['usuario_id'];
echo "<p>Usuario ID: $usuario_id</p>"; // Depuración

$sql = "
    SELECT r.fecha, r.hora, c.nombre AS cancha_nombre, c.precio 
    FROM reservas r
    JOIN canchas c ON r.cancha_id = c.id
    WHERE r.usuario_id = ?
";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h2>Tus Reservas</h2>";
    echo "<table border='1' style='width: 80%; margin: auto; text-align: center;'>";
    echo "<tr><th>Cancha</th><th>Fecha</th><th>Hora</th><th>Precio</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['cancha_nombre'] . "</td>
                <td>" . $row['fecha'] . "</td>
                <td>" . $row['hora'] . "</td>
                <td>$" . $row['precio'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<h2>No tienes reservas registradas.</h2>";
}

$stmt->close();
$conn->close();
?>


