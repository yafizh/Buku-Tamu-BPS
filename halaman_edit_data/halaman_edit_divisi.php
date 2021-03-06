<?php
require_once "database/koneksi.php";

if (isset($_GET['id'])) {
    require_once "database/koneksi.php";

    $sql = "SELECT * FROM tabel_divisi WHERE id=" . $_GET['id'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_divisi';" .
        "</script>";

if (isset($_POST['submit'])) {
    $nama_divisi = $_POST['nama_divisi'];
    $keterangan = $_POST['keterangan'];

    $sql = "UPDATE tabel_divisi 
            SET 
                nama_divisi='$nama_divisi', 
                keterangan='$keterangan' 
            WHERE 
                id=" . $_GET['id'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Divisi berhasil disimpan.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_divisi';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-dark"> Edit Divisi </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card bg-light">
                    <div class="card-body">
                        <form class="forms-sample" action="" method="POST">
                            <div class="form-group">
                                <label class="text-dark" for="nama_divisi">Nama Divisi</label>
                                <input type="text" value="<?= $row['nama_divisi']; ?>" class="form-control text-dark bg-light" name="nama_divisi" autocomplete="off" placeholder="Masukkan Nama Divisi..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="keterangan">Keterangan</label>
                                <input type="text" class="form-control text-dark bg-light" value="<?= $row['keterangan']; ?>" name="keterangan" autocomplete="off" placeholder="Masukkan Keterangan..." required>
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