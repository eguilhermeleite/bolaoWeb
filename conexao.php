<?php

$host = "localhost";
$dbName = "bolao";
$usuario = "root";
$senha = "";


try {
    // não podem conter espaços entre dbname=nomeDoBanco e o chrset deve previnir erros de acentuação
    $conexao = new PDO("mysql:host=$host; dbname=$dbName; charset=utf8", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "ERRO!  "; //. $erro->getMessage() . " <br>";
}

