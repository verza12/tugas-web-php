<?php
session_start();
require_once __DIR__ . '/../../config/koneksi.php';

function gagal($pesan) {
    echo "<script>alert(" . json_encode($pesan) . "); window.history.back();</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../public/admin/data-kelas/index.php');
    exit;
}

$csrf = $_POST['csrf_token'] ?? '';
if (empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $csrf)) {
    gagal('Permintaan tidak valid.');
}

$id_kelas = isset($_POST['id_kelas']) ? intval($_POST['id_kelas']) : 0;
if ($id_kelas < 1) gagal('ID kelas tidak valid.');

$stmt = mysqli_prepare($koneksi, 'SELECT id_kelas FROM data_kelas WHERE id_kelas = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 'i', $id_kelas);
mysqli_stmt_execute($stmt);
$data = mysqli_stmt_get_result($stmt)->fetch_assoc();
mysqli_stmt_close($stmt);
if (!$data) gagal('Data kelas tidak ditemukan.');

$stmt = mysqli_prepare($koneksi, 'DELETE FROM data_kelas WHERE id_kelas = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 'i', $id_kelas);
$deleted = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if (!$deleted) gagal('Data kelas gagal dihapus.');

echo "<script>alert('Data kelas berhasil dihapus.'); window.location='../../public/admin/data-kelas/index.php';</script>";
