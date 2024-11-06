<?php
// readProses.php

include '../config/connectdb.php';

// Fungsi untuk mengambil semua data pengeluaran
function getAllPengeluaran() {
    global $conn;
    // Query untuk mendapatkan semua data pengeluaran
    $sql = "SELECT * FROM pengeluaran";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTotalPengeluaran() {
    global $conn;
    // Query untuk menghitung total pengeluaran
    $sql = "SELECT SUM(harga) AS total_pengeluaran FROM pengeluaran";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
