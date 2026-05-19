<?php

// Exemplo de conexão PDO
$host = 'localhost';
$db   = 'world';
$user = 'root';
$pass = 'usbw';
$charset = 'utf8mb4';
$port = '3307';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";

try {
     $pdo = new PDO($dsn, $user, $pass);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>
