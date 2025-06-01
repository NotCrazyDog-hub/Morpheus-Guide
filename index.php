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
            <label for="email">E-MAIL</label>
            <input type="email" id="email" name="email" placeholder="Ex.: root@gmail.com" required>
            <label for="senha">SENHA</label>
            <input type="password" id="senha" name="senha" placeholder="Ex.: senhaNadaSegura490" required>
            <input type="submit" value="ACESSAR">
        </form>
    </div>
</body>
</html>
