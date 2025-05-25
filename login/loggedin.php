<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loggedin</title>
</head>
<body>
    <h1>Logado com sucesso! Seja bem-vindo</h1>
    <a href="logout.php">Sair</a>
</body>
</html>