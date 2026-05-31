<?php
include '../Koneksi.php';
include '../Model.php';

$error = '';

// Ambil semua buku dan member untuk dropdown
$dataBuku   = getAllBuku($koneksi);
$dataMember = getAllMember($koneksi);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_buku       = $_POST['id_buku'];
    $id_member     = $_POST['id_member'];
    $tgl_pinjam    = $_POST['tanggal_pinjam'];
    $tgl_kembali   = $_POST['tanggal_kembali'];

    // Validasi field kosong
    if (empty($id_buku) || empty($id_member) || empty($tgl_pinjam) || empty($tgl_kembali)) {
        $error = 'Semua field wajib diisi!';
    }
    // Validasi tanggal kembali >= tanggal pinjam
    elseif (strtotime($tgl_kembali) < strtotime($tgl_pinjam)) {
        $error = 'Tanggal kembali tidak boleh kurang dari tanggal pinjam!';
    }
    else {
        tambahPeminjaman($koneksi, $id_buku, $id_member, $tgl_pinjam, $tgl_kembali);
        header('Location: Peminjaman.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="header">
        <a href="../Index.php" class="header-logo">
            Perpustakaan
            <span>SISTEM MANAJEMEN</span>
        </a>
        <a href="Peminjaman.php" class="header-back">← Kembali</a>
    </div>

    <div class="container-sm">
        <div class="card">

            <div class="card-title">Tambah Peminjaman</div>

            <?php if ($error): ?>
                <div class="alert-error"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-grid">

                    <!-- Dropdown Buku -->
                    <div class="form-group">
                        <label class="form-label">Pilih Buku</label>
                        <select name="id_buku" class="form-select">
                            <option value=""></option>
                            <?php 
                            // Reset pointer hasil query
                            mysqli_data_seek($dataBuku, 0);
                            while ($b = mysqli_fetch_assoc($dataBuku)) : ?>
                                <option value="<?= $b['id_buku'] ?>"
                                    <?= (isset($_POST['id_buku']) && $_POST['id_buku'] == $b['id_buku']) ? 'selected' : '' ?>>
                                    <?= $b['judul_buku'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <!-- Dropdown Member -->
                    <div class="form-group">
                        <label class="form-label">Pilih Member</label>
                        <select name="id_member" class="form-select">
                            <option value=""></option>
                            <?php 
                            mysqli_data_seek($dataMember, 0);
                            while ($m = mysqli_fetch_assoc($dataMember)) : ?>
                                <option value="<?= $m['id_member'] ?>"
                                    <?= (isset($_POST['id_member']) && $_POST['id_member'] == $m['id_member']) ? 'selected' : '' ?>>
                                    <?= $m['nama_member'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <!-- Tanggal Pinjam -->
                    <div class="form-group">
                        <label class="form-label">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam"
                               id="tanggal_pinjam"
                               class="form-input"
                               value="<?= isset($_POST['tanggal_pinjam']) ? $_POST['tanggal_pinjam'] : '' ?>">
                    </div>

                    <!-- Tanggal Kembali -->
                    <div class="form-group">
                        <label class="form-label">Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali"
                               id="tanggal_kembali"
                               class="form-input"
                               value="<?= isset($_POST['tanggal_kembali']) ? $_POST['tanggal_kembali'] : '' ?>">
                        <small style="color:#a08060; font-size:11px; margin-top:4px;">
                            * Tanggal kembali tidak boleh kurang dari tanggal pinjam
                        </small>
                    </div>

                </div>
                <button type="submit" class="btn-submit">✦ Simpan Peminjaman</button>
            </form>

        </div>
    </div>

    <!-- Logic tanggal: client side -->
    <script>
        const tglPinjam   = document.getElementById('tanggal_pinjam');
        const tglKembali  = document.getElementById('tanggal_kembali');

        // Saat tanggal pinjam berubah
        tglPinjam.addEventListener('change', function() {
            // Set min tanggal kembali = tanggal pinjam
            tglKembali.min = this.value;

            // Kalau tanggal kembali sudah diisi tapi lebih kecil, reset
            if (tglKembali.value && tglKembali.value < this.value) {
                tglKembali.value = this.value;
            }
        });

        // Saat halaman load, set min jika tanggal pinjam sudah ada nilainya
        if (tglPinjam.value) {
            tglKembali.min = tglPinjam.value;
        }
    </script>

</body>
</html>