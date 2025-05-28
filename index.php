<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="assets/logo.png" alt="Logo da Morpheus Guide">
    <div id="caixa-de-login">
        <h1>Bem-vindo de volta aos braços de Morfeu!</h1>
        <form action="shield.php" method="POST">
            <label for="email">E-MAIL *</label>
            <br>
            <input type="email" name="email" class="email" placeholder="Ex.: root@gmail.com">
            <br>
            <label for="senha">SENHA *</label>
            <br>
            <input type="password" name="senha" class="senha" placeholder="Ex.: senhaNadaSegura490">
            <br>
            <input type="submit" value="ACESSAR">
        </form>
    </div>
</body>
</html>