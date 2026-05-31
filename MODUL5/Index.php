<?php include 'Koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="header">
        <a href="Index.php" class="header-logo">
            Perpustakaan
            <span>SISTEM MANAJEMEN</span>
        </a>
        <div class="header-ornament">⊹ ⊹ ⊹</div>
    </div>

    <div class="container-sm">
        <div class="card" style="text-align:center; padding: 48px 32px;">

            <h1 style="color:#f0deb4; font-family:'Cinzel',serif; 
                        font-size:32px; letter-spacing:4px; margin-bottom:8px;">
                Perpustakaan
            </h1>

            <p style="color:#a08060; letter-spacing:3px; 
                       font-size:13px; margin-bottom:8px;">
                SISTEM MANAJEMEN PERPUSTAKAAN
            </p>

            <div class="divider">✦</div>

            <div style="display:flex; flex-direction:column; gap:12px; margin-top:8px;">
                <a href="Member/Member.php" class="btn-tambah" 
                   style="text-align:center; padding:12px;">
                    Member
                </a>
                <a href="Buku/Buku.php" class="btn-tambah" 
                   style="text-align:center; padding:12px;">
                    Buku
                </a>
                <a href="Peminjaman/Peminjaman.php" class="btn-tambah" 
                   style="text-align:center; padding:12px;">
                    Peminjaman
                </a>
            </div>

        </div>
    </div>

</body>
</html>