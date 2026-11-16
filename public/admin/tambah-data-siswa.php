 <?php
 include_once  '../../config/koneksi.php';
 include  '../../template/header-admin.php';
 include  '../../template/navbar-admin.php';
 
 ?> 
    <div class="container my-4">
      <div class="row mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <h4>Tambah Data Siswa</h4>
          <a href="data-siswa.html" class="btn-solid theme-success">Kembali</a>
        </div>
      </div>

      <form action="../../action/admin/proses-tambah-siswa.php" method="post" enctype="multipart/form-data">
        <!-- NISN -->
        <div class="mb-3">
          <label class="form-label" for="nisn">NISN</label>
          <input class="form-control" type="text" inputmode="numeric" id="nisn" name="nisn" placeholder="10 digit angka" pattern="[0-9]{10}" minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required />
        </div>

        <!-- NIS -->
        <div class="mb-3">
          <label class="form-label" for="nis">NIS</label>
          <input class="form-control" type="text" inputmode="numeric" oninput="formatNIS(this)" pattern="^[0-9]\.[0-9]{2}\.[0-9]{5}$" id="nis" name="nis" placeholder="Contoh: 1.22.33333" maxlength="10" required />
        </div>

        <!-- Nama siswa -->
        <div class="mb-3">
          <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
          <input class="form-control" type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" minlength="3" maxlength="100" required />
        </div>

        <!-- Kelas -->
        <div class="mb-3">
          <label class="form-label" for="kelas">Pilih Kelas</label>
          <select class="form-control" name="kelas" id="kelas" required>
            <option value="" disabled selected>Pilih Kelas</option>
            <option value="X RPL 1">X RPL 1</option>
            <option value="X RPL 2">X RPL 2</option>
            <option value="XI RPL 1">XI RPL 1</option>
            <option value="XI RPL 2">XI RPL 2</option>
            <option value="XII RPL 1">XII RPL 1</option>
            <option value="XII RPL 2">XII RPL 2</option>
          </select>
        </div>

        <!-- Kelamin -->
        <div class="mb-3">
          <label class="form-label d-block">Jenis Kelamin</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="kelaminL" name="jenis_kelamin" value="L" required />
            <label class="form-check-label" for="kelaminL">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="kelaminP" name="jenis_kelamin" value="P" required />
            <label class="form-check-label" for="kelaminP">Perempuan</label>
          </div>
        </div>

        <!-- Tempat lahir -->
        <div class="mb-3">
          <label class="form-label" for="tempat_lahir">Tempat lahir</label>
          <input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir" placeholder="min. 4 karakter, maks. 50 karakter" minlength="4" maxlength="50" required />
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-3">
          <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
          <input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir" required />
        </div>

        <!-- Agama -->
        <div class="mb-3">
          <label class="form-label" for="agama">Agama</label>
          <select class="form-control" name="agama" id="agama" required>
            <option value="" disabled selected>Pilih Agama</option>
            <option value="Islam">Islam</option>
            <option value="Budha">Budha</option>
            <option value="Hindu">Hindu</option>
            <option value="Kristen">Kristen</option>
            <option value="Katolik">Katolik</option>
            <option value="Konghucu">Konghucu</option>
          </select>
        </div>

        <!-- Telepon -->
        <div class="mb-3">
          <label class="form-label" for="nomor_telepon">Nomor Telepon</label>
          <input class="form-control" type="tel" id="nomor_telepon" name="nomor_telepon" placeholder="Contoh: 08123456789" required />
        </div>

        <!-- Foto -->
        <div class="mb-3">
          <label class="form-label" for="foto_siswa">Foto Siswa</label>
          <input class="form-control" type="file" id="foto_siswa" name="foto_siswa" accept=".jpg, .jpeg, .png" required />
        </div>

        <!-- Alamat -->
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" rows="4" minlength="10" maxlength="200" required></textarea>
        </div>

        <a href="data-siswa.php" class="btn-solid theme-secondary">Batal</a>
        <button type="reset" class="btn-solid theme-danger">Reset</button>
        <button type="submit" class="btn-solid theme-success">Simpan Data</button>
      </form>
    </div>

   <?php  include  '../../template/footer-admin.php'?>
