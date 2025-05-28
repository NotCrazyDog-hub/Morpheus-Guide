<?php
session_start();
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) and !empty($_POST['senha'])) {

        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);

        $consulta = $connection->prepare('SELECT * FROM login WHERE email = :e');
        $consulta-> bindValue(':e', $email);
        $consulta->execute();
        $usuario = $consulta->fetch();

        if ($usuario and $senha === $usuario['senha']) {
            $_SESSION['email'] = $usuario['email'];
            header('Location: loggedin.php');
            exit;
        }
        else {
            echo '<h1>Usuário ou senha incorretos!</h1>';
        }
    }
    else {
        echo '<h1>Preencha todos os campos!</h1>';
    }
}
else {
    header('Location: index.php');
    exit;
}
