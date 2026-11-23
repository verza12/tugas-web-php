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
        <h5>Data Kelas</h5>
        

        <!-- Button trigger dialog Tambah -->
        <button type="button" class="btn-solid theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#dialog-tambah-data-kelas">Open dialog</button>

        <dialog class="dialog dialog-scrollable dialog-lg" id="dialog-tambah-data-kelas">
          <div class="dialog-header">
            <h1 class="dialog-title">Formulir Tambah Kelas</h1>
            <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
          </div>
          <!-- body dialog -->
          <div class="dialog-body">
            <form id="tambahdatakelas" action="" method="post" enctype="multipart/form-data">
              <!-- kode kelas -->
              <div class="mb-3">
                <label for="kodeKelas_tambah" class="form-label fw-semibold">Kode Kelas</label>
                <input type="text" maxlength="7" class="form-control" id="kodeKelas_tambah" name="kode_kelas" placeholder="Masukkan kode kelas" />
              </div>

              <!-- Input Nama Kelas -->
              <div class="mb-3">
                <label for="namaKelas_tambah" class="form-label fw-semibold">Nama Kelas</label>
                <input type="text" class="form-control" id="namaKelas_tambah" name="nama_kelas" maxlength="50" placeholder="Masukkan nama kelas" />
              </div>

              <!-- Input Tingkat -->
              <div class="mb-3">
                <label for="tingkat_tambah" class="form-label fw-semibold">Tingkat</label>
                <select class="form-control" id="tingkat_tambah" name="tingkat">
                  <option selected disabled>Pilih tingkat...</option>
                  <option value="10">X</option>
                  <option value="11">XI</option>
                  <option value="12">XII</option>
                </select>
              </div>

              <!-- Input Wali Kelas -->
              <div class="mb-4">
                <label for="waliKelas_tambah" class="form-label fw-semibold">Wali Kelas</label>
                <input type="text" class="form-control" id="waliKelas_tambah" name="wali_kelas" placeholder="Masukkan nama wali kelas" />
              </div>
            </form>
          </div>
          <div class="dialog-footer">
            <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
            <button form="tambahdatakelas" type="reset" class="btn-solid theme-secondary">reset</button>
            <button form="tambahdatakelas" type="submit" class="btn-solid theme-primary">Save changes</button>
          </div>
        </dialog>

        <a href="tambah.php" class="btn-solid theme-success">Tambah Kelas</a>
      </div>

      <div class="row">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode Kelas</th>
              <th>Nama Kelas</th>
              <th>Tingkat</th>
              <th>Wali Kelas</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM data_kelas ORDER BY nama_kelas ASC";
            $result = mysqli_query($koneksi, $query);
            $no = 1;
            if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= htmlspecialchars($row['kode_kelas']); ?></td>
                  <td><?= htmlspecialchars($row['nama_kelas']); ?></td>
                  <td><?= htmlspecialchars($row['tingkat']); ?></td>
                  <td><?= htmlspecialchars($row['wali_kelas']); ?></td>
                  <td>
                    <div class="justify-content-center gap-1">
                      <!-- Detail Dialog -->
                      <button type="button" class="btn-solid btn-sm theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#detaildatakelas<?= $row['id_kelas']; ?>">Detail</button>

                      <dialog class="dialog dialog-scrollable dialog-lg" id="detaildatakelas<?= $row['id_kelas']; ?>">
                        <div class="dialog-header">
                          <h1 class="dialog-title">Detail Data Kelas</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                        </div>
                        <div class="dialog-body">
                          <div class="card card-row">
                            <div class="card-body">
                              <h4 class="card-title"><?= htmlspecialchars($row['nama_kelas']); ?></h4>
                              <p class="card-text">Kode Kelas: <?= htmlspecialchars($row['kode_kelas']); ?></p>
                              <p class="card-text">Tingkat: <?= htmlspecialchars($row['tingkat']); ?></p>
                              <p class="card-text">Wali Kelas: <?= htmlspecialchars($row['wali_kelas']); ?></p>
                            </div>
                          </div>
                        </div>
                        <div class="dialog-footer">
                          <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
                        </div>
                      </dialog>

                      <a href="edit.php?id_kelas=<?= $row['id_kelas']; ?>" class="btn-solid btn-sm theme-primary">Edit</a>
                      <button type="button" class="btn-solid theme-danger btn-sm" data-bs-toggle="dialog" data-bs-target="#hapusdatakelas<?= $row['id_kelas']; ?>"><i class="bi bi-trash2-fill"></i></button>

                      <dialog class="dialog" id="hapusdatakelas<?= $row['id_kelas']; ?>">
                        <div class="dialog-header">
                          <h1 class="dialog-title">Konfirmasi Hapus</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                        </div>
                        <div class="dialog-body">
                          Apakah Anda yakin ingin menghapus data kelas <strong><?= htmlspecialchars($row['nama_kelas']); ?></strong>?
                          <br>Kode Kelas: <?= htmlspecialchars($row['kode_kelas']); ?>
                        </div>
                        <div class="dialog-footer">
                          <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Batal</button>
                          <form action="../../../actions/admin/proses-hapus-kelas.php" method="post">
                            <input type="hidden" name="id_kelas" value="<?= $row['id_kelas']; ?>">
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
              echo "<tr><td colspan='6' class='text-center'>Tidak ada data kelas.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <?php
 include  '../../../templates/admin/footer.php';
 
 ?> 