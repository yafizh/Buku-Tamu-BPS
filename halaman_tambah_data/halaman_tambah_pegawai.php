<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {
    $id_divisi = $_POST['id_divisi'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nomor_telepon = $_POST['nomor_telepon'];

    $sql = "
        INSERT INTO tabel_pegawai (
            id_divisi,
            nama,
            jenis_kelamin,
            nomor_telepon 
        ) VALUES (
            '$id_divisi', 
            '$nama', 
            '$jenis_kelamin', 
            '$nomor_telepon' 
        )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Pegawai berhasil ditambahkan.')</script>";
    else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Tambah Pegawai </h3>
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
            </nav> -->
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Indentitas Tamu</h4> -->
                        <!-- <p class="card-description"> Basic form layout </p> -->
                        <form class="forms-sample" action="" method="POST">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" autocomplete="off" placeholder="Masukkan Nama..." required>
                            </div>
                            <div class="form-group">
                                <label for="nama_divisi">Divisi</label>
                                <?php $data_divisi = $mysqli->query("SELECT * FROM tabel_divisi ORDER BY nama_divisi"); ?>
                                <select class="form-control" name="id_divisi" required>
                                    <option value="" disabled selected>Pilih Divisi</option>
                                    <?php while ($row = $data_divisi->fetch_assoc()) : ?>
                                        <option value="<?= $row['id']; ?>"><?= $row['nama_divisi']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" required>
                                    <option value="L">Laki - Laki</option>
                                    <option value="K">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="number" class="form-control" name="nomor_telepon" autocomplete="off" placeholder="Masukkan Nomor Telepon..." required>
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