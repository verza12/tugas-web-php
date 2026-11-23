<?php
session_start();
require_once __DIR__ . '/../../config/koneksi.php';

function gagal($pesan) {
    echo "<script>alert(" . json_encode($pesan) . "); window.history.back();</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../public/admin/data-guru/index.php');
    exit;
}

$csrf = $_POST['csrf_token'] ?? '';
if (empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $csrf)) {
    gagal('Permintaan tidak valid.');
}

$id_guru = isset($_POST['id_guru']) ? intval($_POST['id_guru']) : 0;
if ($id_guru < 1) gagal('ID guru tidak valid.');

$stmt = mysqli_prepare($koneksi, 'SELECT id_guru FROM data_guru WHERE id_guru = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 'i', $id_guru);
mysqli_stmt_execute($stmt);
$data = mysqli_stmt_get_result($stmt)->fetch_assoc();
mysqli_stmt_close($stmt);
if (!$data) gagal('Data guru tidak ditemukan.');

$stmt = mysqli_prepare($koneksi, 'DELETE FROM data_guru WHERE id_guru = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 'i', $id_guru);
$deleted = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if (!$deleted) gagal('Data guru gagal dihapus.');

echo "<script>alert('Data guru berhasil dihapus.'); window.location='../../public/admin/data-guru/index.php';</script>";
