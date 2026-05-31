<?php
include '../Koneksi.php';
include '../Model.php';

// Handle DELETE
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    deleteBuku($koneksi, $id);
    header('Location: Buku.php');
    exit();
}

$dataBuku = getAllBuku($koneksi);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
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

            <div class="card-title">Daftar Buku</div>

            <a href="FormTambah.php" class="btn-tambah">+ Tambah Buku</a>

            <div class="table-wrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Buku</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($buku = mysqli_fetch_assoc($dataBuku)) : ?>
                        <tr>
                            <td><?= $buku['id_buku'] ?></td>
                            <td><?= $buku['judul_buku'] ?></td>
                            <td><?= $buku['penulis'] ?></td>
                            <td><?= $buku['penerbit'] ?></td>
                            <td><?= $buku['tahun_terbit'] ?></td>
                            <td>
                                <a href="Buku.php?aksi=hapus&id=<?= $buku['id_buku'] ?>"
                                   class="btn-hapus"
                                   onclick="return confirm('Yakin hapus buku ini?')">
                                   Hapus
                                </a>
                                <a href="FormEdit.php?id=<?= $buku['id_buku'] ?>" 
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