<?php
include "../config/connectdb.php"; //terhubung ke sql server

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // ambil data berdasarkan id
    $query = "SELECT * FROM pengeluaran WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // jika ditemukan, maka masukkan ke dalam row (supaya tidak kosong inputannya)
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // proses jika form di submit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $kategori = $_POST['kategori'];
        $tanggal = $_POST['tanggal'];

        // proses update data
        $updateQuery = "UPDATE pengeluaran SET deskripsi = :deskripsi, harga = :harga, kategori = :kategori, tanggal = :tanggal WHERE id = :id";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bindParam(':deskripsi', $deskripsi);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            // Jika berhasil, alihkan ke halaman index
            header("Location: ../index.php");
            exit();
        } else {
            echo "Gagal mengupdate data!";
        }
    }
} else {
    echo "ID tidak valid!";
    exit();
}
?>
