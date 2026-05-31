<?php
include 'Koneksi.php';

//Buku CRUD
function getAllBuku($koneksi) {
    $query = "SELECT * FROM buku";
    $result = mysqli_query($koneksi, $query);
    return $result;
}

function getBukuById($koneksi, $id) {
    $query = "SELECT * FROM buku WHERE id_buku = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function tambahBuku($koneksi, $judul, $penulis, $penerbit, $tahun) {
    $query = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) 
              VALUES ('$judul', '$penulis', '$penerbit', '$tahun')";
    return mysqli_query($koneksi, $query);
}

function updateBuku($koneksi, $id, $judul, $penulis, $penerbit, $tahun) {
    $query = "UPDATE buku SET 
              judul_buku='$judul', 
              penulis='$penulis', 
              penerbit='$penerbit', 
              tahun_terbit='$tahun' 
              WHERE id_buku=$id";
    return mysqli_query($koneksi, $query);
}

function deleteBuku($koneksi, $id) {
    $query = "DELETE FROM buku WHERE id_buku = $id";
    return mysqli_query($koneksi, $query);
}

//Member CRUD
function getAllMember($koneksi) {
    $query = "SELECT * FROM member";
    $result = mysqli_query($koneksi, $query);
    return $result;
}

function getMemberById($koneksi, $id) {
    $query = "SELECT * FROM member WHERE id_member = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function tambahMember($koneksi, $nama, $email, $no_hp, $alamat) {
    $query = "INSERT INTO member (nama_member, email, no_hp, alamat) 
              VALUES ('$nama', '$email', '$no_hp', '$alamat')";
    return mysqli_query($koneksi, $query);
}

function updateMember($koneksi, $id, $nama, $email, $no_hp, $alamat) {
    $query = "UPDATE member SET 
              nama_member='$nama', 
              email='$email', 
              no_hp='$no_hp', 
              alamat='$alamat' 
              WHERE id_member=$id";
    return mysqli_query($koneksi, $query);
}

function deleteMember($koneksi, $id) {
    $query = "DELETE FROM member WHERE id_member = $id";
    return mysqli_query($koneksi, $query);
}

// peminjaman CRUD
function getAllPeminjaman($koneksi) {
    $query = "SELECT p.*, b.judul_buku, m.nama_member 
              FROM peminjaman p
              JOIN buku b ON p.id_buku = b.id_buku
              JOIN member m ON p.id_member = m.id_member";
    $result = mysqli_query($koneksi, $query);
    return $result;
}

function getPeminjamanById($koneksi, $id) {
    $query = "SELECT p.*, b.judul_buku, m.nama_member 
              FROM peminjaman p
              JOIN buku b ON p.id_buku = b.id_buku
              JOIN member m ON p.id_member = m.id_member
              WHERE p.id_peminjaman = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function tambahPeminjaman($koneksi, $id_buku, $id_member, $tgl_pinjam, $tgl_kembali) {
    $query = "INSERT INTO peminjaman (id_buku, id_member, tanggal_pinjam, tanggal_kembali) 
              VALUES ('$id_buku', '$id_member', '$tgl_pinjam', '$tgl_kembali')";
    return mysqli_query($koneksi, $query);
}

function updatePeminjaman($koneksi, $id, $id_buku, $id_member, $tgl_pinjam, $tgl_kembali) {
    $query = "UPDATE peminjaman SET 
              id_buku='$id_buku', 
              id_member='$id_member', 
              tanggal_pinjam='$tgl_pinjam', 
              tanggal_kembali='$tgl_kembali' 
              WHERE id_peminjaman=$id";
    return mysqli_query($koneksi, $query);
}

function deletePeminjaman($koneksi, $id) {
    $query = "DELETE FROM peminjaman WHERE id_peminjaman = $id";
    return mysqli_query($koneksi, $query);
}