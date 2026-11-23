 <?php
 include_once  '../../../config/koneksi.php';
 include  '../../../templates/admin/header.php';
 include  '../../../templates/admin/navbar.php';
 
 ?> 
    <div class="container my-4">
      <div class="row mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <h4>Tambah Data Kelas</h4>
          <a href="index.php" class="btn-solid theme-success">Kembali</a>
        </div>
      </div>

      <form action="../../../actions/admin/proses-tambah-kelas.php" method="post">
        <!-- kode kelas -->
        <div class="mb-3">
          <label for="kode_kelas" class="form-label fw-semibold">Kode Kelas</label>
          <input type="text" maxlength="7" class="form-control" id="kode_kelas" name="kode_kelas" placeholder="Masukkan kode kelas" required />
        </div>

        <!-- Input Nama Kelas -->
        <div class="mb-3">
          <label for="nama_kelas" class="form-label fw-semibold">Nama Kelas</label>
          <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" maxlength="50" placeholder="Masukkan nama kelas" required />
        </div>

        <!-- Input Tingkat -->
        <div class="mb-3">
          <label for="tingkat" class="form-label fw-semibold">Tingkat</label>
          <select class="form-control" id="tingkat" name="tingkat" required>
            <option selected disabled>Pilih tingkat...</option>
            <option value="10">X</option>
            <option value="11">XI</option>
            <option value="12">XII</option>
          </select>
        </div>

        <!-- Input Wali Kelas -->
        <div class="mb-4">
          <label for="wali_kelas" class="form-label fw-semibold">Wali Kelas</label>
          <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" placeholder="Masukkan nama wali kelas" required />
        </div>

        <a href="index.php" class="btn-solid theme-secondary">Batal</a>
        <button type="reset" class="btn-solid theme-danger">Reset</button>
        <button type="submit" class="btn-solid theme-success">Simpan Data</button>
      </form>
    </div>

     <?php  include  '../../../templates/admin/footer.php'?>

