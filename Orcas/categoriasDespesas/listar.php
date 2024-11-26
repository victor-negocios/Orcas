<?php

require __DIR__ . "/../config.php";

$sql = "SELECT * FROM categorias_despesa ORDER BY descricao";
$sql = $pdo->prepare($sql);
$sql->execute();
$categorias = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>

    <form method="POST" action="./adicionar.php">
        <label>Adicionar de Despesas:</label>
        <input type="text" name="descricao" placeholder="Digite o nome...">
        <button type="submit">Enviar</button>
    </form>

    <h1>Categorias de Despesas</h1>
    
<div class="central"> 
    <table>
        <tr>
            <th>Decrição</th>
            <th>Opção</th>
        </tr>
        <?php foreach ($categorias as $categoria): ?>
        <tr>
            <td><?=$categoria["descricao"]?></td>
            <td><a href="./deletar.php?deletar=<?=$categoria["id"]?>"><i class="fa-solid fa-trash"></i></a></td>
        </tr> 
        <?php endforeach ?>
    </table>
</div>
</body>
</html>