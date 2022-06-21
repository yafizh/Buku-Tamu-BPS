<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
require_once "database/koneksi.php";
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

    if ($_SESSION['user']['status'] == 'PETUGAS') {
        $sql = "
        INSERT INTO tabel_kunjungan (
            id_pegawai,
            nama,
            jenis_kelamin,
            asal_instansi,
            alamat,
            keperluan,
            tanggal,
            waktu,
            nomor_telepon,
            jenis_pertemuan  
        ) VALUES (
            " . (empty($id_pegawai) ? 'NULL' : "'$id_pegawai'") . ",
            '$nama', 
            '$jenis_kelamin', 
            '$asal_instansi', 
            '$alamat', 
            '$keperluan', 
            '$tanggal', 
            '$waktu', 
            '$nomor_telepon', 
            '$jenis_pertemuan'  
        )";

        if ($mysqli->query($sql) === TRUE) echo "<script>alert('Tamu berhasil ditambahkan.')</script>";
        else echo "Error: " . $sql . "<br>" . $mysqli->error;
    } else if ($_SESSION['user']['status'] == 'TAMU') {
        $id_tamu = $_SESSION['user']['id_tamu'];
        $jenis_pertemuan = $_POST['jenis_pertemuan'];

        $sql = "
        INSERT INTO tabel_pengajuan (
            id_tamu,
            id_pegawai,
            keperluan,
            jenis_pertemuan,
            status,
            tanggal,
            waktu 
        ) VALUES (
            '$id_tamu', 
            " . (empty($id_pegawai) ? 'NULL' : "'$id_pegawai'") . ", 
            '$keperluan', 
            '$jenis_pertemuan', 
            'PENGAJUAN', 
            '$tanggal', 
            '$waktu' 
        )";

        if ($mysqli->query($sql) === TRUE) echo "<script>alert('Pengajuan berhasil.')</script>";
        else echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Buku Tamu </h3>
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
                                    <?php if ($_SESSION['user']['status'] === 'PETUGAS') : ?>
                                        <input type="text" class="form-control text-white" name="nama" autocomplete="off" placeholder="Masukkan nama tamu..." required>
                                    <?php elseif ($_SESSION['user']['status'] === 'TAMU') : ?>
                                        <input type="text" class="form-control bg-dark text-white" name="nama" autocomplete="off" placeholder="Masukkan nama tamu..." required readonly value="<?= $_SESSION['user']['nama']; ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <?php if ($_SESSION['user']['status'] === 'PETUGAS') : ?>
                                        <input type="number" class="form-control text-white" name="nomor_telepon" autocomplete="off" placeholder="Masukkan nomor telepon..." required>
                                    <?php elseif ($_SESSION['user']['status'] === 'TAMU') : ?>
                                        <input type="number" class="form-control bg-dark text-white" name="nomor_telepon" autocomplete="off" placeholder="Masukkan nomor telepon..." required readonly value="<?= $_SESSION['user']['nomor_telepon']; ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <?php if ($_SESSION['user']['status'] === 'PETUGAS') : ?>
                                        <select class="form-control text-white" name="jenis_kelamin" required>
                                            <option value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    <?php elseif ($_SESSION['user']['status'] === 'TAMU') : ?>
                                        <input type="text" class="form-control bg-dark text-white" name="jenis_kelamin" autocomplete="off" required readonly value="<?= $_SESSION['user']['jenis_kelamin'] === 'L' ? 'Laki - Laki' : 'Perempuan'; ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="asal_instansi">Asal Instansi</label>
                                    <?php if ($_SESSION['user']['status'] === 'PETUGAS') : ?>
                                        <input type="text" class="form-control text-white" name="asal_instansi" autocomplete="off" placeholder="Masukkan asal instansi..." required>
                                    <?php elseif ($_SESSION['user']['status'] === 'TAMU') : ?>
                                        <input type="text" class="form-control bg-dark text-white" name="asal_instansi" autocomplete="off" placeholder="Masukkan asal instansi..." required readonly value="<?= $_SESSION['user']['asal_instansi']; ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <?php if ($_SESSION['user']['status'] === 'PETUGAS') : ?>
                                        <input type="text" class="form-control text-white" name="alamat" autocomplete="off" placeholder="Masukkan alamat..." required>
                                    <?php elseif ($_SESSION['user']['status'] === 'TAMU') : ?>
                                        <input type="text" class="form-control bg-dark text-white" name="alamat" autocomplete="off" placeholder="Masukkan alamat..." required readonly value="<?= $_SESSION['user']['alamat']; ?>">
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
                            <div class="form-group">
                                <label for="id_pegawai">Pegawai yang Dikunjungi</label>
                                <?php $data_pegawai = $mysqli->query("SELECT * FROM tabel_pegawai ORDER BY nama"); ?>
                                <select class="form-control text-white" name="id_pegawai">
                                    <option value="" selected>Pilih Pegawai</option>
                                    <?php while ($row = $data_pegawai->fetch_assoc()) : ?>
                                        <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keperluan">Keperluan Kunjungan</label>
                                <input type="text" class="form-control text-white" name="keperluan" autocomplete="off" placeholder="Masukkan keperluan kunjungan...">
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control <?= $_SESSION['user']['status'] === 'PETUGAS' ? 'bg-dark' : ''; ?> text-white" name="tanggal" value="<?= Date("Y-m-d"); ?>" <?= $_SESSION['user']['status'] === 'PETUGAS' ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="waktu">Waktu</label>
                                <input type="text" class="form-control <?= $_SESSION['user']['status'] === 'PETUGAS' ? 'bg-dark' : ''; ?> text-white" name="waktu" value="<?= Date("H:i"); ?>" <?= $_SESSION['user']['status'] === 'PETUGAS' ? 'readonly' : ''; ?>>
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
                                <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
<!-- main-panel ends -->