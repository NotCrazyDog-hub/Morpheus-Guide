<?php
session_start();
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) and !empty($_POST['senha'])) {

        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);

        $consulta = $connection->prepare('SELECT * FROM usuarios WHERE email = :e');
        $consulta-> bindValue(':e', $email);
        $consulta->execute();
        $usuario = $consulta->fetch();

        if ($usuario and password_verify($senha, $usuario['senha'])) {
            $_SESSION['email'] = $usuario['email'];
            header('Location: telas/loggedin.php');
            exit;
        }
        else {
            $mensagem = 'USUÁRIO OU SENHA INCORRETOS!';
            require 'index.php';
            exit;
        }
    }
    else {
        $mensagem = 'PREENCHA TODOS OS CAMPOS!';
        require 'index.php';
        exit;
    }
}
else {
    $mensagem = 'FALHA AO LOGAR';
    require 'index.php';
    exit;
}