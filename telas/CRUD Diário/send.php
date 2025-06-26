<?php
session_start();
require '../../connection.php';
require '../../shield.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['titulo']) and !empty($_POST['conteudo'])) {
        $id_usuario = $_SESSION['id_usuario'];
        $titulo = trim($_POST['titulo']);
        $criado_em = date('Y-m-d H:i');
        $conteudo = trim($_POST['conteudo']);

        $inserir = $connection->prepare("INSERT INTO diarios (Usuario_id, titulo, criado_em, conteudo) VALUES (:i, :t, :r, :c)");
        $inserir->bindValue(":i", $id_usuario);
        $inserir->bindValue(":t", $titulo);
        $inserir->bindValue(":r", $criado_em);
        $inserir->bindValue(":c", $conteudo);
        if ($inserir->execute()) {
            if ($inserir->rowCount() > 0) {
                header('Location: index.php');
                exit;
        }  
            else {
            header('Location: index.php');
            $mensagem = "ALGO DEU ERRADO";
            require "form_create.php";
            exit;
            }
        }
    }
    else {
        $mensagem = "PREENCHA TODOS OS CAMPOS";
        require "form_create.php";
        exit;
    }
}
else {
    $mensagem = "FALHA AO TENTAR ESCREVER DIÁRIO";
    require "form_create.php";
    exit;
}