<?php
include_once   __DIR__ . '/../../config/koneksi.php';
include  '../../templates/admin/header.php';
include  '../../templates/admin/navbar.php';

$jumlah_siswa = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM data_siswa"))['total'];
$jumlah_guru = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM data_guru"))['total'];
$jumlah_kelas = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM data_kelas"))['total'];
?> 

    <div class="container mt-5">
      <h1>DASBOR ADMIN</h1>
      <div class="row g-3 mt-3">
        <div class="col-md-4"><div class="card card-body"><h5>Jumlah Siswa</h5><h3><?= $jumlah_siswa; ?></h3></div></div>
        <div class="col-md-4"><div class="card card-body"><h5>Jumlah Guru</h5><h3><?= $jumlah_guru; ?></h3></div></div>
        <div class="col-md-4"><div class="card card-body"><h5>Jumlah Kelas</h5><h3><?= $jumlah_kelas; ?></h3></div></div>
      </div>
    </div>
 <?php
 include  '../../templates/admin/footer.php';
 ?>
