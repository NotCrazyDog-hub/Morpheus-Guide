<?php

try {
    $connection = new PDO("mysql:host=localhost;dbname=morpheus;charset=utf8mb4", 
   "root", "helloWorld013", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
}
catch (PDOException $erro) {
    echo "Erro na conexão: " . $erro->getMessage();
}