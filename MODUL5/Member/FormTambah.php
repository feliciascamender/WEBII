<?php
include '../Koneksi.php';
include '../Model.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama   = $_POST['nama_member'];
    $email  = $_POST['email'];
    $no_hp  = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    if (empty($nama) || empty($email) || empty($no_hp)) {
        $error = 'Field nama, email, dan no HP wajib diisi!';
    } else {
        tambahMember($koneksi, $nama, $email, $no_hp, $alamat);
        header('Location: Member.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Member</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="header">
        <a href="../Index.php" class="header-logo">
            Perpustakaan
            <span>SISTEM MANAJEMEN</span>
        </a>
        <a href="Member.php" class="header-back">← Kembali</a>
    </div>

    <div class="container-sm">
        <div class="card">

            <div class="card-title">Tambah Member</div>

            <?php if ($error): ?>
                <div class="alert-error"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Nama Member</label>
                        <input type="text" name="nama_member" 
                               class="form-input"
                               placeholder="Masukkan nama member">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" 
                               class="form-input"
                               placeholder="Masukkan email">
                    </div>
                    <div class="form-group">
                        <label class="form-label">No HP</label>
                        <input type="text" name="no_hp" 
                               class="form-input"
                               placeholder="Contoh: 08123456789">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" 
                               class="form-input"
                               placeholder="Masukkan alamat">
                    </div>
                </div>
                <button type="submit" class="btn-submit">✦ Simpan Member</button>
            </form>

        </div>
    </div>

</body>
</html>