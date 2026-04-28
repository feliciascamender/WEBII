<?php
$nilai = $hasil = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nilai = intval($_POST["nilai"]);

    $hasil = match(true){
        $nilai < 0     => "Input Tidak Valid",
        $nilai >= 1000 => "Anda Menginput Melebihi Limit Bilangan",
        $nilai < 10    => ["Nol", "Satuan"][$nilai == 0 ? 0 : 1],
        $nilai < 20    => "Belasan",
        $nilai < 100   => "Puluhan",
        default        => "Ratusan"
    };
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <span>Nilai: </span>
        <input type="text" name="nilai" value="<?= htmlspecialchars($nilai) ?>"> <br>
        <input type="submit" value="Konversi">
    </form>
 
    <?php if($nilai !== "") echo "<h2>Hasil: $hasil</h2>"; ?>
</body>
</html>