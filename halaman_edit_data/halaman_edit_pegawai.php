<?php
require_once "database/koneksi.php";

if (isset($_GET['id'])) {
    require_once "database/koneksi.php";

    $sql = "SELECT * FROM tabel_pegawai WHERE id=" . $_GET['id'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_pegawai';" .
        "</script>";

if (isset($_POST['submit'])) {
    $id_divisi = $_POST['id_divisi'];
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $sql = "UPDATE tabel_pegawai 
            SET 
                id_divisi='$id_divisi', 
                nama='$nama', 
                nip='$nip', 
                jenis_kelamin='$jenis_kelamin',
                tanggal_lahir='$tanggal_lahir',
                nomor_telepon='$nomor_telepon' 
            WHERE 
                id=" . $_GET['id'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Pegawai berhasil disimpan.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_pegawai';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-dark"> Edit Pegawai </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card bg-light">
                    <div class="card-body">
                        <form class="forms-sample" action="" method="POST">
                            <div class="form-group">
                                <label class="text-dark" for="nama">Nama</label>
                                <input type="text" class="form-control text-dark bg-light" value="<?= $row['nama']; ?>" name="nama" autocomplete="off" placeholder="Masukkan Nama..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="nip">NIP</label>
                                <input type="text" class="form-control text-dark bg-light" value="<?= $row['nip']; ?>" name="nip" autocomplete="off" placeholder="Masukkan NIP..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="nama_divisi">Divisi</label>
                                <?php $data_divisi = $mysqli->query("SELECT * FROM tabel_divisi ORDER BY nama_divisi"); ?>
                                <select style="border: 1px solid black;" class="form-control text-dark bg-light" name="id_divisi" required>
                                    <?php while ($row_divisi = $data_divisi->fetch_assoc()) : ?>
                                        <option <?= ($row['id_divisi'] == $row_divisi['id']) ? "selected" : ""; ?> value="<?= $row_divisi['id']; ?>"><?= $row_divisi['nama_divisi']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="jenis_kelamin">Jenis Kelamin</label>
                                <select style="border: 1px solid black;" class="form-control text-dark bg-light" name="jenis_kelamin" required>
                                    <option <?= ($row['jenis_kelamin'] == 'L') ? "selected" : ""; ?> value="L">Laki - Laki</option>
                                    <option <?= ($row['jenis_kelamin'] == 'P') ? "selected" : ""; ?> value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control text-dark bg-light" value="<?= $row['tanggal_lahir']; ?>" name="tanggal_lahir" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="nomor_telepon">Nomor Telepon</label>
                                <input type="number" class="form-control text-dark bg-light" value="<?= $row['nomor_telepon']; ?>" name="nomor_telepon" autocomplete="off" placeholder="Masukkan Nomor Telepon..." required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark" type="reset">Reset</button>
                                <button type="submit" name="submit" class="btn btn-primary me-2">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial -->
</div>
<!-- main-panel ends -->