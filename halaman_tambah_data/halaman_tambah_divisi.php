<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {
    $nama_divisi = $_POST['nama_divisi'];
    $keterangan = $_POST['keterangan'];

    $sql = "
        INSERT INTO tabel_divisi (
            nama_divisi,
            keterangan 
        ) VALUES (
            '$nama_divisi', 
            '$keterangan' 
        )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Divisi berhasil ditambahkan.')</script>";
    else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-dark"> Tambah Divisi </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card bg-light">
                    <div class="card-body">
                        <form class="forms-sample" action="" method="POST">
                            <div class="form-group">
                                <label class="text-dark" for="nama_divisi">Nama Divisi</label>
                                <input type="text" class="form-control text-dark bg-light" name="nama_divisi" autocomplete="off" placeholder="Masukkan Nama Divisi..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="keterangan">Keterangan</label>
                                <input type="text" class="form-control text-dark bg-light" name="keterangan" autocomplete="off" placeholder="Masukkan Keterangan..." required>
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