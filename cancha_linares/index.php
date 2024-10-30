<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canchas Fútbol Linares</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #cce8d9; /* Fondo verde pastel */
            margin: 0;
            padding: 0;
            color: black;
        }

        /* Cabecera */
        .navbar {
            background-color: black;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 18px;
        }

        .navbar a:hover {
            background-color: green;
            color: white;
        }

        /* Carrusel de imágenes */
        .carousel {
            width: 80%;
            margin: 20px auto;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            height: 400px; /* Ajuste de altura para que no ocupe tanto espacio */
        }

        .carousel img {
            width: 100%;
            height: auto; /* Mantiene la proporción original */
            object-fit: cover; /* Asegura que la imagen cubra todo el área sin distorsionarse */
            position: absolute; /* Asegura que las imágenes se superpongan */
            top: 0;
            left: 0;
            transition: opacity 1s ease-in-out;
            opacity: 0;
        }

        .carousel img.active {
            opacity: 1; /* Solo muestra la imagen activa */
        }

        /* Sección de imágenes */
        .imagenes {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }

        .imagen-contenedor {
            text-align: center;
            background-color: white;
            padding: 10px;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .imagen-contenedor img {
            width: 100%;
            height: 150px; /* Ajuste de altura para las imágenes de las canchas */
            border-radius: 8px;
            object-fit: cover;
        }

        .descripcion {
            font-size: 18px;
            margin: 10px 0;
            color: black;
        }

        /* Botón verde */
        .button {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }

        .button:hover {
            background-color: darkgreen;
        }

        /* Pie de página */
        .footer {
            text-align: center;
            background-color: white;
            color: black;
            padding: 10px;
            font-size: 14px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

    <!-- Cabecera de navegación -->
    <div class="navbar">
        <div class="menu">
            <a href="#">Inicio</a>
            <a href="misreservas.php">Mis Reservas</a> <!-- Aquí se agrega el enlace a mis reservas -->
        </div>
        <div class="usuario">
        <a href="usuario.php">Usuario</a>
        </div>
    </div>

    <!-- Carrusel de imágenes -->
    <div class="carousel">
        <img src="imagen1.jpeg" alt="Imagen 1" class="active">
        <img src="imagen2.jpeg" alt="Imagen 2">
        <img src="imagen3.jpeg" alt="Imagen 3">
    </div>

    <!-- Sección de tres imágenes con botones debajo -->
    <div class="imagenes">
        <div class="imagen-contenedor">
            <img src="imagen4.jpeg" alt="Imagen 1">
            <div class="descripcion">Cancha Número 1 - Pasto Sintético</div>
            <a href="reserva1.html" class="button">Ver más</a>
        </div>
        <div class="imagen-contenedor">
            <img src="imagen5.jpeg" alt="Imagen 2">
            <div class="descripcion">Cancha Número 2 - Pasto Natural</div>
            <a href="reserva2.html" class="button">Ver más</a>
        </div>
        <div class="imagen-contenedor">
            <img src="imagen6.jpeg" alt="Imagen 3">
            <div class="descripcion">Cancha Número 3 - Césped Artificial</div>
            <a href="reserva3.html" class="button">Ver más</a>
        </div>
    </div>

    <!-- Pie de página con derechos reservados -->
    <div class="footer">
        © 2024 Canchas Fútbol Linares. Todos los derechos reservados.
    </div>

    <!-- Script para el carrusel automático -->
    <script>
        let carouselImages = document.querySelectorAll('.carousel img');
        let currentIndex = 0;

        function showNextImage() {
            carouselImages[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % carouselImages.length;
            carouselImages[currentIndex].classList.add('active');
        }

        setInterval(showNextImage, 3000); // Cambia de imagen cada 3 segundos
    </script>
</body>
</html>










