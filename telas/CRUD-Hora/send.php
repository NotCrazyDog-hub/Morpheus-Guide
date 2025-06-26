<?php
session_start();
require '../../connection.php';
require '../../shield.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['hora'])) {
        $id_usuario = $_SESSION['id_usuario'];
        $hora = $_POST['hora'];
        $horaAcordar = strtotime("2008-08-21 $hora");
        $horaDormir = date('H:i', $horaAcordar - (8 * 3600));

        $inserir = $connection->prepare("INSERT INTO rotinas (Usuario_id, hora_de_acordar, horario_de_dormir_escolhido) VALUES (:i, :a, :d)");
        $inserir->bindValue(":i", $id_usuario);
        $inserir->bindValue(":a", $hora);
        $inserir->bindValue(":d", $horaDormir);
        if ($inserir->execute()) {
            if ($inserir->rowCount() > 0) {
                header('Location: index.php');
                exit;
        }  
            else {
            $mensagem = "NÃO FOI POSSÍVEL ENVIAR A HORA";
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
    $mensagem = "NÃO FOI PÓSSIVEL CALCULAR A HORA";
    require "form_create.php";
    exit;
}