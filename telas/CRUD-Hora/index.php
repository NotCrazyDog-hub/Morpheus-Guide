<?php
session_start();
require '../../connection.php';
if (!isset($_SESSION['id_usuario'])) {
    header('Location: ../../index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUA ROTINA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <aside>
        <nav>
            <a class="link" href="index.php">MINHA ROTINA</a>
            <a class="link" href="CRUD-Diario/index.php">MEUS DIÁRIOS</a>
        </nav>
    </aside>
    <main>
        <h2 class="titulo">ORGANIZE SUA HIGIENE DO SONO:</h2>
        <br>
        <a id="botao-criar" href="form_create.php">+ HORA DE ACORDAR</a>
        <br>
        <h2 class="titulo">MINHA ROTINA:</h2>
        <table>
            <tr>
                <th class="categoria">ID:</th>
                <th class="categoria">HORA DE ACORDAR:</th>
                <th class="categoria">HORA DE DORMIR:</th>
                <th class="categoria">AÇÕES:</th>
            </tr>
            <?php
                try {
                    $consulta = $connection->prepare("SELECT * FROM rotinas");
    
                    if ($consulta->execute()) { 
                        while ($pegar = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
                       <tr>
                        <td class="celula"><?php echo $pegar->id ?></td>
                           <td class="celula"><?php echo $pegar->hora_de_acordar ?></td>
                           <td class="celula"><?php echo $pegar->horario_de_dormir_escolhido ?></td>
                           <td class="celula">
                               <form action='form_update.php' method='post'>
                                   <input type='hidden' name='id' value='<?php echo $pegar->id?>'>
                                   <input type='hidden' name='hora' id='hora' value='<?php echo $pegar->hora_de_acordar?>'>
                                   <input type='hidden' name='dormir' id='dormri' value='<?php echo $pegar->horario_de_dormir_escolhido?>'>
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