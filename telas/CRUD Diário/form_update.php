<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESCREVER DIÁRIO</title>
    <link rel="stylesheet" href="styleForUC.css">
</head>
<body>
<div id="caixa-branca">
        <h2 id="intro">COMO FOI SEU DIA?</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>";>
            <p id="pergunta">
            <?php
                if (isset($mensagem)) {
                    if (!empty($mensagem)) {
                        echo $mensagem;
                    }
                }
                ?>
            </p>
            <br>
            <input type="text" name="titulo" id="titulo" value="<?php echo $_POST['titulo']; ?>">
            <br>
            <textarea name="conteudo" id="conteudo" placeholder="RELATE AQUI"><?php echo $_POST['conteudo'];?></textarea>
            <br>
            <input type="submit" value="ESCREVER">
        </form>
        <a id="voltar" href="index.php">VOLTAR</a>
    </div>
</body>
</html>