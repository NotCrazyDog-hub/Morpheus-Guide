<?php
require '../../connection.php';

if (!empty($_POST['titulo']) and !empty($_POST['conteudo'])) {
    $titulo = trim($_POST['titulo']);
    $conteudo = trim($_POST['conteudo']);
    $tempoGeral = date('Y-m-d H:i:s');
    $id = $_POST['id'];

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
        $atualizar->bindValue(":r", $tempoGeral);
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