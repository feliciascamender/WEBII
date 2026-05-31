<?php
include '../Koneksi.php';
include '../Model.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul  = $_POST['judul_buku'];
    $penulis  = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun    = $_POST['tahun_terbit'];

    if (empty($judul) || empty($penulis) || empty($penerbit) || empty($tahun)) {
        $error = 'Semua field wajib diisi!';
    } else {
        tambahBuku($koneksi, $judul, $penulis, $penerbit, $tahun);
        header('Location: Buku.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="header">
        <a href="../Index.php" class="header-logo">
            Perpustakaan
            <span>SISTEM MANAJEMEN</span>
        </a>
        <a href="Buku.php" class="header-back">← Kembali</a>
    </div>

    <div class="container-sm">
        <div class="card">

            <div class="card-title">Tambah Buku</div>

            <?php if ($error): ?>
                <div class="alert-error"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" name="judul_buku" 
                               class="form-input" 
                               placeholder="Masukkan judul buku">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" 
                               class="form-input" 
                               placeholder="Masukkan nama penulis">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" 
                               class="form-input" 
                               placeholder="Masukkan penerbit">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" 
                               class="form-input" 
                               placeholder="Contoh: 2023"
                               min="1900" max="2099">
                    </div>
                </div>
                <button type="submit" class="btn-submit">✦ Simpan Buku</button>
            </form>

        </div>
    </div>

</body>
</html>