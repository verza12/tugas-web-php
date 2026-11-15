 <?php
 include_once  '../../config/koneksi.php';
 include  '../../template/header-admin.php';
 include  '../../template/navbar-admin.php';
 
 ?> 
    <div class="container mt-5">
      <div class="d-flex justify-content-between p-3 gap-2">
        <h5>data siswa</h5>

        <!-- Button trigger dialog Tambah -->
        <button type="button" class="btn-solid theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#dialog-tambah-data-siswa">Open dialog</button>

        <dialog class="dialog dialog-scrollable dialog-lg" id="dialog-tambah-data-siswa">
          <div class="dialog-header">
            <h1 class="dialog-title">Formulir Tambah Siswa</h1>
            <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
          </div>
          <!-- body dialog -->
          <div class="dialog-body">
            <form id="tambahdatasiswa" action="" method="post" enctype="multipart/form-data">
              <!-- NISN -->
              <div class="mb-3">
                <label class="form-label" for="nisn_tambah">NISN</label>
                <input class="form-control" type="text" inputmode="numeric" id="nisn_tambah" name="nisn" placeholder="10 digit angka" pattern="[0-9]{10}" minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
              </div>

              <!-- NIS -->
              <div class="mb-3">
                <label class="form-label" for="nis_tambah">NIS</label>
                <input class="form-control" type="text" inputmode="numeric" oninput="formatNIS(this)" pattern="^[0-9]\.[0-9]{2}\.[0-9]{5}$" id="nis_tambah" name="nis" placeholder="Contoh: 1.22.33333" maxlength="10" required />
              </div>

              <!-- Nama siswa -->
              <div class="mb-3">
                <label class="form-label" for="nama_tambah">Nama Siswa</label>
                <input class="form-control" type="text" id="nama_tambah" name="nama" placeholder="Masukkan nama lengkap" minlength="3" maxlength="100" required />
              </div>

              <!-- Kelas -->
              <div class="mb-3">
                <label class="form-label" for="kelas_tambah">Pilih Kelas</label>
                <select class="form-control" name="kelas" id="kelas_tambah" required>
                  <option value="" disabled selected>Pilih Kelas</option>
                  <option value="rpl1">XI RPL 1</option>
                  <option value="rpl2">XI RPL 2</option>
                </select>
              </div>

              <!-- Kelamin -->
              <div class="mb-3">
                <label class="form-label d-block">Jenis Kelamin</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="kelaminL_tambah" name="kelamin" value="Laki-laki" required />
                  <label class="form-check-label" for="kelaminL_tambah">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="kelaminP_tambah" name="kelamin" value="Perempuan" required />
                  <label class="form-check-label" for="kelaminP_tambah">Perempuan</label>
                </div>
              </div>

              <!-- Tempat lahir -->
              <div class="mb-3">
                <label class="form-label" for="tempatlahir_tambah">Tempat lahir</label>
                <input class="form-control" type="text" id="tempatlahir_tambah" name="tempatlahir" placeholder="min. 4 karakter, maks. 50 karakter" minlength="4" maxlength="50" required />
              </div>

              <!-- Tanggal Lahir -->
              <div class="mb-3">
                <label class="form-label" for="tanggalLahir_tambah">Tanggal Lahir</label>
                <input class="form-control" type="date" id="tanggalLahir_tambah" name="tanggalLahir" required />
              </div>

              <!-- Agama -->
              <div class="mb-3">
                <label class="form-label" for="agama_tambah">Agama</label>
                <select class="form-control" name="agama" id="agama_tambah" required>
                  <option value="" disabled selected>Pilih Agama</option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                  <option value="Katholik">Katholik</option>
                  <option value="Khong hu chu">Khong hu chu</option>
                </select>
              </div>

              <!-- Telepon -->
              <div class="mb-3">
                <label class="form-label" for="nomor_telepon_tambah">Nomor Telepon</label>
                <input class="form-control" type="tel" inputmode="numeric" pattern="^08[0-9]{8,11}$" minlength="10" maxlength="13" id="nomor_telepon_tambah" name="nomor_telepon" placeholder="Contoh: 08123456789" required />
              </div>

              <!-- Foto -->
              <div class="mb-3">
                <label class="form-label" for="foto_siswa_tambah">Foto Siswa</label>
                <input class="form-control" type="file" id="foto_siswa_tambah" name="foto_siswa" accept=".jpg, .jpeg, .png" required />
              </div>

              <!-- Alamat -->
              <div class="mb-3">
                <label for="alamat_tambah" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat_tambah" name="alamat" rows="4" minlength="10" maxlength="200" required></textarea>
              </div>
            </form>
          </div>
          <div class="dialog-footer">
            <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
            <button form="tambahdatasiswa" type="reset" class="btn-solid theme-secondary">Reset</button>
            <button form="tambahdatasiswa" type="submit" class="btn-solid theme-primary">Save changes</button>
          </div>
        </dialog>

        <a href="tambah-data-siswa.php" class="btn-solid theme-success">Tambah siswa</a>
      </div>

      <div class="row">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>NISN</th>
              <th>Nama Lengkap</th>
              <th>kelas</th>
              <th>L/P</th>
              <th>Nomor Telepon</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Baris 1 -->
            <tr>
              <td>1</td>
              <td>0986578</td>
              <td>ling starlek</td>
              <td>Xl RPL 1</td>
              <td>Laki Laki</td>
              <td>098875497865</td>
              <td>
                <div class="justify-content-center gap-1">
                  <!-- Detail Dialog -->
                  <button type="button" class="btn-solid btn-sm theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#detaildatasiswa">Detail</button>

                  <dialog class="dialog dialog-scrollable dialog-lg" id="detaildatasiswa">
                    <div class="dialog-header">
                      <h1 class="dialog-title">Detail Data Siswa</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                    </div>
                    <div class="dialog-body">
                      <div class="card card-row">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYGSmOrPWRd3g1ahbAQ7UPZVYgI2h0aYUpu3VXVnwWDw&s=10" width="170" height="180" alt="gambar" />
                        <div class="card-body">
                          <h4 class="card-title">Ling Starlek</h4>
                          <p class="card-text">dia adalah seorang cosplayer ling yang dijadikan meme</p>
                          <p class="card-text"><small class="fg-2">Update 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                    <div class="dialog-footer">
                      <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
                    </div>
                  </dialog>

                  <!-- Edit Dialog 1 -->
                  <button type="button" class="btn-solid btn-sm theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#edit-data-siswa1">Edit</button>

                  <dialog class="dialog dialog-scrollable dialog-lg" id="edit-data-siswa1">
                    <div class="dialog-header">
                      <h1 class="dialog-title">Edit Data siswa</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                    </div>
                    <div class="dialog-body">
                      <form id="editdatasiswa1" action="" method="post" enctype="multipart/form-data">
                        <!-- NISN -->
                        <div class="mb-3">
                          <label class="form-label" for="nisn_edit1">NISN</label>
                          <input class="form-control" type="text" inputmode="numeric" id="nisn_edit1" name="nisn" placeholder="10 digit angka" pattern="[0-9]{10}" minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                        </div>

                        <!-- NIS -->
                        <div class="mb-3">
                          <label class="form-label" for="nis_edit1">NIS</label>
                          <input class="form-control" type="text" inputmode="numeric" oninput="formatNIS(this)" pattern="^[0-9]\.[0-9]{2}\.[0-9]{5}$" id="nis_edit1" name="nis" placeholder="Contoh: 1.22.33333" maxlength="10" required />
                        </div>

                        <!-- Nama siswa -->
                        <div class="mb-3">
                          <label class="form-label" for="nama_edit1">Nama Siswa</label>
                          <input class="form-control" type="text" id="nama_edit1" name="nama" placeholder="Masukkan nama lengkap" minlength="3" maxlength="100" required />
                        </div>

                        <!-- Kelas -->
                        <div class="mb-3">
                          <label class="form-label" for="kelas_edit1">Pilih Kelas</label>
                          <select class="form-control" name="kelas" id="kelas_edit1" required>
                            <option value="" disabled selected>Pilih Kelas</option>
                            <option value="rpl1">XI RPL 1</option>
                            <option value="rpl2">XI RPL 2</option>
                          </select>
                        </div>

                        <!-- Kelamin -->
                        <div class="mb-3">
                          <label class="form-label d-block">Jenis Kelamin</label>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="kelaminL_edit1" name="kelamin" value="Laki-laki" required />
                            <label class="form-check-label" for="kelaminL_edit1">Laki-laki</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="kelaminP_edit1" name="kelamin" value="Perempuan" required />
                            <label class="form-check-label" for="kelaminP_edit1">Perempuan</label>
                          </div>
                        </div>

                        <!-- Tempat lahir -->
                        <div class="mb-3">
                          <label class="form-label" for="tempatlahir_edit1">Tempat lahir</label>
                          <input class="form-control" type="text" id="tempatlahir_edit1" name="tempatlahir" placeholder="min. 4 karakter, maks. 50 karakter" minlength="4" maxlength="50" required />
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="mb-3">
                          <label class="form-label" for="tanggalLahir_edit1">Tanggal Lahir</label>
                          <input class="form-control" type="date" id="tanggalLahir_edit1" name="tanggalLahir" required />
                        </div>

                        <!-- Agama -->
                        <div class="mb-3">
                          <label class="form-label" for="agama_edit1">Agama</label>
                          <select class="form-control" name="agama" id="agama_edit1" required>
                            <option value="" disabled selected>Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Khong hu chu">Khong hu chu</option>
                          </select>
                        </div>

                        <!-- Telepon -->
                        <div class="mb-3">
                          <label class="form-label" for="nomor_telepon_edit1">Nomor Telepon</label>
                          <input class="form-control" type="tel" pattern="^08[0-9]{8,11}$" minlength="10" maxlength="13" id="nomor_telepon_edit1" name="nomor_telepon" placeholder="Contoh: 08123456789" required />
                        </div>

                        <!-- Foto -->
                        <div class="mb-3">
                          <label class="form-label" for="foto_siswa_edit1">Foto Siswa</label>
                          <input class="form-control" type="file" id="foto_siswa_edit1" name="foto_siswa" accept=".jpg, .jpeg, .png" required />
                        </div>

                        <!-- Alamat -->
                        <div class="mb-3">
                          <label for="alamat_edit1" class="form-label">Alamat</label>
                          <textarea class="form-control" id="alamat_edit1" name="alamat" rows="4" minlength="10" maxlength="200" required></textarea>
                        </div>
                      </form>
                    </div>
                    <div class="dialog-footer">
                      <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
                      <button form="editdatasiswa1" type="reset" class="btn-solid theme-secondary">reset</button>
                      <button form="editdatasiswa1" type="submit" class="btn-solid theme-primary">Save changes</button>
                    </div>
                  </dialog>

                  <button type="button" class="btn-solid theme-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Hapus Data"><i class="bi bi-trash2-fill"></i></button>
                </div>
              </td>
            </tr>

            <!-- Baris 2 -->
          </tbody>
        </table>
      </div>
    </div>
 <?php
 include  '../../template/footer-admin.php';
 
 ?> 