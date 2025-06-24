<?php
require '../../connection.php';
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
    <a href="createDi.php">Criar</a>
    <br>
    <br>
    <table border="1" width="100%">
        <tr>
            <th>Titulo</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>
        <?php
try {
    $stmt = $connection->prepare("SELECT * FROM diarios");

    if ($stmt->execute()) { 
        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
            <tr>
                <td><?php echo $rs->titulo ?></td>
                <td><?php echo $rs->criado_em ?></td>
                <td>
                    <form action='form_update.php' method='get'>
                        <input type='hidden' name='id' value='<?php echo $rs->id?>'>
                        <input type='hidden' name='titulo' id='titulo' value='<?php echo $rs->titulo?>'>
                        <input type='hidden' name='conteudo' id='conteudo' value='<?php echo $rs->conteudo?>'>
                        <input type='submit' value='[Visualizar/Editar]'>
                    </form>
                    <form action="delete.php" method="get">
                        <input type='submit' value='[Excluir]'>
                    </form>
                </td>
        <?php 
        }
    } else {
        echo "Erro: Não foi possível recuperar os dados do banco de dados";
    }
} catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
}
?>

    </table>
</body>
</html>