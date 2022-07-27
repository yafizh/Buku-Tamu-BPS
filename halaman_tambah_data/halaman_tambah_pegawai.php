<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {
    $id_divisi = $_POST['id_divisi'];
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $sql = "
        INSERT INTO tabel_pegawai (
            id_divisi,
            nama,
            nip,
            jenis_kelamin,
            tanggal_lahir,
            nomor_telepon 
        ) VALUES (
            '$id_divisi', 
            '$nama', 
            '$nip', 
            '$jenis_kelamin', 
            '$tanggal_lahir', 
            '$nomor_telepon' 
        )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Pegawai berhasil ditambahkan.')</script>";
    else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-dark"> Tambah Pegawai </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card bg-light">
                    <div class="card-body">
                        <form class="forms-sample" action="" method="POST">
                            <div class="form-group">
                                <label class="text-dark" for="nama">Nama</label>
                                <input type="text" class="form-control text-dark bg-light" name="nama" autocomplete="off" placeholder="Masukkan Nama..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="nip">NIP</label>
                                <input type="text" class="form-control text-dark bg-light" name="nip" autocomplete="off" placeholder="Masukkan NIP..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="nama_divisi">Divisi</label>
                                <?php $data_divisi = $mysqli->query("SELECT * FROM tabel_divisi ORDER BY nama_divisi"); ?>
                                <select style="border: 1px solid black;" class="form-control text-dark bg-light" name="id_divisi" required>
                                    <option value="" disabled selected>Pilih Divisi</option>
                                    <?php while ($row = $data_divisi->fetch_assoc()) : ?>
                                        <option value="<?= $row['id']; ?>"><?= $row['nama_divisi']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="jenis_kelamin">Jenis Kelamin</label>
                                <select style="border: 1px solid black;" class="form-control text-dark bg-light" name="jenis_kelamin" required>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control text-dark bg-light" name="tanggal_lahir" autocomplete="off" placeholder="Masukkan Nomor Telepon..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="nomor_telepon">Nomor Telepon</label>
                                <input type="number" class="form-control text-dark bg-light" name="nomor_telepon" autocomplete="off" placeholder="Masukkan Nomor Telepon..." required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark" type="reset">Reset</button>
                                <button type="submit" name="submit" class="btn btn-primary me-2">Tambah</button>
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