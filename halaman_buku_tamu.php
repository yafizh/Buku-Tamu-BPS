<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {
    $id_divisi = $_POST['id_divisi'];
    $id_pegawai = $_POST['id_pegawai'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $asal_instansi = $_POST['asal_instansi'];
    $alamat = $_POST['alamat'];
    $keperluan = $_POST['keperluan'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $sql = "
        INSERT INTO tabel_tamu (
            id_divisi,
            id_pegawai,
            nama,
            jenis_kelamin,
            asal_instansi,
            alamat,
            keperluan,
            tanggal,
            waktu,
            nomor_telepon 
        ) VALUES (
            ".(empty($id_divisi) ? 'NULL' : '\'$id_divisi\'').", 
            ".(empty($id_pegawai) ? 'NULL' : '\'$id_pegawai\'').",
            '$nama', 
            '$jenis_kelamin', 
            '$asal_instansi', 
            '$alamat', 
            '$keperluan', 
            '$tanggal', 
            '$waktu', 
            '$nomor_telepon' 
        )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Tamu berhasil ditambahkan.')</script>";
    else echo "Error: " . $sql . "<br>" . $mysqli->error;
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
                                    <input type="text" class="form-control text-white" name="nama" autocomplete="off" placeholder="Masukkan nama tamu..." required>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <input type="number" class="form-control text-white" name="nomor_telepon" autocomplete="off" placeholder="Masukkan nomor telepon..." required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control text-white" name="jenis_kelamin" required>
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="asal_instansi">Asal Instansi</label>
                                    <input type="text" class="form-control text-white" name="asal_instansi" autocomplete="off" placeholder="Masukkan asal instansi..." required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control text-white" name="alamat" autocomplete="off" placeholder="Masukkan alamat..." required>
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
                                <label for="tabel_divisi">Divisi yang Dikunjungi</label>
                                <?php $data_divisi = $mysqli->query("SELECT * FROM tabel_divisi ORDER BY nama_divisi"); ?>
                                <select class="form-control text-white" name="id_divisi">
                                    <option value="" selected>Pilih Divisi</option>
                                    <?php while ($row = $data_divisi->fetch_assoc()) : ?>
                                        <option value="<?= $row['id']; ?>"><?= $row['nama_divisi']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
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
                                <input type="date" class="form-control bg-dark text-white" name="tanggal" value="<?= Date("Y-m-d"); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="waktu">Waktu</label>
                                <input type="text" class="form-control bg-dark text-white" name="waktu" value="<?= Date("H:i"); ?>" readonly>
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