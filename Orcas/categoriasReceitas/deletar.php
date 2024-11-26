<?php

if (empty($_GET["deletar"])){
    header("Location: ./listar.php");
    exit;
}

require __DIR__ . "/../config.php";

$id = $_GET["deletar"];

$sql = "DELETE FROM categorias_receita WHERE id = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $id);
$sql->execute();  
header("Location: ./listar.php");
exit;
