<?php
$nama = ["", "", ""];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = [$_POST["nama1"], $_POST["nama2"], $_POST["nama3"]];

    //metode kondisional
    if (strcmp($nama[0], $nama[1]) > 0) {
        [$nama[0], $nama[1]] = [$nama[1], $nama[0]];
    }
    if (strcmp($nama[0], $nama[2]) > 0) {
        [$nama[0], $nama[2]] = [$nama[2], $nama[0]];
    }
    if (strcmp($nama[1], $nama[2]) > 0) {
        [$nama[1], $nama[2]] = [$nama[2], $nama[1]];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urutkan Nama</title>
</head>
<body>
    <h2>Urutkan 3 Nama (A-Z)</h2>

    <form method="post">
        <?php for ($i = 1; $i <= 3; $i++): ?>
            <label>Nama <?= $i ?>:</label>
            <input type="text" name="nama<?= $i ?>" value="<?= htmlspecialchars($nama[$i - 1]) ?>"> <br><br>
        <?php endfor; ?>
        <input type="submit" value="Urutkan">
    </form>

    <?php if (array_filter($nama)): ?>
        <h3>Hasil Urutan (A-Z):</h3>
        <?php foreach ($nama as $urutan => $n): ?>
            <p><?= $urutan + 1 ?>. <?= htmlspecialchars($n) ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>