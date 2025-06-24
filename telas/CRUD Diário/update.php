<?php
require '../../connection.php';

if (!empty($_GET['titulo']) and !empty($_GET['conteudo'])) {
    $titulo = trim($_GET['titulo']);
    $conteudo = trim($_GET['conteudo']);
    $tempo = date('Y-m-d H:i:s');
    $id = $_GET['id'];

    $consulta = $connection->prepare("SELECT * FROM diarios WHERE id = :i");
    $consulta->bindValue(":i", $id);
    $consulta->execute();
    $diario = $consulta->fetch();
    if (!$diario) {
        echo "Não foi encontrado";
    }
    else {
        $atualizar = $connection->prepare("UPDATE diarios SET titulo = :t, conteudo = :c, criado_em = :r WHERE id = :i");
        $atualizar->bindValue(":t", $titulo);
        $atualizar->bindValue(":c", $conteudo);
        $atualizar->bindValue(":r", $tempo);
        $atualizar->bindValue(":i", $id);
        if ($atualizar->execute()) {
            header('Location: index.php');
            exit;
        }
        else {
            echo "Não foi ó";
        }

    }
}
?>