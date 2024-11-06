<?php
include "../config/connectdb.php";

// Syntax untuk memeriksa ID apakah ada / tidak ada
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Proses Update Data jika form disubmit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Proses pengambilan data dari inputan
        $deskripsi = $_POST['deskripsi'];
        $jumlah = $_POST['jumlah'];
        $kategori = $_POST['kategori'];
        $tanggal = $_POST['tanggal'];

        // Query untuk mengupdate data
        $updateQuery = "UPDATE pengeluaran SET deskripsi = :deskripsi, jumlah = :jumlah, kategori = :kategori, tanggal = :tanggal WHERE id = :id";

        $stmt = $pdo->prepare($updateQuery);
        $stmt->bindParam(':deskripsi', $deskripsi);
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':id', $id);

        // Eksekusi query
        if ($stmt->execute()) {
            // Jika update berhasil, arahkan ke index.php
            header("Location: ../index.php");
            exit();
        } else {
            echo "Gagal mengupdate data!";
        }
    }

    // Proses pengambilan data berdasarkan ID
    $query = "SELECT * FROM pengeluaran WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Ambil data untuk ditampilkan di form
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Jika data ditemukan, $row berisi data yang akan ditampilkan di form
    } else {
        // Kondisi jika data tidak ditemukan
        echo "
            <h5>Data Pengeluaran Tidak Ditemukan!</h5>
            <p>Mohon masukkan ID yang sesuai!</p>
            <a href='../index.php'>Kembali ke Beranda</a>
        ";
        exit();
    }
} else {
    // Redirect jika tidak ada ID yang valid di URL
    header("Location: ../pages/not_found.php");
    exit();
}
?>

<!-- Form untuk mengupdate data pengeluaran -->
<form action="" method="POST">
    <label for="deskripsi">Deskripsi:</label>
    <input type="text" name="deskripsi" value="<?php echo htmlspecialchars($row['deskripsi']); ?>" required><br>

    <label for="jumlah">Jumlah:</label>
    <input type="number" name="jumlah" value="<?php echo htmlspecialchars($row['jumlah']); ?>" required><br>

    <label for="kategori">Kategori:</label>
    <input type="text" name="kategori" value="<?php echo htmlspecialchars($row['kategori']); ?>" required><br>

    <label for="tanggal">Tanggal:</label>
    <input type="date" name="tanggal" value="<?php echo htmlspecialchars($row['tanggal']); ?>" required><br>

    <button type="submit">Update Pengeluaran</button>
</form>
