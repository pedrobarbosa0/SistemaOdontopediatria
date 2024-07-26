<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emocao = $_POST['emotion'];
    $criancaId = $_POST['child-id']; // Obter o ID da criança selecionada

    $stmt = $conn->prepare("INSERT INTO avaliacao (crianca_id, emocao) VALUES (?, ?)");
    $stmt->bind_param("is", $criancaId, $emocao);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Avaliação salva com sucesso!";
    } else {
        $_SESSION['error'] = "Erro ao salvar avaliação: " . $stmt->error;
    }

    $stmt->close();
    header("Location: avaliacao.php");
    exit();
}
?>