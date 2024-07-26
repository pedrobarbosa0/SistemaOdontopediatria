<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Odontopediatria</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Bem-vindo ao Sistema de Odontopediatria</h1>
        <nav>
            <ul>
                <li><a href="cadastro_crianca.php">Cadastro de Criança</a></li>
                <li><a href="cadastro_odontopediatra.php">Cadastro de Odontopediatra</a></li>
                <li><a href="criacao_avatar.php">Criação de Avatar</a></li>
                <li><a href="avaliacao.php">Avaliação</a></li>
                <li><a href="resultados.php">Histórico de Avaliações</a></li> <!-- Novo botão -->
            </ul>
        </nav>
    </div>
</body>
</html>