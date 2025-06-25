<?php
require '../../shield.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESCREVER DIÁRIO</title>
    <link rel="stylesheet" href="styleuc.css">
</head>
<body>
    <div id="caixa-branca">
        <h2 id="intro">COMO FOI SEU DIA?</h2>
        <form action="sendDi.php" method="post">
            <input type="hidden" name="id">
            <label id="pergunta" for="titulo">
                QUAL O NOME DESSE DIA?
            </label>
            <br>
            <input type="text" name="titulo" id="titulo" placeholder="NOMEIE AQUI">
            <br>
            <textarea name="conteudo" id="conteudo" placeholder="RELATE AQUI"></textarea>
            <br>
            <input type="submit" value="ESCREVER">
        </form>
        <a id="voltar" href="index.php">VOLTAR</a>
    </div>
</body>
</html>