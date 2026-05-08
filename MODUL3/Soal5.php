<?php
$input     = isset($_POST['kata']) ? $_POST['kata'] : '';
$submitted = isset($_POST['submit']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK305</title>
    <style>
        h2 { font-weight: bold; }
    </style>
</head>
<body>
    <form method="POST">
        <input type="text" name="kata" value="<?= htmlspecialchars($input) ?>">
        <button type="submit" name="submit">submit</button>
    </form>

    <?php if ($submitted && $input !== ''): ?>
        <h2>Input:</h2>
        <p><?= htmlspecialchars($input) ?></p>

        <h2>Output:</h2>
        <?php
        $panjang = strlen($input);
        $output  = '';

        $i = 0;
        while ($i < $panjang) {
            // Ambil karakter, jadikan lowercase sebagai dasar
            $huruf = strtolower($input[$i]);

            // Cetak karakter pertama = UPPERCASE
            $output .= strtoupper($huruf);

            // Cetak sisa (panjang - 1) karakter = lowercase
            $j = 1;
            while ($j < $panjang) {
                $output .= $huruf;
                $j++;
            }

            $i++;
        }

        echo "<p>" . $output . "</p>";
        ?>
    <?php endif; ?>
</body>
</html>