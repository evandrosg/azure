<?php
$host = "servidormysqlazure.database.windows.net"; 
$usuario = "evandro"; 
$senha = "Senai@106"; 
$banco = "mysqlazure"; 

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>
