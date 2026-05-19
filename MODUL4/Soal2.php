<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; margin-top: 10px; }
        th { border: 1px solid #333; background-color: #eebaf3; font-weight: 100;}  
        </style>
</head>
<body>

<?php


$mahasiswa = [
    ["nama" => "Rafayel", "nim" => "2101001", "uts" => 87, "uas" => 65],
    ["nama" => "Caleb", "nim" => "2101002", "uts" => 76, "uas" => 79],
    ["nama" => "Sylus", "nim" => "2101003", "uts" => 50, "uas" => 41],
    ["nama" => "Jessica", "nim" => "2101004", "uts" => 60, "uas" => 75],
];

foreach ($mahasiswa as &$mhs) {
    $mhs['nilai_akhir'] = (0.4 * $mhs['uts']) + (0.6 * $mhs['uas']);

    $na = $mhs['nilai_akhir'];
    if ($na >= 80) {
        $mhs['grade'] = 'A';
    } elseif ($na >= 70) {
        $mhs['grade'] = 'B';
    } elseif ($na >= 60) {
        $mhs['grade'] = 'C';
    } elseif ($na >= 50) {
        $mhs['grade'] = 'D';
    } else {
        $mhs['grade'] = 'E';
    }
}
unset($mhs);

echo '<table border="1" cellpadding="7">';
echo '<tr>
    <th>Nama</th>
    <th>NIM</th>
    <th>Nilai UTS</th>
    <th>Nilai UAS</th>
    <th>Nilai Akhir</th>
    <th>Grade</th>
</tr>';

foreach ($mahasiswa as $mhs) {
    echo '<tr>';
    echo '<td>' . $mhs['nama'] . '</td>';
    echo '<td>' . $mhs['nim'] . '</td>';
    echo '<td>' . $mhs['uts'] . '</td>';
    echo '<td>' . $mhs['uas'] . '</td>';
    echo '<td>' . $mhs['nilai_akhir'] . '</td>';
    echo '<td>' . $mhs['grade'] . '</td>';
    echo '</tr>';
}
echo '</table>';
?>

</body>
</html>