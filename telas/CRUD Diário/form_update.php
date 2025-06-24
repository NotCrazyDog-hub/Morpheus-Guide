<?php
require '../../shield.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="update.php" method="get">
        <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
        <br>
        titulo <input type="text" name="titulo" id="titulo" value="<?php echo $_GET['titulo'];?>">
        <br>
        conteudo <input type="text" name="conteudo" id="conteudo" value="<?php echo $_GET['conteudo'];?>">
        <br>
        <input type="submit" value="escrever">
    </form>
</body>
</html>