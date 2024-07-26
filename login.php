<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, tipo FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $stored_password, $tipo);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && $password === $stored_password) {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_type'] = $tipo;
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = "Usuário ou senha incorretos.";
        header("Location: index.php");
        exit();
    }
    $stmt->close();
}
?>