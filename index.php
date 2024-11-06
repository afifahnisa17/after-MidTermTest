<?php
include './config/connectdb.php';

// Pastikan koneksi PDO
if ($conn) {
    // Query untuk mengambil semua data pengeluaran
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

    <!-- Link ke Bootstrap CSS -->
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
                // Menampilkan data pengeluaran
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <div class="list-group-item p-4 mb-3 shadow-sm rounded">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3"><?php echo htmlspecialchars($row['kategori']); ?></h5>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#dropdownMenu<?php echo $row['id']; ?>" aria-expanded="false" aria-controls="dropdownMenu<?php echo $row['id']; ?>">
                                Open dropdown
                            </button>
                        </div>

                        <div class="collapse" id="dropdownMenu<?php echo $row['id']; ?>">
                            <ul class="list-group mt-2">
                                <li class="list-group-item"><a href="pages/edit_laporan.php">Edit</a></li>
                                <li class="list-group-item"><a href="#">Export Data</a></li>
                                <li class="list-group-item"><a href="">Delete</a></li>
                            </ul>
                        </div>

                        <p><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                        <p><strong>Jumlah: </strong>Rp <?php echo number_format($row['jumlah'], 2, ',', '.'); ?></p>
                        <p><strong>Tanggal Pengeluaran: </strong><?php echo htmlspecialchars($row['tanggal']); ?></p>
                        <a href="pages/lihat_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Lihat Detail Pengeluaran</a>
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
