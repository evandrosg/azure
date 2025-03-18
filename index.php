<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:esp32server.database.windows.net,1433; Database = SQL_Evandro", "evandro", "Senai@106");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "evandro", "pwd" => "{your_password_here}", "Database" => "SQL_Evandro", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:esp32server.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>