<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK403 - KRS Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 8px 14px; }
        th { background-color: #4a4a4a; color: white; text-align: center; }
        td { vertical-align: middle; }
        .center { text-align: center; }

        /* Warna kolom Keterangan */
        .keterangan-hijau {
            background-color: #28a745;
            color: white;
            text-align: center;
            font-weight: bold;
        }
        .keterangan-merah {
            background-color: #dc3545;
            color: white;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Data KRS Mahasiswa</h2>

<?php

$data = [
    [
        "no"   => 1,
        "nama" => "Ridho",
        "matkul" => [
            ["nama_mk" => "Pemrograman I",                  "sks" => 2],
            ["nama_mk" => "Praktikum Pemrograman I",        "sks" => 1],
            ["nama_mk" => "Pengantar Lingkungan Lahan Basah","sks" => 2],
            ["nama_mk" => "Arsitektur Komputer",            "sks" => 3],
        ]
    ],
    [
        "no"   => 2,
        "nama" => "Ratna",
        "matkul" => [
            ["nama_mk" => "Basis Data I",            "sks" => 2],
            ["nama_mk" => "Praktikum Basis Data I",  "sks" => 1],
            ["nama_mk" => "Kalkulus",                "sks" => 3],
        ]
    ],
    [
        "no"   => 3,
        "nama" => "Tono",
        "matkul" => [
            ["nama_mk" => "Rekayasa Perangkat Lunak",       "sks" => 3],
            ["nama_mk" => "Analisis dan Perancangan Sistem", "sks" => 3],
            ["nama_mk" => "Komputasi Awan",                 "sks" => 3],
            ["nama_mk" => "Kecerdasan Bisnis",              "sks" => 3],
        ]
    ],
];

foreach ($data as &$mhs) {
    $total = 0;
    // Loop semua mata kuliah milik mahasiswa ini, jumlahkan SKS-nya
    foreach ($mhs['matkul'] as $mk) {
        $total += $mk['sks'];
    }
    $mhs['total_sks']  = $total;
    // Keterangan: jika total SKS < 7 maka Revisi KRS, jika tidak maka Tidak Revisi
    $mhs['keterangan']       = ($total < 7) ? "Revisi KRS"      : "Tidak Revisi";
    // Tentukan class CSS untuk warna: merah = Revisi KRS, hijau = Tidak Revisi
    $mhs['keterangan_class'] = ($total < 7) ? "keterangan-merah" : "keterangan-hijau";
}
unset($mhs); // Putus referensi setelah foreach &

echo '<table>';
echo '<tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah Diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
      </tr>';

foreach ($data as $mhs) {
    $jumlah_mk = count($mhs['matkul']); // jumlah baris yang dibutuhkan (= jumlah matkul)

    foreach ($mhs['matkul'] as $index => $mk) {
        echo '<tr>';

        // Kolom No, Nama, Total SKS, Keterangan hanya pada baris pertama (index == 0)
        if ($index === 0) {
            echo '<td class="center" rowspan="' . $jumlah_mk . '">' . $mhs['no']          . '</td>';
            echo '<td rowspan="'                . $jumlah_mk . '">' . $mhs['nama']         . '</td>';
        }

        // Kolom mata kuliah & SKS selalu tampil tiap baris
        echo '<td>' . $mk['nama_mk'] . '</td>';
        echo '<td class="center">' . $mk['sks'] . '</td>';

        // Kolom Total SKS & Keterangan hanya pada baris pertama
        if ($index === 0) {
            echo '<td class="center" rowspan="' . $jumlah_mk . '">' . $mhs['total_sks'] . '</td>';
            echo '<td class="' . $mhs['keterangan_class'] . '" rowspan="' . $jumlah_mk . '">' . $mhs['keterangan'] . '</td>';
        }

        echo '</tr>';
    }
}

echo '</table>';
?>

</body>
</html>