<?php
include '../functions/readProses.php';

// membuat variabel & memanggil fungsi dari readProses.php
$pengeluaranList = getAllPengeluaran();

// membuat variabel & memanggil fungsi dari readProses.php
$totalPengeluaran = getTotalPengeluaran();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lihat Detail Pengeluaran</title>

    <!-- Link ke Bootstrap CSS untuk desain tabel -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Detail Pengeluaran</h1>
        <p class="text-center mb-4">Berikut adalah rincian semua pengeluaran Anda dalam tabel.</p>

        <!-- memastikan ada data  -->
        <?php if ($pengeluaranList): ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Tanggal Pengeluaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pengeluaranList as $pengeluaran): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($pengeluaran['id']); ?></td>
                            <td><?php echo htmlspecialchars($pengeluaran['kategori']); ?></td>
                            <td><?php echo htmlspecialchars($pengeluaran['deskripsi']); ?></td>
                            <td>Rp <?php echo number_format($pengeluaran['harga'], 2, ',', '.'); ?></td>
                            <td><?php echo htmlspecialchars($pengeluaran['tanggal']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Menampilkan Total Pengeluaran -->
            <div class="alert alert-info">
                <strong>Total Pengeluaran: </strong> Rp <?php echo number_format($totalPengeluaran['total_pengeluaran'], 2, ',', '.'); ?>
            </div>
        <?php else: ?>
            <p>Tidak ada pengeluaran yang ditemukan.</p>
        <?php endif; ?>

        <!-- Link kembali ke halaman utama -->
        <div class="text-center">
            <a href="../index.php" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
    </div>

    <!-- Link ke Bootstrap JS untuk dropdown dan interaksi -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
