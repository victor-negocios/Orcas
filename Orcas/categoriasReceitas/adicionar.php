<?php

if(empty($_POST["descricao"])){
    header("Location: ./listar.php");
    exit;
}

require __DIR__ . "/../config.php";
$descricao = $_POST["descricao"];

$sql = "INSERT INTO categorias_receita (descricao)VALUES (:descricao)";
$sql = $pdo->prepare($sql);
$sql->bindValue(":descricao", $descricao);
$sql->execute();

header("Location: ./listar.php");
exit;