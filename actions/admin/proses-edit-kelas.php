<?php
require_once __DIR__ . '/../../config/koneksi.php';

function gagal($pesan) {
    echo "<script>alert(" . json_encode($pesan) . "); window.history.back();</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../public/admin/data-kelas/index.php');
    exit;
}

$id_kelas = isset($_POST['id_kelas']) ? intval($_POST['id_kelas']) : 0;
if ($id_kelas < 1) gagal('ID kelas tidak valid.');

$required = ['kode_kelas', 'nama_kelas', 'tingkat', 'wali_kelas'];
foreach ($required as $field) {
    if (!isset($_POST[$field])) gagal('Data formulir tidak lengkap.');
}

$kode_kelas = trim($_POST['kode_kelas']);
$nama_kelas = trim($_POST['nama_kelas']);
$tingkat = $_POST['tingkat'];
$wali_kelas = trim($_POST['wali_kelas']);

if ($kode_kelas === '' || strlen($kode_kelas) > 7) gagal('Kode kelas wajib diisi maksimal 7 karakter.');
if ($nama_kelas === '' || strlen($nama_kelas) > 30) gagal('Nama kelas wajib diisi maksimal 30 karakter.');
if (!in_array($tingkat, ['10', '11', '12'], true)) gagal('Tingkat tidak valid.');
if ($wali_kelas === '' || strlen($wali_kelas) > 100) gagal('Wali kelas wajib diisi maksimal 100 karakter.');

// Cek keberadaan ID
$stmt = mysqli_prepare($koneksi, 'SELECT id_kelas FROM data_kelas WHERE id_kelas = ?');
mysqli_stmt_bind_param($stmt, 'i', $id_kelas);
mysqli_stmt_execute($stmt);
if (!mysqli_stmt_get_result($stmt)->fetch_assoc()) gagal('Data kelas tidak ditemukan.');
mysqli_stmt_close($stmt);

// Cek duplikasi kode_kelas kecuali ID sendiri
$stmt = mysqli_prepare($koneksi, 'SELECT id_kelas FROM data_kelas WHERE kode_kelas = ? AND id_kelas <> ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 'si', $kode_kelas, $id_kelas);
mysqli_stmt_execute($stmt);
if (mysqli_stmt_get_result($stmt)->fetch_assoc()) gagal('Kode kelas sudah digunakan kelas lain.');
mysqli_stmt_close($stmt);

// Jalankan update
$stmt = mysqli_prepare($koneksi, 'UPDATE data_kelas SET kode_kelas = ?, nama_kelas = ?, tingkat = ?, wali_kelas = ? WHERE id_kelas = ?');
mysqli_stmt_bind_param($stmt, 'ssssi', $kode_kelas, $nama_kelas, $tingkat, $wali_kelas, $id_kelas);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    echo "<script>alert('Data kelas berhasil diperbarui.'); window.location='../../public/admin/data-kelas/index.php';</script>";
    exit;
}

mysqli_stmt_close($stmt);
gagal('Data kelas gagal diperbarui.');
