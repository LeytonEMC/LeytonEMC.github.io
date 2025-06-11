<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica si ya existe el email
    $sql = "SELECT id FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Email ya registrado, redirige con error
        header("Location: login.php?error=emailregistered");
        exit();
    }

    // Si no existe, registra
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (nombre, email, password_hash) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $email, $password_hash);

    if ($stmt->execute()) {
        // Registro exitoso, redirige con éxito
        header("Location: login.php?register=success");
        exit();
    } else {
        // Error en registro
        header("Location: login.php?error=registerfail");
        exit();
    }
} else {
    // Acceso directo no permitido
    header("Location: login.php");
    exit();
}
?>
