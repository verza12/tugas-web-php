<?php
require_once __DIR__ . '/../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nisn = mysqli_real_escape_string($koneksi, $_POST['nisn']);
    $nis = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $tempat_lahir = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']);
    $tanggal_lahir = mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']);
    $agama = mysqli_real_escape_string($koneksi, $_POST['agama']);
    $nomor_telepon = mysqli_real_escape_string($koneksi, $_POST['nomor_telepon']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $foto_siswa = "";
    if (isset($_FILES['foto_siswa']) && $_FILES['foto_siswa']['error'] === UPLOAD_ERR_OK) {
        $nama_file = $_FILES['foto_siswa']['name'];
        $tmp_file = $_FILES['foto_siswa']['tmp_name'];
        $ekstensi = pathinfo($nama_file, PATHINFO_EXTENSION);
        $foto_siswa = time() . "_" . bin2hex(random_bytes(4)) . "." . $ekstensi;
        
        $upload_dir = "../../asset/img/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        move_uploaded_file($tmp_file, $upload_dir . $foto_siswa);
    }

    $stmt = mysqli_prepare($koneksi, "INSERT INTO data_siswa (nisn, nis, nama_lengkap, kelas, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, nomor_telepon, foto_siswa, alamat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssssssssss", $nisn, $nis, $nama_lengkap, $kelas, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $nomor_telepon, $foto_siswa, $alamat);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Data Berhasil Disimpan!'); window.location='../../public/admin/data-siswa.php';</script>";
    } else {
        echo "<script>alert('Gagal Menyimpan Data!'); window.history.back();</script>";
    }
    mysqli_stmt_close($stmt);
}
