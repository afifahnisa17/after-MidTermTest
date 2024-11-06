<?php
    include "../functions/createProses.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Ayo buat catatan pengeluaran Anda!</h1>
        
        <form action="../functions/createProses.php" method="POST">
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" required>
            </div>
            
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" step="0.001" id="harga" name="harga" placeholder="Masukkan harga" required>
            </div>
            
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan kategori" required>
            </div>
            
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan tanggal" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Tambah Laporan Pengeluaran</button>
            </div>
        </form>
    </div>

    <!-- Link ke Bootstrap JS (untuk interaksi seperti modal, dropdown, dsb) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
