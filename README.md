Proyecto Cancha Linares
Descripción
Cancha Linares es una aplicación web para gestionar y reservar canchas deportivas. Permite a los usuarios registrarse, iniciar sesión, ver las canchas disponibles y hacer reservas.

Estructura del Proyecto:
db_connection.php: Conexión a la base de datos.
index.php: Página principal.
login.php: Página de inicio de sesión.
login_process.php: Procesa el inicio de sesión.
misreservas.php: Ver reservas del usuario.
register.php: Registro de nuevos usuarios.
reservar.php: Página para realizar una reserva.
usuario.php: Gestión de la información del usuario.
reserva1.html, reserva2.html, reserva3.html: Páginas de reserva.
script.js: Funcionalidades JavaScript.
styles.css: Estilos CSS.
Imágenes: imagen1.jpeg, imagen2.jpeg, imagen3.jpeg, imagen4.jpeg, imagen5.jpeg, imagen6.jpeg.

Instalación
Clonar el repositorio:
git clone https://github.com/tu_usuario/cancha_linares.git
cd cancha_linares

Configurar la base de datos:
Importar el archivo cancha_linares.sql en MySQL:
mysql -u tu_usuario -p tu_base_de_datos < cancha_linares.sql

Configurar la conexión:
Editar db_connection.php con las credenciales de la base de datos:
<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "cancha_linares";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
Iniciar el servidor:
Iniciar el servidor web (por ejemplo, Apache) y colocar la carpeta del proyecto en el directorio raíz del servidor (por ejemplo, /var/www/html).

Acceder a la aplicación:
Abrir el navegador y visitar http://localhost/cancha_linares.

Uso:
Registro:
Los nuevos usuarios se registran en register.php.

Iniciar sesión:
Los usuarios registrados inician sesión en login.php.

Reservar canchas:
Ver las canchas disponibles y reservar en reserva1.html, reserva2.html, o reserva3.html.

Gestionar reservas:
Ver y gestionar las reservas en misreservas.php.
