<?php
// Configuración de la base de datos
$host = 'localhost';  // Host
$dbname = 'calculadora';  // Nombre de la base de datos
$username = 'root';  // Usuario de la base de datos
$password = '';  // Contraseña

// Crear conexión
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurar el modo de error de PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error al conectar con la base de datos: " . $e->getMessage();
    die();
}
?>
