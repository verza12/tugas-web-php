<?php
require_once __DIR__ . '/../../config/koneksi.php';

function gagal($pesan) {
    echo "<script>alert(" . json_encode($pesan) . "); window.history.back();</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../public/admin/data-siswa/index.php');
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id || $id < 1) gagal('ID siswa tidak valid.');

$fields = ['nisn', 'nis', 'nama_lengkap', 'kelas', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'nomor_telepon', 'alamat'];
foreach ($fields as $field) {
    if (!isset($_POST[$field])) gagal('Data formulir tidak lengkap.');
}

$nisn = trim($_POST['nisn']);
$nis = trim($_POST['nis']);
$nama_lengkap = trim($_POST['nama_lengkap']);
$kelas = trim($_POST['kelas']);
$jenis_kelamin = $_POST['jenis_kelamin'];
$tempat_lahir = trim($_POST['tempat_lahir']);
$tanggal_lahir = $_POST['tanggal_lahir'];
$agama = $_POST['agama'];
$nomor_telepon = $_POST['nomor_telepon'];
$alamat = trim($_POST['alamat']);

$allowed_agama = ['Islam', 'Budha', 'Kristen', 'Protestan', 'Hindu', 'Kong Hu Chu'];
$valid_date = DateTime::createFromFormat('Y-m-d', $tanggal_lahir);

if (!preg_match('/^[0-9]{1,10}$/', $nisn)) gagal('NISN harus berupa maksimal 10 digit angka.');
if (!preg_match('/^[0-9.]{1,10}$/', $nis)) gagal('NIS tidak valid.');
if ($nama_lengkap === '' || strlen($nama_lengkap) > 150) gagal('Nama lengkap wajib diisi.');
if ($kelas === '' || strlen($kelas) > 15) gagal('Kelas tidak valid.');
if (!in_array($jenis_kelamin, ['L', 'P'], true)) gagal('Jenis kelamin tidak valid.');
if ($tempat_lahir === '' || strlen($tempat_lahir) > 50) gagal('Tempat lahir tidak valid.');
if (!$valid_date || $valid_date->format('Y-m-d') !== $tanggal_lahir) gagal('Tanggal lahir tidak valid.');
if (!in_array($agama, $allowed_agama, true)) gagal('Agama tidak valid.');
if (!preg_match('/^[0-9]{1,13}$/', $nomor_telepon)) gagal('Nomor telepon harus berupa maksimal 13 digit angka.');
if ($alamat === '') gagal('Alamat wajib diisi.');

$stmt = mysqli_prepare($koneksi, 'SELECT id FROM data_siswa WHERE id = ?');
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
if (!mysqli_stmt_get_result($stmt)->fetch_assoc()) gagal('Data siswa tidak ditemukan.');
mysqli_stmt_close($stmt);

foreach ([['nisn', $nisn], ['nis', $nis]] as [$column, $value]) {
    $stmt = mysqli_prepare($koneksi, "SELECT id FROM data_siswa WHERE $column = ? AND id <> ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 'si', $value, $id);
    mysqli_stmt_execute($stmt);
    if (mysqli_stmt_get_result($stmt)->fetch_assoc()) gagal(ucfirst($column) . ' sudah digunakan siswa lain.');
    mysqli_stmt_close($stmt);
}

$old_photo = '';
$stmt = mysqli_prepare($koneksi, 'SELECT foto_siswa FROM data_siswa WHERE id = ?');
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$old_photo = mysqli_stmt_get_result($stmt)->fetch_assoc()['foto_siswa'] ?? '';
mysqli_stmt_close($stmt);

$new_photo = $old_photo;
$upload_dir = __DIR__ . '/../../public/assets/uploads/';
$uploaded_new_photo = '';
if (isset($_FILES['foto_siswa']) && $_FILES['foto_siswa']['error'] !== UPLOAD_ERR_NO_FILE) {
    if ($_FILES['foto_siswa']['error'] !== UPLOAD_ERR_OK) gagal('Upload foto gagal.');
    if ($_FILES['foto_siswa']['size'] > 5 * 1024 * 1024) gagal('Ukuran foto maksimal 5 MB.');
    $extension = strtolower(pathinfo($_FILES['foto_siswa']['name'], PATHINFO_EXTENSION));
    $mime = (new finfo(FILEINFO_MIME_TYPE))->file($_FILES['foto_siswa']['tmp_name']);
    $allowed = ['jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png'];
    if (!isset($allowed[$extension]) || $allowed[$extension] !== $mime) gagal('Format foto tidak valid.');
    if (!is_dir($upload_dir) && !mkdir($upload_dir, 0777, true)) gagal('Folder upload tidak tersedia.');
    $new_photo = time() . '_' . bin2hex(random_bytes(4)) . '.' . $extension;
    if (!move_uploaded_file($_FILES['foto_siswa']['tmp_name'], $upload_dir . $new_photo)) gagal('Foto gagal disimpan.');
    $uploaded_new_photo = $new_photo;
}

$stmt = mysqli_prepare($koneksi, 'UPDATE data_siswa SET nisn = ?, nis = ?, nama_lengkap = ?, kelas = ?, jenis_kelamin = ?, tempat_lahir = ?, tanggal_lahir = ?, agama = ?, nomor_telepon = ?, foto_siswa = ?, alamat = ? WHERE id = ?');
mysqli_stmt_bind_param($stmt, 'sssssssssssi', $nisn, $nis, $nama_lengkap, $kelas, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $nomor_telepon, $new_photo, $alamat, $id);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    if ($uploaded_new_photo && $old_photo && is_file($upload_dir . basename($old_photo))) unlink($upload_dir . basename($old_photo));
    echo "<script>alert('Data siswa berhasil diperbarui.'); window.location='../../public/admin/data-siswa/index.php';</script>";
    exit;
}

mysqli_stmt_close($stmt);
if ($uploaded_new_photo && is_file($upload_dir . $uploaded_new_photo)) unlink($upload_dir . $uploaded_new_photo);
gagal('Data siswa gagal diperbarui.');
