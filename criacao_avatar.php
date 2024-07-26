<?php
session_start();
include('config.php');

// Obter a lista de crianças do banco de dados
$result = $conn->query("SELECT id, nome FROM criancas");

$success_message = "";
$error_message = "";
if (isset($_SESSION['success'])) {
    $success_message = $_SESSION['success'];
    unset($_SESSION['success']);
}
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
    <title>Criação de Avatar - Sistema de Odontopediatria</title>
    <link rel="stylesheet" href="styles.css">
    <script type="module" src="dist/bundle.js" defer></script>
</head>
<body>
    <div class="avatar-container">
        <h1>Criação de Avatar</h1>
        <?php if ($success_message): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <?php if ($error_message): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <a href="dashboard.php" class="back-button">Voltar para a Dashboard</a>
        <form id="avatar-form" action="salvar_avatar.php" method="post">
            <label for="child-id">Selecione a Criança:</label>
            <select id="child-id" name="child-id" required>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option>
                <?php endwhile; ?>
            </select>
            <label for="skin-color">Cor da Pele:</label>
            <input type="color" id="skin-color" name="skin-color" value="#f5c6a5" required>
            <label for="eye-color">Cor dos Olhos:</label>
            <input type="color" id="eye-color" name="eye-color" value="#000000" required>
            <label for="hair-color">Cor do Cabelo:</label>
            <input type="color" id="hair-color" name="hair-color" value="#000000" required>
            <input type="hidden" id="avatar-data" name="avatar-data">
            <button type="button" id="generate-avatar">Gerar Avatar</button>
            <button type="submit">Salvar Avatar</button>
        </form>
        <div id="avatar-preview"></div>
    </div>
</body>
</html>