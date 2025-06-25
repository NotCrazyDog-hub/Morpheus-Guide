<?php
require '../../connection.php';
require '../../shield.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEUS DIÁRIOS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <aside>
        <nav>
            <a class="link" href="CRUD Hora/index.php">MINHA ROTINA</a>
            <a class="link" href="index.php">MEUS DIÁRIOS</a>
        </nav>
    </aside>
    <main>
        <h2 class="titulo">NÃO DURMA ESTRESSADO! ESCREVA SUAS PREOCUPAÇÕES:</h2>
        <br>
        <a id="botao-criar" href="createDi.php">+ CRIAR</a>
        <br>
        <h2 class="titulo">MEUS DIÁRIOS:</h2>
        <table>
            <tr>
            <th class="categoria">ID:</th>
                <th class="categoria">TÍTULO:</th>
                <th class="categoria">CRIADO EM:</th>
                <th class="categoria">AÇÕES:</th>
            </tr>
            <?php
                try {
                    $consulta = $connection->prepare("SELECT * FROM diarios");
    
                    if ($consulta->execute()) { 
                        while ($pegar = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
                       <tr>
                        <td class="celula"><?php echo $pegar->id ?></td>
                           <td class="celula"><?php echo $pegar->titulo ?></td>
                           <td class="celula"><?php echo $pegar->criado_em?></td>
                           <td class="celula">
                               <form action='form_update.php' method='post'>
                                   <input type='hidden' name='id' value='<?php echo $pegar->id?>'>
                                   <input type='hidden' name='titulo' id='titulo' value='<?php echo $pegar->titulo?>'>
                                   <input type='hidden' name='conteudo' id='conteudo' value='<?php echo $pegar->conteudo?>'>
                                   <input type='submit' value='[Visualizar/Editar]'>
                               </form>
                               <form action="delete.php" method="post">
                                   <input type='hidden' name='id' value='<?php echo $pegar->id?>'>
                                   <input type='submit' value='[Excluir]'>
                               </form>
                           </td>
                       </tr>
                <?php 
                        }
                }  
                else {
                    echo "Erro: Não foi possível recuperar os dados do banco de dados";
                }
            } 
            catch (PDOException $erro) {
                echo "Erro: ".$erro->getMessage();
            }
            ?>
        </table> 
    </main>
</body>
</html>