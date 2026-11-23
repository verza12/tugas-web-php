<?php
require_once __DIR__ . '/../../config/koneksi.php';

function gagal($pesan) {
    echo "<script>alert(" . json_encode($pesan) . "); window.history.back();</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../public/admin/data-guru/index.php');
    exit;
}

$id_guru = filter_input(INPUT_POST, 'id_guru', FILTER_VALIDATE_INT);
if (!$id_guru || $id_guru < 1) gagal('ID guru tidak valid.');

$required = ['nip', 'nama_guru', 'jenis_kelamin', 'nomor_telepon', 'email', 'alamat'];
foreach ($required as $field) {
    if (!isset($_POST[$field])) gagal('Data formulir tidak lengkap.');
}

$nip = trim($_POST['nip']);
$nama_guru = trim($_POST['nama_guru']);
$jenis_kelamin = $_POST['jenis_kelamin'];
$nomor_telepon = $_POST['nomor_telepon'];
$email = trim($_POST['email']);
$alamat = trim($_POST['alamat']);

if ($nip === '' || strlen($nip) > 20 || !preg_match('/^[0-9]+$/', $nip)) gagal('NIP wajib berupa angka maksimal 20 digit.');
if ($nama_guru === '' || strlen($nama_guru) > 100) gagal('Nama guru wajib diisi maksimal 100 karakter.');
if (!in_array($jenis_kelamin, ['Laki-Laki', 'Perempuan'], true)) gagal('Jenis kelamin tidak valid.');
if (!preg_match('/^[0-9]{1,15}$/', $nomor_telepon)) gagal('Nomor telepon wajib berupa angka maksimal 15 digit.');
if (strlen($email) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL)) gagal('Format email tidak valid.');
if (strlen($alamat) > 225) gagal('Alamat maksimal 225 karakter.');

$stmt = mysqli_prepare($koneksi, 'SELECT id_guru FROM data_guru WHERE id_guru = ?');
mysqli_stmt_bind_param($stmt, 'i', $id_guru);
mysqli_stmt_execute($stmt);
if (!mysqli_stmt_get_result($stmt)->fetch_assoc()) gagal('Data guru tidak ditemukan.');
mysqli_stmt_close($stmt);

$stmt = mysqli_prepare($koneksi, 'SELECT id_guru FROM data_guru WHERE nip = ? AND id_guru <> ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 'si', $nip, $id_guru);
mysqli_stmt_execute($stmt);
if (mysqli_stmt_get_result($stmt)->fetch_assoc()) gagal('NIP sudah digunakan guru lain.');
mysqli_stmt_close($stmt);

$stmt = mysqli_prepare($koneksi, 'UPDATE data_guru SET nip = ?, nama_guru = ?, jenis_kelamin = ?, nomor_telepon = ?, email = ?, alamat = ? WHERE id_guru = ?');
mysqli_stmt_bind_param($stmt, 'ssssssi', $nip, $nama_guru, $jenis_kelamin, $nomor_telepon, $email, $alamat, $id_guru);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    echo "<script>alert('Data guru berhasil diperbarui.'); window.location='../../public/admin/data-guru/index.php';</script>";
    exit;
}

mysqli_stmt_close($stmt);
gagal('Data guru gagal diperbarui.');
