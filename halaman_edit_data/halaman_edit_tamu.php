<?php
require_once "database/koneksi.php";

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM view_tamu WHERE id=" . $_GET['id'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else if (isset($_GET['id_pengajuan'])) {
    $sql = "SELECT * FROM view_tamu WHERE id_pengajuan=" . $_GET['id_pengajuan'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $id_pegawai = $_POST['id_pegawai'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $asal_instansi = $_POST['asal_instansi'];
    $alamat = $_POST['alamat'];
    $keperluan = $_POST['keperluan'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $jenis_pertemuan = $_POST['jenis_pertemuan'];

    if (isset($_GET['id'])) {
        $sql = "UPDATE tabel_kunjungan 
        SET 
            id_pegawai='$id_pegawai',
            nama='$nama',
            jenis_kelamin='$jenis_kelamin',
            asal_instansi='$asal_instansi',
            alamat='$alamat',
            keperluan='$keperluan',
            tanggal='$tanggal',
            waktu='$waktu',
            nomor_telepon='$nomor_telepon', 
            jenis_pertemuan='$jenis_pertemuan' 
        WHERE 
            id=" . $_GET['id'];
    } else if (isset($_GET['id_pengajuan'])) {
        $sql = "UPDATE tabel_pengajuan 
        SET 
            id_pegawai='$id_pegawai',
            tanggal='$tanggal',
            waktu='$waktu',
            jenis_pertemuan='$jenis_pertemuan' 
        WHERE 
            id=" . $_GET['id_pengajuan'];
    }

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Tamu berhasil diedit.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_tamu';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit Tamu </h3>
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
            </nav> -->
        </div>
        <form class="forms-sample" action="" method="POST">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Indentitas Tamu</h4>
                            <!-- <p class="card-description"> Basic form layout </p> -->
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <?php if (isset($_GET['id'])) : ?>
                                        <input type="text" class="form-control text-white" value="<?= $row['nama']; ?>" name="nama" autocomplete="off" placeholder="Masukkan nama tamu..." required>
                                    <?php elseif (isset($_GET['id_pengajuan'])) : ?>
                                        <input type="text" class="form-control text-white bg-dark" readonly value="<?= $row['nama']; ?>" name="nama" autocomplete="off" placeholder="Masukkan nama tamu..." required>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <?php if (isset($_GET['id'])) : ?>
                                        <input type="number" class="form-control text-white" value="<?= $row['nomor_telepon']; ?>" name="nomor_telepon" autocomplete="off" placeholder="Masukkan nomor telepon..." required>
                                    <?php elseif (isset($_GET['id_pengajuan'])) : ?>
                                        <input type="number" class="form-control text-white bg-dark" readonly value="<?= $row['nomor_telepon']; ?>" name="nomor_telepon" autocomplete="off" placeholder="Masukkan nomor telepon..." required>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <?php if (isset($_GET['id'])) : ?>
                                        <select class="form-control text-white" name="jenis_kelamin" required>
                                            <option value="L" <?= ($row['jenis_kelamin'] == 'L' ? "selected" : "") ?>>Laki - Laki</option>
                                            <option value="P" <?= ($row['jenis_kelamin'] == 'P' ? "selected" : "") ?>>Perempuan</option>
                                        </select>
                                    <?php elseif (isset($_GET['id_pengajuan'])) : ?>
                                        <input type="text" class="form-control text-white bg-dark" readonly value="<?= ($row['jenis_kelamin'] == 'L' ? "Laki - Laki" : "Perempuan") ?>" name="jenis_kelamin" autocomplete="off" required>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="asal_instansi">Asal Instansi</label>
                                    <?php if (isset($_GET['id'])) : ?>
                                        <input type="text" class="form-control text-white" value="<?= $row['asal_instansi']; ?>" name="asal_instansi" autocomplete="off" placeholder="Masukkan asal instansi..." required>
                                    <?php elseif (isset($_GET['id_pengajuan'])) : ?>
                                        <input type="text" class="form-control text-white bg-dark" readonly value="<?= $row['asal_instansi']; ?>" name="asal_instansi" autocomplete="off" placeholder="Masukkan asal instansi..." required>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <?php if (isset($_GET['id'])) : ?>
                                        <input type="text" class="form-control text-white" value="<?= $row['alamat']; ?>" name="alamat" autocomplete="off" placeholder="Masukkan alamat..." required>
                                    <?php elseif (isset($_GET['id_pengajuan'])) : ?>
                                        <input type="text" class="form-control text-white bg-dark" readonly value="<?= $row['alamat']; ?>" name="alamat" autocomplete="off" placeholder="Masukkan alamat..." required>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tujuan Kunjungan</h4>
                            <!-- <p class="card-description"> Basic form layout </p> -->
                            <div class="form-group">
                                <label for="id_pegawai">Pegawai yang Dikunjungi</label>
                                <?php $data_pegawai = $mysqli->query("SELECT * FROM tabel_pegawai ORDER BY nama"); ?>
                                <select class="form-control text-white" name="id_pegawai" required>
                                    <?php while ($row_pegawai = $data_pegawai->fetch_assoc()) : ?>
                                        <option <?= $row['id_pegawai'] == $row_pegawai['id'] ? "selected" : ""; ?> value="<?= $row_pegawai['id']; ?>"><?= $row_pegawai['nama']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keperluan">Keperluan Kunjungan</label>
                                <input type="text" class="form-control text-white" value="<?= $row['keperluan']; ?>" name="keperluan" autocomplete="off" placeholder="Masukkan keperluan kunjungan...">
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control text-white bg-dark" name="tanggal" value="<?= $row['tanggal']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="waktu">Waktu</label>
                                <input type="text" class="form-control text-white bg-dark" name="waktu" value="<?= $row['waktu']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jenis_pertemuan">Jenis Kunjungan</label>
                                <?php if ($_SESSION['user']['status'] === 'PETUGAS') : ?>
                                    <input type="text" class="form-control bg-dark text-white" name="jenis_pertemuan" autocomplete="off" required readonly value="OFFLINE">
                                <?php elseif ($_SESSION['user']['status'] === 'TAMU') : ?>
                                    <select class="form-control text-white" name="jenis_pertemuan" required>
                                        <option value="OFFLINE">Offline</option>
                                        <option value="ONLINE">Online</option>
                                    </select>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark" type="reset">Cancel</button>
                                <button type="submit" name="submit" class="btn btn-primary me-2">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial -->
</div>
<!-- main-panel ends -->