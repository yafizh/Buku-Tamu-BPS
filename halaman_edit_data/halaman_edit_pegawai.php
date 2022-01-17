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
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nomor_telepon = $_POST['nomor_telepon'];

    $sql = "UPDATE tabel_pegawai 
            SET 
                id_divisi='$id_divisi', 
                nama='$nama', 
                jenis_kelamin='$jenis_kelamin',
                nomor_telepon='$nomor_telepon' 
            WHERE 
                id=" . $_GET['id'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Pegawai berhasil diedit.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_pegawai';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit Pegawai </h3>
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
                                <input type="text" class="form-control" value="<?= $row['nama']; ?>" name="nama" autocomplete="off" placeholder="Masukkan Nama..." required>
                            </div>
                            <div class="form-group">
                                <label for="nama_divisi">Divisi</label>
                                <?php $data_divisi = $mysqli->query("SELECT * FROM tabel_divisi ORDER BY nama_divisi"); ?>
                                <select class="form-control" name="id_divisi" required>
                                    <?php while ($row_divisi = $data_divisi->fetch_assoc()) : ?>
                                        <option <?= ($row['id_divisi'] == $row_divisi['id']) ? "selected" : ""; ?> value="<?= $row_divisi['id']; ?>"><?= $row_divisi['nama_divisi']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" required>
                                    <option <?= ($row['jenis_kelamin'] == 'L') ? "selected" : ""; ?> value="L">Laki - Laki</option>
                                    <option <?= ($row['jenis_kelamin'] == 'P') ? "selected" : ""; ?> value="K">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="number" class="form-control" value="<?= $row['nomor_telepon']; ?>" name="nomor_telepon" autocomplete="off" placeholder="Masukkan Nomor Telepon..." required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark" type="reset">Reset</button>
                                <button type="submit" name="submit" class="btn btn-primary me-2">Edit</button>
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