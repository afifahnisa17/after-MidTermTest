<?php
include '../config/connectdb.php'; // Pastikan file ini berisi koneksi PDO

if (isset($_POST['id'])) {
    // Memeriksa apakah parameter 'id' dikirimkan melalui POST dari halaman lihat_detail.php
    $id = htmlspecialchars($_POST['id']);

    // Persiapan query SQL untuk menghapus data berdasarkan 'id'
    $sql = "DELETE FROM pengeluaran WHERE id = :id";

    // Menyiapkan statement PDO
    $stmt = $conn->prepare($sql);

    // Mengikat parameter :id ke nilai yang diterima dari form
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Eksekusi query dan menangani error
    try {
        // Menjalankan query untuk menghapus data
        $stmt->execute();

        // Jika penghapusan berhasil, redirect ke halaman index.php
        header("Location: ../index.php");
        exit();
    } catch (PDOException $e) {
        // Menangani error jika query gagal
        echo "<script>alert('Terjadi kesalahan: " . $e->getMessage() . "');</script>";
    }
} else {
    // Jika 'id' tidak dikirim, arahkan ke halaman not_found_route.php
    header("Location: ../pages/not_found.php");
    exit();
}
?>
