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
    $nomor_telepon = $_POST['nomor_telepon'] ?? '';
    if (!preg_match('/^[0-9]{1,13}$/', $nomor_telepon)) {
        echo "<script>alert('Nomor telepon harus berupa angka dengan panjang maksimal 13 digit.'); window.history.back();</script>";
        exit;
    }
    $nomor_telepon = mysqli_real_escape_string($koneksi, $nomor_telepon);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $foto_siswa = "";
    $upload_dir = __DIR__ . '/../../public/upload/';
    
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (isset($_FILES['foto_siswa']) && $_FILES['foto_siswa']['error'] === UPLOAD_ERR_OK) {
        $nama_file = $_FILES['foto_siswa']['name'];
        $tmp_file = $_FILES['foto_siswa']['tmp_name'];
        $ekstensi = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        if (in_array($ekstensi, $allowed_extensions)) {
            $foto_siswa = time() . "_" . bin2hex(random_bytes(4)) . "." . $ekstensi;
            $target_file = $upload_dir . $foto_siswa;
            
            if (!move_uploaded_file($tmp_file, $target_file)) {
                echo "<script>alert('Gagal mengupload foto!'); window.history.back();</script>";
                exit;
            }
        } else {
            echo "<script>alert('Format foto harus jpg, jpeg, atau png!'); window.history.back();</script>";
            exit;
        }
    }

    $stmt = mysqli_prepare($koneksi, "INSERT INTO data_siswa (nisn, nis, nama_lengkap, kelas, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, nomor_telepon, foto_siswa, alamat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssssssssss", $nisn, $nis, $nama_lengkap, $kelas, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $nomor_telepon, $foto_siswa, $alamat);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        echo "<script>alert('Data Berhasil Disimpan!'); window.location='../../public/admin/data-siswa.php';</script>";
    } else {
        if (!empty($foto_siswa) && file_exists($upload_dir . $foto_siswa)) {
            unlink($upload_dir . $foto_siswa);
        }
        mysqli_stmt_close($stmt);
        echo "<script>alert('Gagal Menyimpan Data ke Database!'); window.history.back();</script>";
    }
}
