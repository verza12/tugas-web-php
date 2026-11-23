<?php
session_start();
require_once __DIR__ . '/../../config/koneksi.php';

function gagal($pesan) {
    echo "<script>alert(" . json_encode($pesan) . "); window.history.back();</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../public/admin/data-siswa/index.php');
    exit;
}

$csrf = $_POST['csrf_token'] ?? '';
if (empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $csrf)) {
    gagal('Permintaan tidak valid.');
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id || $id < 1) gagal('ID siswa tidak valid.');

$stmt = mysqli_prepare($koneksi, 'SELECT foto_siswa FROM data_siswa WHERE id = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$data = mysqli_stmt_get_result($stmt)->fetch_assoc();
mysqli_stmt_close($stmt);
if (!$data) gagal('Data siswa tidak ditemukan.');

$stmt = mysqli_prepare($koneksi, 'DELETE FROM data_siswa WHERE id = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 'i', $id);
$deleted = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if (!$deleted) gagal('Data siswa gagal dihapus.');

$photo = basename((string) $data['foto_siswa']);
$upload_dir = realpath(__DIR__ . '/../../public/assets/uploads');
if ($photo !== '' && $upload_dir !== false) {
    $photo_path = realpath($upload_dir . DIRECTORY_SEPARATOR . $photo);
    if ($photo_path !== false && strncmp($photo_path, $upload_dir . DIRECTORY_SEPARATOR, strlen($upload_dir . DIRECTORY_SEPARATOR)) === 0 && is_file($photo_path)) {
        @unlink($photo_path);
    }
}

echo "<script>alert('Data siswa berhasil dihapus.'); window.location='../../public/admin/data-siswa/index.php';</script>";
