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
            <h3 class="page-title"> Tambah Divisi </h3>
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
                                <label for="nama_divisi">Nama Divisi</label>
                                <input type="text" class="form-control text-white" name="nama_divisi" autocomplete="off" placeholder="Masukkan Nama Divisi..." required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control text-white" name="keterangan" autocomplete="off" placeholder="Masukkan Keterangan..." required>
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