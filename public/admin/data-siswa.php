 <?php
 session_start();
  include_once  '../../config/koneksi.php';
  if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
  }
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
            <?php
            $query = "SELECT * FROM data_siswa ORDER BY nama_lengkap ASC";
            $result = mysqli_query($koneksi, $query);
            $no = 1;
            if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= htmlspecialchars($row['nisn']); ?></td>
                  <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
                  <td><?= htmlspecialchars($row['kelas']); ?></td>
                  <td><?= htmlspecialchars($row['jenis_kelamin']); ?></td>
                  <td><?= htmlspecialchars($row['nomor_telepon']); ?></td>
                  <td>
                    <div class="justify-content-center gap-1">
                      <!-- Detail Dialog -->
                      <button type="button" class="btn-solid btn-sm theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#detaildatasiswa<?= $row['id']; ?>">Detail</button>

                      <dialog class="dialog dialog-scrollable dialog-lg" id="detaildatasiswa<?= $row['id']; ?>">
                        <div class="dialog-header">
                          <h1 class="dialog-title">Detail Data Siswa</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                        </div>
                        <div class="dialog-body">
                          <div class="card card-row">
                            <img src="<?= !empty($row['foto_siswa']) ? '../upload/' . htmlspecialchars($row['foto_siswa']) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYGSmOrPWRd3g1ahbAQ7UPZVYgI2h0aYUpu3VXVnwWDw&s=10'; ?>" width="170" height="180" alt="gambar" />
                            <div class="card-body">
                              <h4 class="card-title"><?= htmlspecialchars($row['nama_lengkap']); ?></h4>
                              <p class="card-text">NISN: <?= htmlspecialchars($row['nisn']); ?></p>
                              <p class="card-text">NIS: <?= htmlspecialchars($row['nis']); ?></p>
                              <p class="card-text">Kelas: <?= htmlspecialchars($row['kelas']); ?></p>
                              <p class="card-text">Jenis Kelamin: <?= htmlspecialchars($row['jenis_kelamin']); ?></p>
                              <p class="card-text">Tempat, Tanggal Lahir: <?= htmlspecialchars($row['tempat_lahir']); ?>, <?= htmlspecialchars($row['tanggal_lahir']); ?></p>
                              <p class="card-text">Agama: <?= htmlspecialchars($row['agama']); ?></p>
                              <p class="card-text">Nomor Telepon: <?= htmlspecialchars($row['nomor_telepon']); ?></p>
                              <p class="card-text">Alamat: <?= htmlspecialchars($row['alamat']); ?></p>
                            </div>
                          </div>
                        </div>
                        <div class="dialog-footer">
                          <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
                        </div>
                      </dialog>

                      <!-- Edit Button -->
                      <a href="edit-data-siswa.php?id=<?= $row['id']; ?>" class="btn-solid btn-sm theme-primary">Edit</a>
                      <button type="button" class="btn-solid theme-danger btn-sm" data-bs-toggle="dialog" data-bs-target="#hapusdatasiswa<?= $row['id']; ?>"><i class="bi bi-trash2-fill"></i></button>

                      <dialog class="dialog" id="hapusdatasiswa<?= $row['id']; ?>">
                        <div class="dialog-header">
                          <h1 class="dialog-title">Konfirmasi Hapus</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                        </div>
                        <div class="dialog-body">
                          Apakah Anda yakin ingin menghapus data siswa <strong><?= htmlspecialchars($row['nama_lengkap']); ?></strong>?
                        </div>
                        <div class="dialog-footer">
                          <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Batal</button>
                          <form action="../../action/admin/proses-hapus-siswa.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">
                            <button type="submit" class="btn-solid theme-danger">Hapus</button>
                          </form>
                        </div>
                      </dialog>
                    </div>
                  </td>
                </tr>
            <?php
              }
            } else {
              echo "<tr><td colspan='7' class='text-center'>Tidak ada data siswa.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
 <?php
 include  '../../template/footer-admin.php';
 
 ?> 