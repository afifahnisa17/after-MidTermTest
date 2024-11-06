<?php
include './config/connectdb.php';

if ($conn) {
    $sql = "SELECT * FROM pengeluaran";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Pengeluaran</title>

    <!-- link bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Laporan Pengeluaran Harian</h1>
        <p class="text-center mb-4">Kami menyediakan laporan pengeluaran yang detail untuk membantu Anda dalam memantau pengeluaran Anda.</p>

        <?php if ($conn) { ?>
            <div class="mb-4 text-center">
                <a href="pages/tambah_laporan.php">
                    <button class="btn btn-success">Tambah Pengeluaran</button>
                </a>
            </div>

            <div class="list-group">
                <?php
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <div class="list-group-item p-4 mb-3 shadow-sm rounded">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3"><?php echo htmlspecialchars($row['kategori']); ?></h5>
                        </div>

                        <p><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                        <p><strong>Jumlah: </strong>Rp <?php echo number_format($row['harga'], 2, ',', '.'); ?></p>
                        <p><strong>Tanggal Pengeluaran: </strong><?php echo htmlspecialchars($row['tanggal']); ?></p>

                        <!-- Tombol-tombol berada dalam satu baris -->
                        <div class="d-flex justify-content-start gap-2">
                            <a href="pages/lihat_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Lihat Detail</a>
                            <a href="pages/edit_laporan.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                            <form action="functions/deleteProses.php" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php } else { ?>
            <div class="alert alert-danger">
                <h5>Koneksi Database Anda Terputus</h5>
                <p>Periksa koneksi database Anda dan coba lagi.</p>
            </div>
        <?php } ?>
    </div>

    <!-- Link ke Bootstrap JS (untuk dropdown dan interaksi) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
