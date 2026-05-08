<?php
$bawah = isset($_POST['bawah']) ? (int)$_POST['bawah'] : '';
$atas  = isset($_POST['atas'])  ? (int)$_POST['atas']  : '';


// URL gambar bintang (PNG publik)
$starImg = 'https://i.pinimg.com/736x/2a/01/55/2a0155445a804613748d7dbeb6209318.jpg';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK303</title>
    <style>
        .output { font-size: 1.2em; display: flex; align-items: center; flex-wrap: wrap; gap: 4px; }
        .output img { width: 30px; height: 30px; }
    </style>
</head>
<body>
    <form method="POST">
        Batas Bawah : <input type="number" name="bawah" value="<?= $bawah ?>"><br>
        Batas Atas  : <input type="number" name="atas"  value="<?= $atas ?>"><br>
        <button type="submit" name="cetak" >Cetak</button>
    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if ($bawah !== '' && $atas !== '') {
        echo "<div class='output'>";
        $i = (int)$bawah;
        do {
            if (($i + 7) % 5 === 0) {
                echo "<img src='$starImg' alt='bintang'>";
            } else {
                echo "<span>$i</span>";
            }
            $i++;
        } while ($i <= (int)$atas);
        echo "</div>";
    }
    }
    ?>
</body>
</html>