<?php
include "../config/connectdb.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses pengambilan data dari inputan form
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];

    // Validasi input
    if (empty($deskripsi) || empty($jumlah) || empty($kategori) || empty($tanggal)) {
        echo "Semua field harus diisi!";
        exit();
    }

    // Validasi jumlah: Pastikan jumlah adalah angka
    if (!is_numeric($jumlah)) {
        echo "Jumlah harus berupa angka!";
        exit();
    }

    // Menyiapkan query untuk menambahkan data ke dalam tabel pengeluaran
    $sql = "INSERT INTO pengeluaran (deskripsi, jumlah, kategori, tanggal) VALUES (:deskripsi, :jumlah, :kategori, :tanggal)";

    // Menyiapkan query PDO
    $stmt = $conn->prepare($sql);

    // Mengikat parameter ke query
    $stmt->bindParam(':deskripsi', $deskripsi);
    $stmt->bindParam(':jumlah', $jumlah);
    $stmt->bindParam(':kategori', $kategori);
    $stmt->bindParam(':tanggal', $tanggal);

    // Eksekusi query dan handling error
    try {
        // Menjalankan query
        $stmt->execute();

        // Redirect ke halaman index setelah data berhasil dimasukkan
        
        header("Location: ../index.php");
        exit();
    } catch (PDOException $e) {
        // Menangani kesalahan jika terjadi error dalam query
        echo "Terjadi kesalahan saat menambahkan data: " . $e->getMessage();
    }
}
?>
