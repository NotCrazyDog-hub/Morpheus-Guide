<?php
require '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['titulo']) and !empty($_POST['conteudo'])) {
        $id = $_POST['id'];
        $titulo = trim($_POST['titulo']);
        $conteudo = trim($_POST['conteudo']);
    
        $consulta = $connection->prepare("SELECT * FROM diarios WHERE id = :i");
        $consulta->bindValue(":i", $id);
        $consulta->execute();
        $diario = $consulta->fetch();
        if (!$diario) {
            $mensagem = "DIÁRIO NÃO ENCONTRADO";
            require "form_update.php";
            exit;
        }
        else {
            $atualizar = $connection->prepare("UPDATE diarios SET titulo = :t, conteudo = :c WHERE id = :i");
            $atualizar->bindValue(":t", $titulo);
            $atualizar->bindValue(":c", $conteudo);
            $atualizar->bindValue(":i", $id);
            if ($atualizar->execute()) {
                header('Location: index.php');
                exit;
            }
            else {
                $mensagem = "TENTE NOVAMENTE";
                require "form_update.php";
                exit;
            }
    
        }
    }
    else {
        $mensagem = "VOCÊ NÃO PREENCHEU TODOS OS CAMPOS";
        require "form_update.php";
        exit;
    }
}
else {
    $mensagem = "FALHA AO ATUALIZAR DIÁRIO";
    require "form_update.php";
    exit;
}
?>