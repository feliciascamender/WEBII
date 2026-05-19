<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK401</title>
    <style>
        body {
             font-family: "Times New Roman", Times, serif;
             table { border-collapse: collapse; margin-top: 10px; }
             td { 
                border: 1px solid #333; padding: 8px 14px; text-align: center; 
            }
            .error { 
                color: red; margin-top: 10px; 
            }
            input[type="submit"] { 
                margin-top: 6px; padding: 4px 16px; 
            }
}
    </style>
</head>
<body>
    
<form method="POST">
    <label>Panjang:</label>
    <input type="number" name="panjang" value="<?= isset($_POST['panjang']) ? htmlspecialchars($_POST['panjang']) : '' ?>"><br>
    <label>Lebar:</label>
    <input type="number" name="lebar" value="<?= isset($_POST['lebar']) ? htmlspecialchars($_POST['lebar']) : '' ?>"><br>
    <label>Nilai:</label>
    <input type="text" name="nilai" value="<?= isset($_POST['nilai']) ? htmlspecialchars($_POST['nilai']) : '' ?>"><br>
    <input type="submit" value="Cetak">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $nilai = $_POST['nilai'];
    
    $arr = explode(" ", $nilai);
    if (count($arr) != $panjang * $lebar) {
        echo '<p class="error">Panjang nilai tidak sesuai dengan ukuran matriks.</p>';
    } else {
        $matriks = [];
        for ($i = 0; $i < $panjang; $i++) {
            for ($j = 0; $j < $lebar; $j++) {
                $matriks[$i][$j] = $arr[$i * $lebar + $j];
            }
        }

        echo '<table>';
        for ($i = 0; $i < $panjang; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $lebar; $j++) {
                echo '<td>' . $matriks[$i][$j] . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}
?>
</body>
</html>