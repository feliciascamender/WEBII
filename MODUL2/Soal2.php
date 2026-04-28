<?php
$fields = [
    "nama"    => ["label" => "Nama",          "type" => "text",  "value" => "", "error" => ""],
    "nim"     => ["label" => "NIM",           "type" => "text",  "value" => "", "error" => ""],
    "kelamin" => ["label" => "Jenis Kelamin", "type" => "radio", "value" => "", "error" => ""],
];

$show_output = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai input
    foreach ($fields as $key => &$field) {
        $field["value"] = isset($_POST[$key]) ? $_POST[$key] : "";
        if (empty($field["value"])) {
            $field["error"] = "{$field['label']} tidak boleh kosong";
        }
    }
    unset($field);

    // Cek semua error
    $has_error = array_filter(array_column($fields, "error"));
    $show_output = empty($has_error);
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

        <?php foreach ($fields as $key => $field): ?>

            <label><?= $field["label"] ?>: </label>
            <span style="color: red;">*</span>
            <span style="color: red;"><?= $field["error"] ?></span><br>

            <?php if ($field["type"] === "radio"): ?>
                <?php
                $options = ["Laki-laki", "Perempuan"];
                foreach ($options as $option):
                    $id      = strtolower(str_replace("-", "_", $option));
                    $checked = $field["value"] === $option ? "checked" : "";
                ?>
                    <input type="radio" name="<?= $key ?>" id="<?= $id ?>"
                           value="<?= $option ?>" <?= $checked ?>>
                    <label for="<?= $id ?>"><?= $option ?></label><br>
                <?php endforeach; ?>

            <?php else: ?>
                <input type="text" name="<?= $key ?>"
                       value="<?= htmlspecialchars($field["value"]) ?>"><br>
            <?php endif; ?>

        <?php endforeach; ?>

        <input type="submit">
    </form>

    <?php if ($show_output): ?>
        <h2>Output</h2>
        <?php foreach ($fields as $field): ?>
            <?= htmlspecialchars($field["value"]) ?> <br>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>