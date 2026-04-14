<?php
$models = ["Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcovwe 5"];?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBII Soal4</title>
    <style>
        table, tr, td, th{
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <table>
        <tr><th>Daftar Smartphone Samsung</th></tr>
        <?php for($i = 0; $i < count($models); $i++) {
            echo "<tr><td>$models[$i]</td></tr>";}?>
    </table>
</body>
</html>


