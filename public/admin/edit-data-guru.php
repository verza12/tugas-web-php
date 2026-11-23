<?php
include_once __DIR__ . '/../../config/koneksi.php';
include '../../template/header-admin.php';
include '../../template/navbar-admin.php';

// Ambil id_guru dari URL
$id_guru = isset($_GET['id_guru']) ? mysqli_real_escape_string($koneksi, $_GET['id_guru']) : '';

if (empty($id_guru)) {
    echo "<script>alert('ID Guru tidak ditemukan!'); window.location='data-guru.php';</script>";
    exit;
}

// Ambil data guru menggunakan prepared statement
$query = "SELECT * FROM data_guru WHERE id_guru = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id_guru);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<script>alert('Data guru tidak ditemukan!'); window.location='data-guru.php';</script>";
    exit;
}
?>

<div class="container my-4">
    <div class="row mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Edit Data Guru</h4>
            <a href="data-guru.php" class="btn-solid theme-success">Kembali</a>
        </div>
    </div>

    <form action="../../action/admin/proses-edit-guru.php" method="post">
        <input type="hidden" name="id_guru" value="<?= htmlspecialchars($data['id_guru']); ?>">
        
        <!-- NIP -->
        <div class="mb-3">
            <label class="form-label" for="nip">NIP</label>
            <input class="form-control" type="text" inputmode="numeric" pattern="[0-9]{18}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" id="nip" name="nip" value="<?= htmlspecialchars($data['nip']); ?>" placeholder="18 digit angka" maxlength="18" required />
        </div>

        <!-- Nama Guru -->
        <div class="mb-3">
            <label class="form-label" for="nama_guru">Nama Guru</label>
            <input class="form-control" type="text" id="nama_guru" name="nama_guru" value="<?= htmlspecialchars($data['nama_guru']); ?>" placeholder="Masukkan nama lengkap" minlength="3" maxlength="100" required />
        </div>

        <!-- Kelamin -->
        <div class="mb-3">
            <label class="form-label d-block">Jenis Kelamin</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="kelaminL" name="jenis_kelamin" value="Laki-Laki" <?= ($data['jenis_kelamin'] == 'Laki-Laki') ? 'checked' : ''; ?> required />
                <label class="form-check-label" for="kelaminL">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="kelaminP" name="jenis_kelamin" value="Perempuan" <?= ($data['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?> required />
                <label class="form-check-label" for="kelaminP">Perempuan</label>
            </div>
        </div>

        <!-- Telepon -->
        <div class="mb-3">
            <label class="form-label" for="nomor_telepon">Nomor Telepon</label>
            <input class="form-control" type="tel" id="nomor_telepon" name="nomor_telepon" value="<?= htmlspecialchars($data['nomor_telepon']); ?>" placeholder="Contoh: 08123456789" required />
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email" value="<?= htmlspecialchars($data['email']); ?>" placeholder="Contoh: blabla@gmail.com" required />
        </div>

        <!-- Alamat -->
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="4" minlength="10" maxlength="200" required><?= htmlspecialchars($data['alamat']); ?></textarea>
        </div>

        <a href="data-guru.php" class="btn-solid theme-secondary">Batal</a>
        <button type="reset" class="btn-solid theme-danger">Reset</button>
        <button type="submit" class="btn-solid theme-success">Update Data</button>
    </form>
</div>

<?php include '../../template/footer-admin.php'; ?>
