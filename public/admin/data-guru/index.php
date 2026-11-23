 <?php
 session_start();
  include_once __DIR__ . '/../../../config/koneksi.php';
  if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
  }
 include  '../../../templates/admin/header.php';
 include  '../../../templates/admin/navbar.php';
 
 ?> 
    <div class="container mt-5">
      <div class="d-flex justify-content-between p-3 gap-2">
        <h5>data Guru</h5>

        <!-- Button trigger dialog Tambah -->
        <button type="button" class="btn-solid theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#dialog-tambah-data-guru">Open dialog</button>

        <dialog class="dialog dialog-scrollable dialog-lg" id="dialog-tambah-data-guru">
          <div class="dialog-header">
            <h1 class="dialog-title">Formulir Tambah Guru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
          </div>
          <!-- body dialog -->
          <div class="dialog-body">
            <form id="tambahdataguru" action="" method="post" enctype="multipart/form-data">
              <!-- NIP -->
              <div class="mb-3">
                <label class="form-label" for="nip_tambah">NIP</label>
                <input class="form-control" type="text" inputmode="numeric" pattern="[0-9]{18}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" id="nip_tambah" name="nip" placeholder="18 digit angka" maxlength="18" required />
              </div>

              <!-- Nama Guru -->
              <div class="mb-3">
                <label class="form-label" for="nama_tambah">Nama Guru</label>
                <input class="form-control" type="text" id="nama_tambah" name="nama" placeholder="Masukkan nama lengkap" minlength="3" maxlength="100" required />
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

              <!-- Telepon -->
              <div class="mb-3">
                <label class="form-label" for="nomor_telepon_tambah">Nomor Telepon</label>
                <input class="form-control" type="tel" id="nomor_telepon_tambah" name="nomor_telepon" placeholder="Contoh: 08123456789" required />
              </div>

              <!-- Email -->
              <div class="mb-3">
                <label class="form-label" for="email_tambah">Email</label>
                <input class="form-control" type="email" id="email_tambah" name="email" placeholder="Contoh: blabla@gmail.com" required />
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
            <button form="tambahdataguru" type="reset" class="btn-solid theme-secondary">reset</button>
            <button form="tambahdataguru" type="submit" class="btn-solid theme-primary">Save changes</button>
          </div>
        </dialog>

        <a href="tambah.php" class="btn-solid theme-success">Tambah Guru</a>
      </div>

      <div class="row">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>NIP</th>
              <th>Nama Guru</th>
              <th>Jenis kelamin</th>
              <th>Nomor Telepon</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM data_guru ORDER BY nama_guru ASC";
            $result = mysqli_query($koneksi, $query);
            $no = 1;
            if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= htmlspecialchars($row['nip']); ?></td>
                  <td><?= htmlspecialchars($row['nama_guru']); ?></td>
                  <td><?= htmlspecialchars($row['jenis_kelamin']); ?></td>
                  <td><?= htmlspecialchars($row['nomor_telepon']); ?></td>
                  <td><?= htmlspecialchars($row['email']); ?></td>
                  <td><?= htmlspecialchars($row['alamat']); ?></td>
                  <td>
                    <div class="justify-content-center gap-1">
                      <!-- Detail Dialog -->
                      <button type="button" class="btn-solid btn-sm theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#detaildataguru<?= $row['id_guru']; ?>">Detail</button>

                      <dialog class="dialog dialog-scrollable dialog-lg" id="detaildataguru<?= $row['id_guru']; ?>">
                        <div class="dialog-header">
                          <h1 class="dialog-title">Detail Data Guru</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                        </div>
                        <div class="dialog-body">
                          <div class="card card-row">
                            <div class="card-body">
                              <h4 class="card-title"><?= htmlspecialchars($row['nama_guru']); ?></h4>
                              <p class="card-text">NIP: <?= htmlspecialchars($row['nip']); ?></p>
                              <p class="card-text">Jenis Kelamin: <?= htmlspecialchars($row['jenis_kelamin']); ?></p>
                              <p class="card-text">Nomor Telepon: <?= htmlspecialchars($row['nomor_telepon']); ?></p>
                              <p class="card-text">Email: <?= htmlspecialchars($row['email']); ?></p>
                              <p class="card-text">Alamat: <?= htmlspecialchars($row['alamat']); ?></p>
                            </div>
                          </div>
                        </div>
                        <div class="dialog-footer">
                          <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
                        </div>
                      </dialog>

                      <!-- Edit Button -->
                      <a href="edit.php?id_guru=<?= $row['id_guru']; ?>" class="btn-solid btn-sm theme-primary">Edit</a>
                      <button type="button" class="btn-solid theme-danger btn-sm" data-bs-toggle="dialog" data-bs-target="#hapusdataguru<?= $row['id_guru']; ?>"><i class="bi bi-trash2-fill"></i></button>

                      <dialog class="dialog" id="hapusdataguru<?= $row['id_guru']; ?>">
                        <div class="dialog-header">
                          <h1 class="dialog-title">Konfirmasi Hapus</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                        </div>
                        <div class="dialog-body">
                          Apakah Anda yakin ingin menghapus data guru <strong><?= htmlspecialchars($row['nama_guru']); ?></strong>?
                        </div>
                        <div class="dialog-footer">
                          <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Batal</button>
                          <form action="../../../actions/admin/proses-hapus-guru.php" method="post">
                            <input type="hidden" name="id_guru" value="<?= $row['id_guru']; ?>">
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
              echo "<tr><td colspan='8' class='text-center'>Tidak ada data guru.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

     <?php  include  '../../../templates/admin/footer.php'?>
