<?php
require '../../connection.php';

    $id = $_POST['id'];
    
    $consulta = $connection->prepare("SELECT * FROM rotinas WHERE id = :i");
    $consulta->bindValue(":i", $id);
    $consulta->execute();
    $diario = $consulta->fetch();
    if ($diario) {
        $atualizar = $connection->prepare("DELETE FROM rotinas WHERE id = :i");
        $atualizar->bindValue(":i", $id);
        if ($atualizar->execute()) {
            header('Location: index.php');
            exit;
        }
        else {
            echo "FALHA AO DELETAR DIÁRIO";
        }
    }
    else {
        echo "ROTINA NÃO ENCONTRADA";
    }
?>