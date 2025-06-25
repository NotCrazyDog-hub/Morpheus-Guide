<?php
require '../../connection.php';


    if (!empty($_POST['titulo']) and !empty($_POST['conteudo'])) {
        
        $titulo = trim($_POST['titulo']);
        $conteudo = trim($_POST['conteudo']);
        $tempoGeral = date('Y-m-d H:i');
        $id_usuario = $_SESSION['id_usuario'];

        $inserir = $connection->prepare("INSERT INTO diarios (titulo, conteudo, criado_em, Usuario_id) VALUES (:t, :c, :d, :i)");
        $inserir->bindValue(":t", $titulo);
        $inserir->bindValue(":c", $conteudo);
        $inserir->bindValue(":d", $tempoGeral);
        $inserir->bindValue(":i", $id_usuario);
        if ($inserir->execute()) {
            if ($inserir->rowCount() > 0) {
                $id = null;
                $titulo = null;
                $conteudo = null;
                $tempoGeral = null;
                header('Location: index.php');
                exit;
        }  
        else {
            echo "Erro ao tentar efetivar cadastro";
        }
    }
}
else {
    echo 'Você não preencheu os campos'
}