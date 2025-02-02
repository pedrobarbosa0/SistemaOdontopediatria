<?php
session_start();
$error_message = "";
if (isset($_SESSION['error'])) {
    $error_message = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Odontopediatria</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if ($error_message): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="login.php" method="post">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>