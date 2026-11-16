 <?php
 include_once  '../../config/koneksi.php';
 include  '../../template/header-admin.php';
 include  '../../template/navbar-admin.php';
 
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

        <a href="tambah-data-kelas.html" class="btn-solid theme-success">Tambah Kelas</a>
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
            $query = "SELECT * FROM data_kelas";
            $result = mysqli_query($koneksi, $query);
            $no = 1;
            if (mysqli_num_rows($result) > 0) {
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

                      <button type="button" class="btn-solid btn-sm theme-primary">Edit</button>
                      <button type="button" class="btn-solid theme-danger btn-sm"><i class="bi bi-trash2-fill"></i></button>
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
 include  '../../template/footer-admin.php';
 
 ?> 