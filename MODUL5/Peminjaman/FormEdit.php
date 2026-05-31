<?php
include '../Koneksi.php';
include '../Model.php';

$id          = $_GET['id'];
$peminjaman  = getPeminjamanById($koneksi, $id);
$dataBuku    = getAllBuku($koneksi);
$dataMember  = getAllMember($koneksi);
$error       = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_buku     = $_POST['id_buku'];
    $id_member   = $_POST['id_member'];
    $tgl_pinjam  = $_POST['tanggal_pinjam'];
    $tgl_kembali = $_POST['tanggal_kembali'];

    // Validasi field kosong
    if (empty($id_buku) || empty($id_member) || empty($tgl_pinjam) || empty($tgl_kembali)) {
        $error = 'Semua field wajib diisi!';
    }
    // Validasi tanggal kembali >= tanggal pinjam
    elseif (strtotime($tgl_kembali) < strtotime($tgl_pinjam)) {
        $error = 'Tanggal kembali tidak boleh kurang dari tanggal pinjam!';
    }
    else {
        updatePeminjaman($koneksi, $id, $id_buku, $id_member, $tgl_pinjam, $tgl_kembali);
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
    <title>Edit Peminjaman</title>
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

            <div class="card-title">Edit Peminjaman</div>

            <?php if ($error): ?>
                <div class="alert-error"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-grid">

                    <!-- Dropdown Buku -->
                    <div class="form-group">
                        <label class="form-label">Pilih Buku</label>
                        <select name="id_buku" class="form-select">
                            <option value="">-- Pilih Buku --</option>
                            <?php
                            mysqli_data_seek($dataBuku, 0);
                            while ($b = mysqli_fetch_assoc($dataBuku)) : ?>
                                <option value="<?= $b['id_buku'] ?>"
                                    <?= $peminjaman['id_buku'] == $b['id_buku'] ? 'selected' : '' ?>>
                                    <?= $b['judul_buku'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <!-- Dropdown Member -->
                    <div class="form-group">
                        <label class="form-label">Pilih Member</label>
                        <select name="id_member" class="form-select">
                            <option value="">-- Pilih Member --</option>
                            <?php
                            mysqli_data_seek($dataMember, 0);
                            while ($m = mysqli_fetch_assoc($dataMember)) : ?>
                                <option value="<?= $m['id_member'] ?>"
                                    <?= $peminjaman['id_member'] == $m['id_member'] ? 'selected' : '' ?>>
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
                               value="<?= $peminjaman['tanggal_pinjam'] ?>">
                    </div>

                    <!-- Tanggal Kembali -->
                    <div class="form-group">
                        <label class="form-label">Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali"
                               id="tanggal_kembali"
                               class="form-input"
                               value="<?= $peminjaman['tanggal_kembali'] ?>"
                               min="<?= $peminjaman['tanggal_pinjam'] ?>">
                        <small style="color:#a08060; font-size:11px; margin-top:4px;">
                            * Tanggal kembali tidak boleh kurang dari tanggal pinjam
                        </small>
                    </div>

                </div>
                <button type="submit" class="btn-submit">✦ Simpan Perubahan</button>
            </form>

        </div>
    </div>

    <!-- Logic tanggal: client side -->
    <script>
        const tglPinjam  = document.getElementById('tanggal_pinjam');
        const tglKembali = document.getElementById('tanggal_kembali');

        tglPinjam.addEventListener('change', function() {
            tglKembali.min = this.value;
            if (tglKembali.value && tglKembali.value < this.value) {
                tglKembali.value = this.value;
            }
        });

        if (tglPinjam.value) {
            tglKembali.min = tglPinjam.value;
        }
    </script>

</body>
</html>