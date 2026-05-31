<?php
include '../Koneksi.php';
include '../Model.php';

if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    deletePeminjaman($koneksi, $id);
    header('Location: Peminjaman.php');
    exit();
}

$dataPeminjaman = getAllPeminjaman($koneksi);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="header">
        <a href="../Index.php" class="header-logo">
            Perpustakaan
            <span>SISTEM MANAJEMEN</span>
        </a>
        <a href="../Index.php" class="header-back">← Kembali</a>
    </div>

    <div class="container">
        <div class="card">

            <div class="card-title">Daftar Peminjaman</div>

            <a href="FormTambah.php" class="btn-tambah">+ Tambah Peminjaman</a>

            <div class="table-wrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul Buku</th>
                            <th>Nama Member</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($p = mysqli_fetch_assoc($dataPeminjaman)) : ?>
                        <tr>
                            <td><?= $p['id_peminjaman'] ?></td>
                            <td><?= $p['judul_buku'] ?></td>
                            <td><?= $p['nama_member'] ?></td>
                            <td><?= $p['tanggal_pinjam'] ?></td>
                            <td><?= $p['tanggal_kembali'] ?></td>
                            <td>
                                <a href="Peminjaman.php?aksi=hapus&id=<?= $p['id_peminjaman'] ?>"
                                   class="btn-hapus"
                                   onclick="return confirm('Yakin hapus data peminjaman ini?')">
                                   Hapus
                                </a>
                                <a href="FormEdit.php?id=<?= $p['id_peminjaman'] ?>"
                                   class="btn-ubah">
                                   Ubah
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>
</html>