<?php
$servername = "localhost";
$username = "root";
$password = "";  // Dejar vacío si no tienes contraseña en tu MySQL
$dbname = "cancha_linares";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
