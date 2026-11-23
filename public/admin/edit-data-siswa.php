<?php
include_once __DIR__ . '/../../config/koneksi.php';
include '../../template/header-admin.php';
include '../../template/navbar-admin.php';

// Ambil ID dari URL
$id = isset($_GET['id']) ? mysqli_real_escape_string($koneksi, $_GET['id']) : '';

if (empty($id)) {
    echo "<script>alert('ID tidak ditemukan!'); window.location='data-siswa.php';</script>";
    exit;
}

// Ambil data siswa
$query = "SELECT * FROM data_siswa WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<script>alert('Data siswa tidak ditemukan!'); window.location='data-siswa.php';</script>";
    exit;
}
?>

<div class="container my-4">
    <div class="row mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Edit Data Siswa</h4>
            <a href="data-siswa.php" class="btn-solid theme-success">Kembali</a>
        </div>
    </div>

    <form action="../../action/admin/proses-edit-siswa.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']); ?>">
        
        <!-- NISN -->
        <div class="mb-3">
            <label class="form-label" for="nisn">NISN</label>
            <input class="form-control" type="text" inputmode="numeric" id="nisn" name="nisn" value="<?= htmlspecialchars($data['nisn']); ?>" placeholder="10 digit angka" pattern="[0-9]{10}" minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required />
        </div>

        <!-- NIS -->
        <div class="mb-3">
            <label class="form-label" for="nis">NIS</label>
            <input class="form-control" type="text" inputmode="numeric" oninput="formatNIS(this)" pattern="^[0-9]\.[0-9]{2}\.[0-9]{5}$" id="nis" name="nis" value="<?= htmlspecialchars($data['nis']); ?>" placeholder="Contoh: 1.22.33333" maxlength="10" required />
        </div>

        <!-- Nama lengkap -->
        <div class="mb-3">
            <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
            <input class="form-control" type="text" id="nama_lengkap" name="nama_lengkap" value="<?= htmlspecialchars($data['nama_lengkap']); ?>" placeholder="Masukkan nama lengkap" minlength="3" maxlength="100" required />
        </div>

        <!-- Kelas -->
        <div class="mb-3">
            <label class="form-label" for="kelas">Pilih Kelas</label>
            <select class="form-control" name="kelas" id="kelas" required>
                <?php
                $list_kelas = ["X RPL 1", "X RPL 2", "XI RPL 1", "XI RPL 2", "XII RPL 1", "XII RPL 2"];
                foreach ($list_kelas as $kls) {
                    $selected = ($data['kelas'] == $kls) ? "selected" : "";
                    echo "<option value=\"$kls\" $selected>$kls</option>";
                }
                ?>
            </select>
        </div>

        <!-- Kelamin -->
        <div class="mb-3">
            <label class="form-label d-block">Jenis Kelamin</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="kelaminL" name="jenis_kelamin" value="L" <?= ($data['jenis_kelamin'] == 'L') ? 'checked' : ''; ?> required />
                <label class="form-check-label" for="kelaminL">Laki-laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="kelaminP" name="jenis_kelamin" value="P" <?= ($data['jenis_kelamin'] == 'P') ? 'checked' : ''; ?> required />
                <label class="form-check-label" for="kelaminP">Perempuan</label>
            </div>
        </div>

        <!-- Tempat lahir -->
        <div class="mb-3">
            <label class="form-label" for="tempat_lahir">Tempat lahir</label>
            <input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir" value="<?= htmlspecialchars($data['tempat_lahir']); ?>" placeholder="min. 4 karakter, maks. 50 karakter" minlength="4" maxlength="50" required />
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-3">
            <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
            <input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= htmlspecialchars($data['tanggal_lahir']); ?>" required />
        </div>

        <!-- Agama -->
        <div class="mb-3">
            <label class="form-label" for="agama">Agama</label>
            <select class="form-control" name="agama" id="agama" required>
                <?php
                $list_agama = ["Islam", "Budha", "Kristen", "Protestan", "Hindu", "Kong Hu Chu"];
                foreach ($list_agama as $agm) {
                    $selected = ($data['agama'] == $agm) ? "selected" : "";
                    echo "<option value=\"$agm\" $selected>$agm</option>";
                }
                ?>
            </select>
        </div>

        <!-- Telepon -->
        <div class="mb-3">
            <label class="form-label" for="nomor_telepon">Nomor Telepon</label>
            <input class="form-control" type="tel" id="nomor_telepon" name="nomor_telepon" value="<?= htmlspecialchars($data['nomor_telepon']); ?>" inputmode="numeric" pattern="[0-9]*" maxlength="13" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Contoh: 08123456789" required />
        </div>

        <!-- Foto -->
        <div class="mb-3">
            <label class="form-label" for="foto_siswa">Foto Siswa (Biarkan kosong jika tidak ingin mengubah)</label>
            <div class="mb-2">
                <?php if (!empty($data['foto_siswa'])): ?>
                    <img src="../upload/<?= htmlspecialchars($data['foto_siswa']); ?>" width="100" class="img-thumbnail d-block mb-2">
                <?php endif; ?>
            </div>
            <input class="form-control" type="file" id="foto_siswa" name="foto_siswa" accept=".jpg, .jpeg, .png" />
        </div>

        <!-- Alamat -->
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="4" minlength="10" maxlength="200" required><?= htmlspecialchars($data['alamat']); ?></textarea>
        </div>

        <a href="data-siswa.php" class="btn-solid theme-secondary">Batal</a>
        <button type="submit" class="btn-solid theme-success">Update Data</button>
    </form>
</div>

<?php include '../../template/footer-admin.php'; ?>
