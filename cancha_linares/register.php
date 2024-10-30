<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    $conn = new mysqli("localhost", "root", "", "cancha_linares");

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    
    // Insertar en la base de datos (asegúrate de usar consultas preparadas en producción)
    $sql = "INSERT INTO usuarios (username, password, email, telefono) VALUES ('$username', '$password', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        // Redirigir a index.php si el registro fue exitoso
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Registro</title>
</head>
<body>
    <div class="container">
        <div class="register-box">
            <h2>Regístrate</h2>
            <form method="POST">
                <div class="textbox">
                    <input type="text" name="username" placeholder="Nombre de Usuario" required>
                </div>
                <div class="textbox">
                    <input type="email" name="email" placeholder="Correo Electrónico" required>
                </div>
                <div class="textbox">
                    <input type="tel" name="phone" placeholder="Teléfono" required>
                </div>
                <div class="textbox">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <div class="textbox">
                    <input type="password" name="confirm_password" placeholder="Confirmar Contraseña" required>
                </div>
                <button class="btn" type="submit">Registrarse</button>
                <div class="login">
                    <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
