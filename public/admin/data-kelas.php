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
            <!-- Baris 1 -->
            <tr>
              <td>1</td>
              <td>001</td>
              <td>RPL 1</td>
              <td>XI</td>
              <td>Sensei Rahma</td>
              <td>
                <div class="justify-content-center gap-1">
                  <!-- Detail Dialog 1 -->
                  <button type="button" class="btn-solid btn-sm theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#detaildatarpl1">Detail</button>

                  <dialog class="dialog dialog-scrollable dialog-lg" id="detaildatarpl1">
                    <div class="dialog-header">
                      <h1 class="dialog-title">Detail Data Kelas</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                    </div>
                    <div class="dialog-body">
                      <div class="card card-row">
                        <img src="/asset/seretu.jpg" width="170" height="180" alt="gambar" />
                        <div class="card-body">
                          <h4 class="card-title">Xl RPL 1</h4>
                          <p class="card-text">kelas yang berisi oleh 36 siswa , diantaranya ada 8 perempuan dan 26 laki laki</p>
                          <p class="card-text"><small class="fg-2">Update 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                    <div class="dialog-footer">
                      <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
                    </div>
                  </dialog>

                  <!-- Edit Dialog 1 -->
                  <button type="button" class="btn-solid btn-sm theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#edit-data-kelas1">Edit</button>

                  <dialog class="dialog dialog-scrollable dialog-lg" id="edit-data-kelas1">
                    <div class="dialog-header">
                      <h1 class="dialog-title">Edit Data Kelas</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                    </div>
                    <div class="dialog-body">
                      <form id="editdatakelas1" action="" method="post" enctype="multipart/form-data">
                        <!-- kode kelas -->
                        <div class="mb-3">
                          <label for="kodeKelas_edit1" class="form-label fw-semibold">Kode Kelas</label>
                          <input type="text" maxlength="7" class="form-control" id="kodeKelas_edit1" name="kode_kelas" placeholder="Masukkan kode kelas" />
                        </div>

                        <!-- Input Nama Kelas -->
                        <div class="mb-3">
                          <label for="namaKelas_edit1" class="form-label fw-semibold">Nama Kelas</label>
                          <input type="text" class="form-control" id="namaKelas_edit1" name="nama_kelas" maxlength="50" placeholder="Masukkan nama kelas" />
                        </div>

                        <!-- Input Tingkat -->
                        <div class="mb-3">
                          <label for="tingkat_edit1" class="form-label fw-semibold">Tingkat</label>
                          <select class="form-control" id="tingkat_edit1" name="tingkat">
                            <option selected disabled>Pilih tingkat...</option>
                            <option value="10">X</option>
                            <option value="11">XI</option>
                            <option value="12">XII</option>
                          </select>
                        </div>

                        <!-- Input Wali Kelas -->
                        <div class="mb-4">
                          <label for="waliKelas_edit1" class="form-label fw-semibold">Wali Kelas</label>
                          <input type="text" class="form-control" id="waliKelas_edit1" name="wali_kelas" placeholder="Masukkan nama wali kelas" />
                        </div>
                      </form>
                    </div>
                    <div class="dialog-footer">
                      <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
                      <button form="editdatakelas1" type="reset" class="btn-solid theme-secondary">reset</button>
                      <button form="editdatakelas1" type="submit" class="btn-solid theme-primary">Save changes</button>
                    </div>
                  </dialog>

                  <button type="button" class="btn-solid theme-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Hapus Data"><i class="bi bi-trash2-fill"></i></button>
                </div>
              </td>
            </tr>

            <!-- Baris 2 -->
            <tr>
              <td>2</td>
              <td>002</td>
              <td>RPL 2</td>
              <td>XI</td>
              <td>Bu kokom</td>
              <td>
                <div class="justify-content-center gap-1">
                  <!-- Detail Dialog 2 -->
                  <button type="button" class="btn-solid btn-sm theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#detaildatakelas2">Detail</button>

                  <dialog class="dialog dialog-scrollable dialog-lg" id="detaildatakelas2">
                    <div class="dialog-header">
                      <h1 class="dialog-title">Detail Data Kelas</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                    </div>
                    <div class="dialog-body">
                      <div class="card card-row">
                        <img src="https://img.magnific.com/premium-vector/file-folder-mascot-character-design-vector_166742-4413.jpg?semt=ais_hybrid&w=740&q=80" width="170" height="180" alt="gambar" />
                        <div class="card-body">
                          <h4 class="card-title">Xl RPL 2</h4>
                          <p class="card-text">Berisikan anak anak seperwalian bu kokom</p>
                          <p class="card-text"><small class="fg-2">Update 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                    <div class="dialog-footer">
                      <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
                    </div>
                  </dialog>

                  <!-- Edit Dialog 2 -->
                  <button type="button" class="btn-solid btn-sm theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#edit-data-kelas2">Edit</button>

                  <dialog class="dialog dialog-scrollable dialog-lg" id="edit-data-kelas2">
                    <div class="dialog-header">
                      <h1 class="dialog-title">Edit Data Kelas</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                    </div>
                    <div class="dialog-body">
                      <form id="editdatakelas2" action="" method="post" enctype="multipart/form-data">
                        <!-- kode kelas -->
                        <div class="mb-3">
                          <label for="kodeKelas_edit2" class="form-label fw-semibold">Kode Kelas</label>
                          <input type="text" class="form-control" id="kodeKelas_edit2" name="kode_kelas" placeholder="Masukkan kode kelas" maxlength="7" />
                        </div>

                        <!-- Input Nama Kelas -->
                        <div class="mb-3">
                          <label for="namaKelas_edit2" class="form-label fw-semibold">Nama Kelas</label>
                          <input type="text" class="form-control" id="namaKelas_edit2" name="nama_kelas" maxlength="50" placeholder="Masukkan nama kelas" />
                        </div>

                        <!-- Input Tingkat -->
                        <div class="mb-3">
                          <label for="tingkat_edit2" class="form-label fw-semibold">Tingkat</label>
                          <select class="form-control" id="tingkat_edit2" name="tingkat">
                            <option selected disabled>Pilih tingkat...</option>
                            <option value="10">X</option>
                            <option value="11">XI</option>
                            <option value="12">XII</option>
                          </select>
                        </div>

                        <!-- Input Wali Kelas -->
                        <div class="mb-4">
                          <label for="waliKelas_edit2" class="form-label fw-semibold">Wali Kelas</label>
                          <input type="text" class="form-control" id="waliKelas_edit2" name="wali_kelas" placeholder="Masukkan nama wali kelas" />
                        </div>
                      </form>
                    </div>
                    <div class="dialog-footer">
                      <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
                      <button form="editdatakelas2" type="reset" class="btn-solid theme-secondary">reset</button>
                      <button form="editdatakelas2" type="submit" class="btn-solid theme-primary">Save changes</button>
                    </div>
                  </dialog>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <?php
 include  '../../template/footer-admin.php';
 
 ?> 