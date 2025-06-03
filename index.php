<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="espaco-em-branco">
        <img src="assets/sheep.png" alt="Logo da Morpheus Guide">
    </div>
    <div id="caixa-de-login">
        <h1>BEM-VINDO DE VOLTA AO SEU GUIA!</h1>
        <form action="shield.php" method="POST">
            <label for="email">E-MAIL *</label>
            <input type="email" id="email" name="email">
            <label for="senha">SENHA *</label>
            <input type="password" id="senha" name="senha">
            <p id="recuperar-senha">ESQUECEU A SENHA? RECUPERE!</p>
            <input type="submit" value="ACESSAR">
            <p id="acessar-conta">NÃO TEM UMA CONTA? CRIE UMA!</p>
        </form>
    </div>
</body>
</html>
