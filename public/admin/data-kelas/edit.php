<?php
include_once __DIR__ . '/../../../config/koneksi.php';
include '../../../templates/admin/header.php';
include '../../../templates/admin/navbar.php';

// Ambil id_kelas dari URL
$id_kelas = isset($_GET['id_kelas']) ? mysqli_real_escape_string($koneksi, $_GET['id_kelas']) : '';

if (empty($id_kelas)) {
    echo "<script>alert('ID Kelas tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

// Ambil data kelas menggunakan prepared statement
$query = "SELECT * FROM data_kelas WHERE id_kelas = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id_kelas);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<script>alert('Data kelas tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}
?>

<div class="container my-4">
    <div class="row mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Edit Data Kelas</h4>
            <a href="index.php" class="btn-solid theme-success">Kembali</a>
        </div>
    </div>

    <form action="../../../actions/admin/proses-edit-kelas.php" method="post">
        <input type="hidden" name="id_kelas" value="<?= htmlspecialchars($data['id_kelas']); ?>">
        
        <!-- kode kelas -->
        <div class="mb-3">
            <label for="kode_kelas" class="form-label fw-semibold">Kode Kelas</label>
            <input type="text" maxlength="7" class="form-control" id="kode_kelas" name="kode_kelas" value="<?= htmlspecialchars($data['kode_kelas']); ?>" placeholder="Masukkan kode kelas" required />
        </div>

        <!-- Input Nama Kelas -->
        <div class="mb-3">
            <label for="nama_kelas" class="form-label fw-semibold">Nama Kelas</label>
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= htmlspecialchars($data['nama_kelas']); ?>" maxlength="30" placeholder="Masukkan nama kelas" required />
        </div>

        <!-- Input Tingkat -->
        <div class="mb-3">
            <label for="tingkat" class="form-label fw-semibold">Tingkat</label>
            <select class="form-control" id="tingkat" name="tingkat" required>
                <?php
                $list_tingkat = ["10", "11", "12"];
                foreach ($list_tingkat as $tkt) {
                    $selected = ($data['tingkat'] == $tkt) ? "selected" : "";
                    echo "<option value=\"$tkt\" $selected>$tkt</option>";
                }
                ?>
            </select>
        </div>

        <!-- Input Wali Kelas -->
        <div class="mb-4">
            <label for="wali_kelas" class="form-label fw-semibold">Wali Kelas</label>
            <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" value="<?= htmlspecialchars($data['wali_kelas']); ?>" maxlength="100" placeholder="Masukkan nama wali kelas" required />
        </div>

        <a href="index.php" class="btn-solid theme-secondary">Batal</a>
        <button type="reset" class="btn-solid theme-danger">Reset</button>
        <button type="submit" class="btn-solid theme-success">Update Data</button>
    </form>
</div>

<?php include '../../../templates/admin/footer.php'; ?>
