<?php

require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) and !empty($_POST['senha'])) {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = trim($_POST['email']);
            $senha = trim($_POST['senha']);
            $senhaSegura = password_hash($senha, PASSWORD_DEFAULT);

            $consulta = $connection->prepare("SELECT * FROM usuarios WHERE email = :e");
            $consulta->bindValue(":e", $email);
            $consulta->execute();

            if ($consulta->rowCount() == 0) {
                $consulta = $connection->prepare("INSERT INTO usuarios (email, senha) VALUES (:e, :s)");
                $consulta->bindValue(":e", $email);
                $consulta->bindValue(":s", $senhaSegura);
                if ($consulta->execute()) {
                    header('Location: index.php');
                    exit;
                }
                else {
                    $mensagem = 'FALHA AO TENTAR INSERIR SEUS DADOS!';
                    require 'create_screen.php';
                    exit;
                }
            }
            else {
                $mensagem = 'ESTE USUÁRIO JÁ EXISTE!';
                require 'create_screen.php';
                exit;
            }
        }
        else {
            $mensagem = 'E-MAIL INVÁLIDO!';
            require 'create_screen.php';
            exit;
        }
    }
    else {
        $mensagem = 'PREENCHA TODOS OS CAMPOS!';
        require 'create_screen.php';
        exit;
    }
}
else {
    $mensagem = 'FALHA AO CRIAR CONTA!';
    require 'create_screen.php';
    exit; 
}