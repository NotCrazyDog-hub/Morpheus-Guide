<?php
require '../../connection.php';
require '../../shield.php';

    if (!empty($_GET['titulo']) and !empty($_GET['conteudo'])) {
        
        $titulo = trim($_GET['titulo']);
        $conteudo = trim($_GET['conteudo']);
        $tempo = date('Y-m-d H:i');
        $id_usuario = $_SESSION['id_usuario'];

        $inserir = $connection->prepare("INSERT INTO diarios (titulo, conteudo, criado_em, Usuario_id) VALUES (:t, :c, :d, :i)");
        $inserir->bindValue(":t", $titulo);
        $inserir->bindValue(":c", $conteudo);
        $inserir->bindValue(":d", $tempo);
        $inserir->bindValue(":i", $id_usuario);
        if ($inserir->execute()) {
            if ($inserir->rowCount() > 0) {
                $id = null;
                $titulo = null;
                $conteudo = null;
                $tempo = null;
                header('Location: index.php');
                exit;
        }  
        else {
            echo "Erro ao tentar efetivar cadastro";
        }
    }
}