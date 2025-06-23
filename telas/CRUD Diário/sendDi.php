<?php

require '../../connection.php';

    if (!empty($_GET['titulo']) and !empty($_GET['conteudo'])) {
        
        $titulo = trim($_GET['titulo']);
        $conteudo = trim($_GET['conteudo']);
        $tempo = date('Y-m-d H:i:s');

        $inserir = $connection->prepare("INSERT INTO diarios (titulo, conteudo, criado_em) VALUES (:t, :c, :d)");
        $inserir->bindValue(":t", $titulo);
        $inserir->bindValue(":c", $conteudo);
        $inserir->bindValue(":d", $tempo);
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