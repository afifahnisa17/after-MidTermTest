<?php
include "../config/connectdb.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // mengambil data dari inputan form
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];

    // validasi input
    if (empty($deskripsi) || empty($harga) || empty($kategori) || empty($tanggal)) {
        echo "Semua field harus diisi!";
        exit();
    }

    // memastikan harga berbentuk angka
    if (!is_numeric($harga)) {
        echo "Harga harus berupa angka!";
        exit();
    }
    
    // query untuk menambah data
    $sql = "INSERT INTO pengeluaran (deskripsi, harga, kategori, tanggal) VALUES (:deskripsi, :harga, :kategori, :tanggal)";
    
    $stmt = $conn->prepare($sql);

    //data yang diterima form akan dimasukkan ke query
    $stmt->bindParam(':deskripsi', $deskripsi);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':kategori', $kategori);
    $stmt->bindParam(':tanggal', $tanggal);
    
    try {
        // menjalankan query
        $stmt->execute();

        // halaman kembali ke index saat data berhasil dimasukkan ke sql 
        header("Location: ../index.php");
        exit();
    } catch (PDOException $e) {
        // Menangani kesalahan jika terjadi error dalam query
        echo "Terjadi kesalahan saat menambahkan data: " . $e->getMessage();
    }
}
?>
