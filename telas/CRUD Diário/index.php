<?php
require '../../connection.php';
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
while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
echo "<tr>";
echo "<td>".$rs->titulo."</td>"."<td>".$rs->criado_em
."</td>".
"</td><td><center><a href=\"\">[Alterar]</a>"
."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
."<a href=\"\">[Excluir]</a></center></td>";

echo "</tr>";
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