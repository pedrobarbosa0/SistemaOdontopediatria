<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Criança - Sistema de Odontopediatria</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h1>Cadastro de Criança</h1>
        <a href="dashboard.php" class="back-button">Voltar para a Dashboard</a>
        <form action="cadastro_crianca.php" method="post">
            <label for="child-name">Nome da Criança:</label>
            <input type="text" id="child-name" name="child-name" required>
            <label for="child-age">Idade:</label>
            <input type="number" id="child-age" name="child-age" required>
            <label for="child-gender">Gênero:</label>
            <select id="child-gender" name="child-gender" required>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
            </select>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>

<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['child-name'];
    $idade = $_POST['child-age'];
    $genero = $_POST['child-gender'];

    $stmt = $conn->prepare("INSERT INTO criancas (nome, idade, genero) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $nome, $idade, $genero);

    if ($stmt->execute()) {
        echo "Criança cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar criança: " . $stmt->error;
    }

    $stmt->close();
}
?>