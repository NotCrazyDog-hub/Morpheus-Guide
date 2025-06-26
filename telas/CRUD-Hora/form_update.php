<?php
session_start();
require '../../shield.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALCULAR HORÁRIO DE DORMIR</title>
    <link rel="stylesheet" href="styleForUC.css">
</head>
<body>
    <div id="caixa-branca">
        <h2 id="intro">EDITE SEU HORARIO DE DORMIR!</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
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
            <input type="time" name="hora" id="hora" value="<?php echo $_POST['hora']; ?>">
            <br>
            <input type="submit" value="ENVIAR">
        </form>
        <a id="voltar" href="index.php">VOLTAR</a>
    </div>
</body>
</html>