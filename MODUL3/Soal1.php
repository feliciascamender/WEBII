<?php
$jumlah = isset($_POST['jumlah']) ? (int)$_POST['jumlah'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Jumlah Peserta: <input type="number" name="jumlah" value="<?= $jumlah ?>">
        <br>
        <button type="submit">Cetak</button>
    </form>

    <?php
    if ($jumlah> 0) {
        $i = 1;
        while ($i <= $jumlah) {
            $warna = ($i % 2 != 0) ? 'red' : 'green';
            echo "<h2 style='color: $warna; '>Peserta ke-$i</h2>";
            $i++;
        }
    } ?>
</body>
</html>