<?php
    include '../config/connectdb.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $id = htmlspecialchars($_POST['id']); //mengabil id dari form post

        if ($conn) {
            // menghapus data berdasarkan id
            $sql = "DELETE FROM pengeluaran WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            try {
                
                $stmt->execute();
                // alert jika data berhasil dihapus
                echo "<script>
                        alert('Data pengeluaran berhasil dihapus!');
                        window.location.href = '../index.php';
                    </script>";
            } catch (PDOException $e) {
                // jika query gagal, muncul pesan error
                echo "<script>alert('Terjadi kesalahan: " . $e->getMessage() . "');</script>";
            }
        }
    } else {
        // kembali ke halaman utama
        header("Location: ../index.php");
        exit();
    }
?>
