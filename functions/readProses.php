<?php
    include '../config/connectdb.php';

    // mengambil semua data pengeluaran
    function getAllPengeluaran() {
        global $conn;
        // query untuk mendapatkan semua data pengeluaran
        $sql = "SELECT * FROM pengeluaran";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getTotalPengeluaran() {
        global $conn;
        // query untuk total pengeluaran
        $sql = "SELECT SUM(harga) AS total_pengeluaran FROM pengeluaran";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>
