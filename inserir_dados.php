<?php
$server = "esp32server.database.windows.net";
$user = "evandro";
$password = "Senai@106";
$db = "esp32server/Senai@106";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$temperatura = $_POST['temperature'];
$umidade = $_POST['humidity'];

$sql = "INSERT INTO DHT22_Dados (temperatura, umidade) VALUES ('$temperatura', '$umidade')";

if ($conn->query($sql) === TRUE) {
    echo "Dados salvos com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
