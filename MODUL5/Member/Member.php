<?php
include '../Koneksi.php';
include '../Model.php';

if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    deleteMember($koneksi, $id);
    header('Location: Member.php');
    exit();
}

$dataMember = getAllMember($koneksi);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member</title>
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

            <div class="card-title">Daftar Member</div>

            <a href="FormTambah.php" class="btn-tambah">+ Tambah Member</a>

            <div class="table-wrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Member</th>
                            <th>Nama Member</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($member = mysqli_fetch_assoc($dataMember)) : ?>
                        <tr>
                            <td><?= $member['id_member'] ?></td>
                            <td><?= $member['nama_member'] ?></td>
                            <td><?= $member['email'] ?></td>
                            <td><?= $member['no_hp'] ?></td>
                            <td><?= $member['alamat'] ?></td>
                            <td>
                                <a href="Member.php?aksi=hapus&id=<?= $member['id_member'] ?>"
                                   class="btn-hapus"
                                   onclick="return confirm('Yakin hapus member ini?')">
                                   Hapus
                                </a>
                                <a href="FormEdit.php?id=<?= $member['id_member'] ?>" 
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