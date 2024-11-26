<?php


$dbName = "orcas";
$host = "localhost";
$port = 3306;
$user = "root";
$pass = "dc@f0876";


try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbName;port=$port", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
  echo "Erro MYSQL: " . $e->getMessage();
}