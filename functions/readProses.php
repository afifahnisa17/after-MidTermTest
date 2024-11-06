<?php
include '../config/connectdb.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Memeriksa parameter 'id' dikirim melalui metode GET dan memastikan itu adalah angka
    $id = intval($_GET['id']);

    // Siap-siap query SQL untuk mengambil data dari tabel 'pengeluaran' berdasarkan 'id'
    $query = "SELECT * FROM pengeluaran WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Menjalankan query SQL
    if ($stmt->execute()) {
        // Jika query berhasil dieksekusi
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Jika data ditemukan, data pada ID tersebut ditampilkan pada inputan form
        } else {
            // Jika data dengan ID tersebut tidak ditemukan, tampilkan pesan bahwa data tidak ditemukan
            echo "
                <head>
                    <title>Data Tidak Ditemukan!</title>
                </head>
                <body>
                    <div>
                        <h5>Data Tidak Bisa Ditemukan!</h5>
                        <p>Mohon masukkan ID yang sesuai!</p>
                        <a href='../index.php'>Kembali ke Beranda</a>
                    </div>
                </body>
            ";
            exit();
        }
    } else {
        // Jika query gagal, tampilkan pesan error
        die("Query gagal dieksekusi: " . print_r($pdo->errorInfo(), true));
    }
} else {
    // Jika ID tidak valid atau tidak ada di URL, arahkan ke halaman error
    header("Location: ../pages/not_found_route.php");
    exit();
}
?>

<!-- Form untuk menampilkan data yang diambil dari database -->
<form action="" method="POST">
    <label for="deskripsi">Deskripsi:</label>
    <input type="text" name="deskripsi" value="<?php echo htmlspecialchars($row['deskripsi']); ?>" disabled><br>

    <label for="jumlah">Jumlah:</label>
    <input type="number" name="jumlah" value="<?php echo htmlspecialchars($row['jumlah']); ?>" disabled><br>

    <label for="kategori">Kategori:</label>
    <input type="text" name="kategori" value="<?php echo htmlspecialchars($row['kategori']); ?>" disabled><br>

    <label for="tanggal">Tanggal:</label>
    <input type="date" name="tanggal" value="<?php echo htmlspecialchars($row['tanggal']); ?>" disabled><br>

    <button type="button" onclick="window.location.href='../index.php'">Kembali ke Beranda</button>
</form>
