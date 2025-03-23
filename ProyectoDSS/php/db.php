<?php
$host = "localhost";
$user = "root"; // Cambia esto si usas otro usuario
$pass = ""; // Agrega tu contraseña si la tienes
$dbname = "notehive";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
