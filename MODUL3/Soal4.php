<?php
// ambil jumlah post (submit awal, tambah, atau kurang)
if (isset($_POST['jumlah_bintang'])) {
    $jumlah = (int)$_POST['jumlah_bintang'];
} elseif (isset($_POST['jumlah_hidden'])) {
    $jumlah = (int)$_POST['jumlah_hidden'];
} else {
    $jumlah = null;
}

// proses tombol +/-
if (isset($_POST['tambah']) && $jumlah !== null) {
    $jumlah++;
} elseif (isset($_POST['kurang']) && $jumlah !== null && $jumlah > 0) {
    $jumlah--;
}

$starImg = 'https://i.pinimg.com/736x/2a/01/55/2a0155445a804613748d7dbeb6209318.jpg';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK304</title>
    <style>
        .stars img { width: 80px; height: 80px; }
    </style>
</head>
<body>

    <?php if ($jumlah === null): ?>
        <!-- Form awal -->
        <form method="POST">
            Jumlah bintang <input type="number" name="jumlah_bintang">
            <br>
            <button type="submit">Submit</button>
        </form>

    <?php else: ?>
        <!-- Tampilkan hasil -->
        <p>Jumlah bintang <?= $jumlah ?></p>
        <div class="stars">
            <?php
            $i = 1;
            while ($i <= $jumlah) {
                echo "<img src='$starImg' alt='bintang'>";
                $i++;
            }
            ?>
        </div>

        <!-- Tombol Tambah dan Kurang -->
        <form method="POST">
            <input type="hidden" name="jumlah_hidden" value="<?= $jumlah ?>">
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button>
        </form>
    <?php endif; ?>

</body>
</html>