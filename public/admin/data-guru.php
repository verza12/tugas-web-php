 <?php
 include_once  '../../config/koneksi.php';
 include  '../../template/header-admin.php';
 include  '../../template/navbar-admin.php';
 
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

        <a href="tambah-data-guru.html" class="btn-solid theme-success">Tambah Guru</a>
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
            <!-- Baris 1 -->
            <tr>
              <td>1</td>
              <td>0986578</td>
              <td>Onizuka Eikichi</td>
              <td>Laki Laki</td>
              <td>098875497865</td>
              <td>blaballba@gmail.com</td>
              <td>batu ceper</td>
              <td>
                <div class="justify-content-center gap-1">
                  <!-- Detail Dialog 1 -->
                  <button type="button" class="btn-solid btn-sm theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#detaildataguru1">Detail</button>

                  <dialog class="dialog dialog-scrollable dialog-lg" id="detaildataguru1">
                    <div class="dialog-header">
                      <h1 class="dialog-title">Detail Data Guru</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                    </div>
                    <div class="dialog-body">
                      <div class="card card-row">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP72mSl45TpZPNOoBPNJX_fOOcvHLYiIDmXeFErM2nI_YbAwEMf9ZsN6CdtVtuRjIFMqmeIdIAwmBeBTE-K1PzEX3p_jR9tN5u_3PEo4S_IA&s=10z" width="170" height="180" alt="gambar" />
                        <div class="card-body">
                          <h4 class="card-title">Onizuka Eikichi</h4>
                          <p class="card-text">Guru yang memahami segala kesalahan muridnya dan membantu menyelesaikannya</p>
                          <p class="card-text"><small class="fg-2">Update 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                    <div class="dialog-footer">
                      <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
                    </div>
                  </dialog>

                  <!-- Edit Dialog 1 -->
                  <button type="button" class="btn-solid btn-sm theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#edit-data-guru1">Edit</button>

                  <dialog class="dialog dialog-scrollable dialog-lg" id="edit-data-guru1">
                    <div class="dialog-header">
                      <h1 class="dialog-title">Edit Data Guru</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                    </div>
                    <div class="dialog-body">
                      <form id="editdataguru1" action="" method="post" enctype="multipart/form-data">
                        <!-- NIP -->
                        <div class="mb-3">
                          <label class="form-label" for="nip_edit1">NIP</label>
                          <input class="form-control" type="text" inputmode="numeric" pattern="[0-9]{18}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" id="nip_edit1" name="nip" placeholder="18 digit angka" maxlength="18" required />
                        </div>

                        <!-- Nama Guru -->
                        <div class="mb-3">
                          <label class="form-label" for="nama_edit1">Nama Guru</label>
                          <input class="form-control" type="text" id="nama_edit1" name="nama" placeholder="Masukkan nama lengkap" minlength="3" maxlength="100" required />
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

                        <!-- Telepon -->
                        <div class="mb-3">
                          <label class="form-label" for="nomor_telepon_edit1">Nomor Telepon</label>
                          <input class="form-control" type="tel" id="nomor_telepon_edit1" name="nomor_telepon" placeholder="Contoh: 08123456789" required />
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                          <label class="form-label" for="email_edit1">Email</label>
                          <input class="form-control" type="email" id="email_edit1" name="email" placeholder="Contoh: blabla@gmail.com" required />
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
                      <button form="editdataguru1" type="reset" class="btn-solid theme-secondary">reset</button>
                      <button form="editdataguru1" type="submit" class="btn-solid theme-primary">Save changes</button>
                    </div>
                  </dialog>

                  <button type="button" class="btn-solid theme-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Hapus Data"><i class="bi bi-trash2-fill"></i></button>
                </div>
              </td>
            </tr>

            <!-- Baris 2 -->
            <tr>
              <td>2</td>
              <td>0986578</td>
              <td>Koro Sensei</td>
              <td>Laki Laki</td>
              <td>098875497865</td>
              <td>blaballba@gmail.com</td>
              <td>batu ceper</td>
              <td>
                <button type="button" class="btn-solid btn-sm theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#detaildataguru2">Detail</button>

                <dialog class="dialog dialog-scrollable dialog-lg" id="detaildataguru2">
                  <div class="dialog-header">
                    <h1 class="dialog-title">Detail Data Guru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                  </div>
                  <div class="dialog-body">
                    <div class="card card-row">
                      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtjTu9E3N4RvC7g6cMIwNCJoTndI8Q636y_qf9RWyZoOXPb6c7IJhvXUo_9qz65ZtsZg1jU9FHvPK5gUWMkExL1w8nNl-iCUyTgl8JFzDZ&s=10" width="170" height="180" alt="gambar" />
                      <div class="card-body">
                        <h4 class="card-title">Koro Sensei</h4>
                        <p class="card-text">Seorang guru pembunuh yang mengajar dikelas buangan</p>
                        <p class="card-text"><small class="fg-2">Update 3 mins ago</small></p>
                      </div>
                    </div>
                  </div>
                  <div class="dialog-footer">
                    <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
                  </div>
                </dialog>

                <!-- Edit Dialog 2 -->
                <button type="button" class="btn-solid btn-sm theme-primary" data-bs-toggle="dialog" data-bs-backdrop="static" data-bs-target="#edit-data-guru2">Edit</button>

                <dialog class="dialog dialog-scrollable dialog-lg" id="edit-data-guru2">
                  <div class="dialog-header">
                    <h1 class="dialog-title">Edit Data Guru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
                  </div>
                  <div class="dialog-body">
                    <form id="editdataguru2" action="" method="post" enctype="multipart/form-data">
                      <!-- NIP -->
                      <div class="mb-3">
                        <label class="form-label" for="nip_edit2">NIP</label>
                        <input class="form-control" type="text" inputmode="numeric" pattern="[0-9]{18}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" id="nip_edit2" name="nip" placeholder="18 digit angka" maxlength="18" required />
                      </div>

                      <!-- Nama Guru -->
                      <div class="mb-3">
                        <label class="form-label" for="nama_edit2">Nama Guru</label>
                        <input class="form-control" type="text" id="nama_edit2" name="nama" placeholder="Masukkan nama lengkap" minlength="3" maxlength="100" required />
                      </div>

                      <!-- Kelamin -->
                      <div class="mb-3">
                        <label class="form-label d-block">Jenis Kelamin</label>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="kelaminL_edit2" name="kelamin" value="Laki-laki" required />
                          <label class="form-check-label" for="kelaminL_edit2">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="kelaminP_edit2" name="kelamin" value="Perempuan" required />
                          <label class="form-check-label" for="kelaminP_edit2">Perempuan</label>
                        </div>
                      </div>

                      <!-- Telepon -->
                      <div class="mb-3">
                        <label class="form-label" for="nomor_telepon_edit2">Nomor Telepon</label>
                        <input class="form-control" type="tel" id="nomor_telepon_edit2" name="nomor_telepon" placeholder="Contoh: 08123456789" required />
                      </div>

                      <!-- Email -->
                      <div class="mb-3">
                        <label class="form-label" for="email_edit2">Email</label>
                        <input class="form-control" type="email" id="email_edit2" name="email" placeholder="Contoh: blabla@gmail.com" required />
                      </div>

                      <!-- Alamat -->
                      <div class="mb-3">
                        <label for="alamat_edit2" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat_edit2" name="alamat" rows="4" minlength="10" maxlength="200" required></textarea>
                      </div>
                    </form>
                  </div>
                  <div class="dialog-footer">
                    <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
                    <button form="editdataguru2" type="reset" class="btn-solid theme-secondary">reset</button>
                    <button form="editdataguru2" type="submit" class="btn-solid theme-primary">Save changes</button>
                  </div>
                </dialog>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

     <?php  include  '../../template/footer-admin.php'?>
