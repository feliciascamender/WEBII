<?php
$models = [
    "S22" => "Samsung Galaxy S22",
    "S22+" => "Samsung Galaxy S22+",
    "A03" => "Samsung Galaxy A03",
    "xcover5" => "Samsung Galaxy Xcover 5"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td{
            border: 1px solid black;
        }
        th {
            background-color: pink;
        }
    </style>
</head>
<body>
    <table>
        <tr><th><h2>Daftar SMartphone Samsung</h2></th></tr>
        <?php
        foreach($models as $key => $name) {
            echo "<tr><td> {$models[$key]} </td></tr>";
        }
        ?>
    </table>
</body>
</html>


