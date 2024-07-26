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
    <title>Avaliação - Sistema de Odontopediatria</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="evaluation-container">
        <h1>Avaliação de Emoções</h1>
        <?php if ($success_message): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <?php if ($error_message): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <a href="dashboard.php" class="back-button">Voltar para a Dashboard</a>
        <form action="salvar_avaliacao.php" method="post">
            <label for="child-id">Selecione a Criança:</label>
            <select id="child-id" name="child-id" required>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option>
                <?php endwhile; ?>
            </select>
            <div class="image-pair">
                <label>Escolha a imagem que melhor representa como você se sente:</label>
                <div class="images">
                    <input type="radio" id="image1" name="emotion" value="feliz" required>
                    <label for="image1"><img src="img/crianca_sorrindo.png" alt="Criança Sorrindo"></label>
                    <input type="radio" id="image2" name="emotion" value="triste" required>
                    <label for="image2"><img src="img/crianca_chorando.png" alt="Criança Chorando"></label>
                </div>
            </div>
            <!-- Repetir o bloco acima para os outros pares de imagens -->
            <button type="submit">Enviar Avaliação</button>
        </form>
    </div>
</body>
</html>