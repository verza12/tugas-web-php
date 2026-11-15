 <?php
 include_once  '../../config/koneksi.php';
 include  '../../template/header-admin.php';
 include  '../../template/navbar-admin.php';
 
 ?> 
    <div class="container my-4">
      <div class="row mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <h4>Tambah Data Kelas</h4>
          <a href="data-kelas.html" class="btn-solid theme-success">Kembali</a>
        </div>
      </div>

      <form action="" method="post" enctype="multipart/form-data">
        <!-- kode kelas -->
        <div class="mb-3">
          <label for="kodeKelas" class="form-label fw-semibold">Kode Kelas</label>
          <input type="text" maxlength="7" class="form-control" id="kodeKelas" placeholder="Masukkan kode kelas" />
        </div>

        <!-- Input Nama Kelas -->
        <div class="mb-3">
          <label for="namaKelas" class="form-label fw-semibold">Nama Kelas</label>
          <input type="text" class="form-control" id="namaKelas" maxlength="50" placeholder="Masukkan nama kelas" />
        </div>

        <!-- Input Tingkat -->
        <div class="mb-3">
          <label for="tingkat" class="form-label fw-semibold">Tingkat</label>
          <select class="form-control" id="tingkat">
            <option selected disabled>Pilih tingkat...</option>
            <option value="10">X</option>
            <option value="11">XI</option>
            <option value="12">XII</option>
          </select>
        </div>

        <!-- Input Wali Kelas -->
        <div class="mb-4">
          <label for="waliKelas" class="form-label fw-semibold">Wali Kelas</label>
          <input type="text" class="form-control" id="waliKelas" placeholder="Masukkan nama wali kelas" />
        </div>

        <a href="data-siswa.html" type="button" class="btn-solid theme-secondary">Batal</a>
        <button type="reset" class="btn-solid theme-danger">Reset</button>
        <button type="submit" class="btn-solid theme-success">Simpan Data</button>
      </form>
    </div>

     <?php  include  '../../template/footer-admin.php'?>

