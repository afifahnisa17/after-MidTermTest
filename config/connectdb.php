<?php
    // koneksi ke database menggunakan pdo
    $serverName = "AFIFAH\MSSQLSERVER2";  
    $database = "pengeluaran_db";  
    $dsn = "sqlsrv:Server=$serverName;Database=$database";

    // Variabel untuk status koneksi
    $isDbConnectionSuccess = false;

    try {
        
        $conn = new PDO($dsn, "", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Mengatur status koneksi
        $isDbConnectionSuccess = true;
        
    } catch (PDOException $e) {
        // Menampilkan pesan error jika tidak terkoneksi
        echo "Connection failed: " . $e->getMessage();
    }
?>
