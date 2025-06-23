<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="espaco-em-branco">
        <img src="assets/aCloud.png" alt="Logo da Morpheus Guide">
    </div>
    <div id="caixa-de-login">
        <h1>DURMA BEM, ACORDE MELHOR!</h1>
        <form action="send.php" method="POST">
            <p id="mensagem"> 
                <?php
                if (isset($mensagem)) {
                    if (!empty($mensagem)) {
                        echo $mensagem;
                    }
                }
                ?>
            </p>
            <label for="email">E-MAIL *</label>
            <input type="email" id="email" name="email">
            <label for="senha">SENHA *</label>
            <input type="password" id="senha" name="senha">
            <input type="submit" value="CRIAR CONTA">
            <a href="index.php" id="texto-conta">JÁ TEM UMA CONTA? ENTRE JÁ!</a>
        </form>
    </div>
</body>
</html>