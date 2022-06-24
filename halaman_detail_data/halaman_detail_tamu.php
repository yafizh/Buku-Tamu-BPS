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
            <h3 class="page-title"> Detail Tamu </h3>
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
                                    <input type="text" class="form-control text-white bg-dark" readonly value="<?= $row['nama']; ?>" name="nama" autocomplete="off" placeholder="Masukkan nama tamu..." required>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <input type="number" class="form-control text-white bg-dark" readonly value="<?= $row['nomor_telepon']; ?>" name="nomor_telepon" autocomplete="off" placeholder="Masukkan nomor telepon..." required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <input type="text" class="form-control text-white bg-dark" readonly value="<?= ($row['jenis_kelamin'] == 'L' ? "Laki - Laki" : "Perempuan"); ?>" name="jenis_kelamin" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="asal_instansi">Asal Instansi</label>
                                    <input type="text" class="form-control text-white bg-dark" readonly value="<?= $row['asal_instansi']; ?>" name="asal_instansi" autocomplete="off" placeholder="Masukkan asal instansi..." required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control text-white bg-dark" readonly value="<?= $row['alamat']; ?>" name="alamat" autocomplete="off" placeholder="Masukkan alamat..." required>
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
                                <select class="form-control text-white bg-dark" name="id_pegawai" required disabled>
                                    <?php while ($row_pegawai = $data_pegawai->fetch_assoc()) : ?>
                                        <option <?= $row['id_pegawai'] == $row_pegawai['id'] ? "selected" : ""; ?> value="<?= $row_pegawai['id']; ?>"><?= $row_pegawai['nama']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keperluan">Keperluan Kunjungan</label>
                                <input type="text" class="form-control text-white bg-dark" readonly value="<?= $row['keperluan']; ?>" name="keperluan" autocomplete="off" placeholder="Masukkan keperluan kunjungan...">
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
                                <input type="text" class="form-control bg-dark text-white" name="jenis_pertemuan" autocomplete="off" required readonly value="<?= $row['jenis_pertemuan']; ?>">
                            </div>
                            <div class="form-group">
                                <?php if ($_SESSION['user']['status'] === 'PETUGAS') : ?>
                                    <?php if ($row['status'] === 'PENGAJUAN') : ?>
                                        <button class="btn btn-danger" type="reset">Tolak</button>
                                        <button class="btn btn-success me-2">Setujui</button>
                                    <?php elseif (!is_null($row['id_tamu']) && is_null($row['id_ikm'])) : ?>
                                        <form action="" method="post">
                                            <input type="text" name="nomor_telepon" value="<?= $row['nomor_telepon'] ?>" hidden>
                                            <input type="text" name="id" value="<?= $row['id_pengajuan'] ?>" hidden>
                                            <button class="btn btn-success me-2" name="ikm" type="submit">Kirim Link IKM</button>
                                        </form>
                                    <?php endif; ?>
                                <?php else : ?>
                                <?php endif; ?>
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