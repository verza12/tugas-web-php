<?php
require_once __DIR__ . '/../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_kelas = trim($_POST['kode_kelas'] ?? '');
    $nama_kelas = trim($_POST['nama_kelas'] ?? '');
    $tingkat = trim($_POST['tingkat'] ?? '');
    $wali_kelas = trim($_POST['wali_kelas'] ?? '');

    // Validasi input tidak boleh kosong dan tingkat harus 10, 11, atau 12
    if (empty($kode_kelas) || empty($nama_kelas) || !in_array($tingkat, ['10', '11', '12']) || empty($wali_kelas)) {
        echo "<script>alert('Semua field wajib diisi dan tingkat harus valid!'); window.history.back();</script>";
        exit;
    }

    $stmt = mysqli_prepare($koneksi, "INSERT INTO data_kelas (kode_kelas, nama_kelas, tingkat, wali_kelas) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $kode_kelas, $nama_kelas, $tingkat, $wali_kelas);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        echo "<script>alert('Data Kelas Berhasil Disimpan!'); window.location='../../public/admin/data-kelas/index.php';</script>";
    } else {
        mysqli_stmt_close($stmt);
        echo "<script>alert('Gagal Menyimpan Data Kelas!'); window.history.back();</script>";
    }
} else {
    header("Location: ../../public/admin/data-kelas/index.php");
    exit;
}
