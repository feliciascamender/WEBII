<?php
$nilai  = $dari = $ke = "";
$hasil  = null;

$satuan = [
    "celcius"    => ["label" => "Celcius",    "simbol" => "°C"],
    "fahrenheit" => ["label" => "Fahrenheit", "simbol" => "°F"],
    "reamur"     => ["label" => "Reamur",     "simbol" => "°Re"],
    "kelvin"     => ["label" => "Kelvin",     "simbol" => "K"],
];

// Rumus konversi ke Celcius dulu (sebagai basis)
$ke_celcius = [
    "celcius"    => fn($n) => $n,
    "fahrenheit" => fn($n) => ($n - 32) * 5 / 9,
    "reamur"     => fn($n) => $n * 5 / 4,
    "kelvin"     => fn($n) => $n - 273.15,
];

// Rumus konversi dari Celcius ke satuan tujuan
$dari_celcius = [
    "celcius"    => fn($c) => $c,
    "fahrenheit" => fn($c) => ($c * 9 / 5) + 32,
    "reamur"     => fn($c) => $c * 4 / 5,
    "kelvin"     => fn($c) => $c + 273.15,
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai = floatval($_POST["nilai"]);
    $dari  = $_POST["dari"] ?? "";
    $ke    = $_POST["ke"]   ?? "";

    if (isset($ke_celcius[$dari]) && isset($dari_celcius[$ke])) {
        $celcius = $ke_celcius[$dari]($nilai);
        $hasil   = $dari_celcius[$ke]($celcius);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Suhu</title>
</head>
<body>
    <form method="post">
        <span>Nilai :</span>
        <input type="text" name="nilai" value="<?= htmlspecialchars($nilai) ?>"> <br><br>

        <?php foreach (["dari" => "Dari", "ke" => "Ke"] as $name => $label): ?>
            <span><?= $label ?> :</span> <br>
            <?php foreach ($satuan as $value => $info):
                $checked = $$name == $value ? "checked" : "";
            ?>
                <input type="radio" name="<?= $name ?>" 
                       id="<?= $name ?>_<?= $value ?>" 
                       value="<?= $value ?>" <?= $checked ?>>
                <label for="<?= $name ?>_<?= $value ?>"><?= $info["label"] ?></label> <br>
            <?php endforeach; ?>
            <br>
        <?php endforeach; ?>

        <input type="submit" value="Konversi">
    </form>

    <?php if ($hasil !== null): ?>
        <h3>Hasil Konversi: <?= $hasil ?> <?= $satuan[$ke]["simbol"] ?></h3>
    <?php endif; ?>
</body>
</html>