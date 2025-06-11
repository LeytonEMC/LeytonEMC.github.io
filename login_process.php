<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!$email || !$password) {
        header("Location: login.php?error=emptyfields");
        exit();
    }

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nombre'];

            // Redirigir a la página principal donde usarás el carrito
            header("Location: index.php");
            exit();
        } else {
            header("Location: login.php?error=wrongpassword");
            exit();
        }
    } else {
        header("Location: login.php?error=nouser");
        exit();
    }
} else {
    // Acceso directo no permitido
    header("Location: login.php");
    exit();
}
?>
