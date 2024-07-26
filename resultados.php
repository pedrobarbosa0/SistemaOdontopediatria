<?php
session_start();
include('config.php');

// Obter a lista de avaliações do banco de dados
$result = $conn->query("
    SELECT a.id, a.emocao, a.data, c.nome, c.avatar 
    FROM avaliacao a 
    JOIN criancas c ON a.crianca_id = c.id
");

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Avaliações - Sistema de Odontopediatria</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="results-container">
        <h1>Histórico de Avaliações</h1>
        <a href="dashboard.php" class="back-button">Voltar para a Dashboard</a>
        <table>
            <thead>
                <tr>
                    <th>Nome da Criança</th>
                    <th>Avatar</th>
                    <th>Emoção</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['nome']; ?></td>
                        <td>
                            <?php if ($row['avatar']): ?>
                                <?php
                                $avatarData = json_decode($row['avatar'], true);
                                echo '<img src="data:image/svg+xml;base64,' . base64_encode(createAvatar($avatarData)) . '" alt="Avatar" width="50" height="50">';
                                ?>
                            <?php else: ?>
                                Sem Avatar
                            <?php endif; ?>
                        </td>
                        <td><?php echo $row['emocao']; ?></td>
                        <td><?php echo $row['data']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
function createAvatar($avatarData) {
    $skinColor = $avatarData['skinColor'];
    $eyeColor = $avatarData['eyeColor'];
    $hairColor = $avatarData['hairColor'];

    $avatar = '<svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <circle cx="50" cy="50" r="50" fill="#' . $skinColor . '"/>
        <circle cx="35" cy="40" r="5" fill="#' . $eyeColor . '"/>
        <circle cx="65" cy="40" r="5" fill="#' . $eyeColor . '"/>
        <rect x="30" y="70" width="40" height="10" fill="#' . $hairColor . '"/>
    </svg>';

    return $avatar;
}
?>