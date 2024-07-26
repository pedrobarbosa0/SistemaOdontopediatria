<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['dentist-name'];
    $crm = $_POST['dentist-crm'];
    $especialidade = $_POST['dentist-specialty'];

    $senha = $crm; // Usando CRM como senha inicial

    $stmt = $conn->prepare("INSERT INTO usuarios (username, password, tipo) VALUES (?, ?, 'odontopediatra')");
    $stmt->bind_param("ss", $nome, $senha);

    if ($stmt->execute()) {
        echo "Odontopediatra cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar odontopediatra: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Odontopediatra - Sistema de Odontopediatria</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h1>Cadastro de Odontopediatra</h1>
        <a href="dashboard.php" class="back-button">Voltar para a Dashboard</a>
        <form action="cadastro_odontopediatra.php" method="post">
            <label for="dentist-name">Nome do Odontopediatra:</label>
            <input type="text" id="dentist-name" name="dentist-name" required>
            <label for="dentist-crm">CRM:</label>
            <input type="text" id="dentist-crm" name="dentist-crm" required>
            <label for="dentist-specialty">Especialidade:</label>
            <input type="text" id="dentist-specialty" name="dentist-specialty" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>