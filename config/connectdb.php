<?php
// SQL Server connection details
$serverName = "AFIFAH\MSSQLSERVER2";
$database = "test";
$username = "";
$password = "";

// DSN (Data Source Name) for PDO SQLSRV
$dsn = "sqlsrv:Server=$serverName;Database=$database";

try {
    // Create a PDO instance
    $conn = new PDO($dsn, $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connection established successfully.";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Close the connection (optional, as PDO automatically closes connection when the script ends)
$conn = null;
?>

