<?php
require_once __DIR__ . '/../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_kelas = mysqli_real_escape_string($koneksi, $_POST['kode_kelas']);
    $nama_kelas = mysqli_real_escape_string($koneksi, $_POST['nama_kelas']);
    $tingkat = mysqli_real_escape_string($koneksi, $_POST['tingkat']);
    $wali_kelas = mysqli_real_escape_string($koneksi, $_POST['wali_kelas']);

    $stmt = mysqli_prepare($koneksi, "INSERT INTO data_kelas (kode_kelas, nama_kelas, tingkat, wali_kelas) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $kode_kelas, $nama_kelas, $tingkat, $wali_kelas);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Data Kelas Berhasil Disimpan!'); window.location='../../public/admin/data-kelas.php';</script>";
    } else {
        echo "<script>alert('Gagal Menyimpan Data Kelas!'); window.history.back();</script>";
    }
    mysqli_stmt_close($stmt);
}
