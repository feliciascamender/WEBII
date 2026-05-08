<?php 
$tinggi = isset($_POST['tinggi']) ? (int)$_POST['tinggi'] : 0;
$gambar = isset($_POST['gambar']) ? htmlspecialchars($_POST['gambar']) : '';
?> 
<!-- https://i.ibb.co.com/WNCtdkhD/leeeeeeeeeeeeeeeon.jpg -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .baris { display: flex;align-items: center;}
        .baris img {width: 60px; height: 60px;}
    </style>
</head>
<body>
    <form method="POST">
        Tinggi: <input type="number" name="tinggi" value="<?= $tinggi?>"><br>
        Alamat Gambar: <input type="text" name="gambar" value="<?= $gambar?>"><br>
        <button type="submit">Cetak</button>
    </form>
    
    <?php if ($tinggi > 0 && $gambar !== '') {
        $baris = $tinggi;
        while ($baris >= 1) {
            $indent = ($tinggi - $baris) * 60;
            echo "<div class='baris' style='margin-left: {$indent}px;'>";
            $j = 1;
            while ($j <= $baris) {
                echo "<img src='{$gambar}' alt='Gambar'>";
                $j++;
            }
            echo "</div>";
            $baris--;
        }
    } ?>
</body>
</html>