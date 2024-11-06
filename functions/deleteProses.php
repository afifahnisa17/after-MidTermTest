<?php
include '../config/connectdb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = htmlspecialchars($_POST['id']); // Mengambil ID dari form POST

    if ($conn) {
        // Query untuk menghapus data pengeluaran berdasarkan ID
        $sql = "DELETE FROM pengeluaran WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        try {
            // Menjalankan query untuk menghapus data
            $stmt->execute();
            // Jika penghapusan berhasil, redirect dengan pesan alert
            echo "<script>
                    alert('Data pengeluaran berhasil dihapus!');
                    window.location.href = '../index.php';
                </script>";
        } catch (PDOException $e) {
            // Menangani error jika query gagal
            echo "<script>alert('Terjadi kesalahan: " . $e->getMessage() . "');</script>";
        }
    }
} else {
    // Jika tidak ada ID yang dikirimkan, arahkan ke halaman utama
    header("Location: ../index.php");
    exit();
}
?>
