<?php
$servername = "localhost";
$database = "colegio_raiquen";
$username = "root";
$password = "admin";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Configurar codificación
mysqli_set_charset($conn, "utf8");

// Verificar conexión
if (!$conn) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// echo "Conexión exitosa"; // Solo para pruebas
?>
