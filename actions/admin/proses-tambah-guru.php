<?php
require_once __DIR__ . '/../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nama_guru = mysqli_real_escape_string($koneksi, $_POST['nama_guru']);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $nomor_telepon = mysqli_real_escape_string($koneksi, $_POST['nomor_telepon']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $stmt = mysqli_prepare($koneksi, "INSERT INTO data_guru (nip, nama_guru, jenis_kelamin, nomor_telepon, email, alamat) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssssss", $nip, $nama_guru, $jenis_kelamin, $nomor_telepon, $email, $alamat);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Data Guru Berhasil Disimpan!'); window.location='../../public/admin/data-guru/index.php';</script>";
    } else {
        echo "<script>alert('Gagal Menyimpan Data Guru!'); window.history.back();</script>";
    }
    mysqli_stmt_close($stmt);
}
