<?php
require '../../connection.php';

    $id = $_GET['id'];
    
    $consulta = $connection->prepare("SELECT * FROM diarios WHERE id = :i");
    $consulta->bindValue(":i", $id);
    $consulta->execute();
    $diario = $consulta->fetch();
    if (!$diario) {
        echo "Não foi encontrado";
    }
    else {
        $atualizar = $connection->prepare("DELETE FROM diarios WHERE id = :i");
        $atualizar->bindValue(":i", $id);
        if ($atualizar->execute()) {
            header('Location: index.php');
            exit;
        }
        else {
            echo "Não foi ó";
        }

    }
?>