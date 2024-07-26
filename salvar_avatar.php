<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $avatarData = $_POST['avatar-data'];
    $criancaId = $_POST['child-id']; // Obter o ID da criança selecionada

    $stmt = $conn->prepare("UPDATE criancas SET avatar = ? WHERE id = ?");
    $stmt->bind_param("si", $avatarData, $criancaId);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Avatar salvo com sucesso!";
    } else {
        $_SESSION['error'] = "Erro ao salvar avatar: " . $stmt->error;
    }

    $stmt->close();
    header("Location: criacao_avatar.php");
    exit();
}
?>