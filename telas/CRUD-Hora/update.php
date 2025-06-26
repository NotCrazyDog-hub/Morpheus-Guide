<?php
require '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['hora'])) {
        $id = $_POST['id'];
        $hora = $_POST['hora'];
        $horaAcordar = strtotime("2008-08-21 $hora");
        $horaDormir = date('H:i', $horaAcordar - (8 * 3600));
    
        $consulta = $connection->prepare("SELECT * FROM rotinas WHERE id = :i");
        $consulta->bindValue(":i", $id);
        $consulta->execute();
        $rotinas = $consulta->fetch();
        if (!$rotinas) {
            $mensagem = "ROTINA NÃO ENCONTRADA";
            require "form_update.php";
            exit;
        }
        else {
            $atualizar = $connection->prepare("UPDATE rotinas SET hora_de_acordar = :a, horario_de_dormir_escolhido = :d WHERE id = :i");
            $atualizar->bindValue(":a", $hora);
            $atualizar->bindValue(":d", $horaDormir);
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
    $mensagem = "FALHA AO ATUALIZAR SEU HORÁRIO";
    require "form_update.php";
    exit;
}
?>