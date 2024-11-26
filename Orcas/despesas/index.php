<?php

require __DIR__ . "/../config.php";

$sql = "select 
	d.id as despesa_id,
    dp.id as despesa_parcela_id,
    dp.valor,
    dp.status,
    d.descricao as despesa_descricao,
    dp.data,
    cd.descricao as categoria_descricao
from 
	despesas_parcela dp
	join despesas d on dp.despesa_id = d.id
	join categorias_despesa cd on d.categoria_id = cd.id
order by 
	dp.data desc";

$sql = $pdo->prepare($sql);
$sql->execute();

echo "<pre>";
print_r($sql->fetchAll(PDO::FETCH_ASSOC));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Despesas</h1>
    <table>
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Valor</th>
                <th>Data</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($despesas as $despesa): ?>
                <tr>
                    <td><?=$despesa["despesa_descricao"]?></td>
                    <td><?=$despesa["categoria_descricao"]?></td>
                    <td><?=$despesa["valor"]?></td>
                    <td><?=$despesa["data"]?></td>
                    <td><?=$despesa["status"]?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>