<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
require_once "database/koneksi.php";

if (isset($_GET['id'])) {
    require_once "database/koneksi.php";

    $sql = "SELECT * FROM view_user WHERE id_tamu=" . $_GET['id'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_user_tamu';" .
        "</script>";


if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $asal_instansi = $_POST['asal_instansi'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM view_user WHERE username='$username' AND id!=" . $id;
    $result = $mysqli->query($sql);
    if ($result->num_rows) {
        echo "<script>alert('Username tidak bisa digunakan.')</script>";
    } else {
        $sql = "
        UPDATE tabel_user SET
            nama='$nama',";

        if ($row['username'] != $username)
            $sql .= "username='$username',";

        $sql .= "password='$password',
            status='TAMU'  
        WHERE id=" . $id;

        if ($mysqli->query($sql)) {
            $sql = "
        UPDATE tabel_tamu SET 
            id_user='$id',
            nama='$nama',
            jenis_kelamin='$jenis_kelamin',
            asal_instansi='$asal_instansi',
            alamat='$alamat',
            nomor_telepon='$nomor_telepon' 
        WHERE id=$id";
            if ($mysqli->query($sql) === TRUE) {
                echo "<script>alert('User Tamu berhasil diedit.')</script>";
                echo "<script>" .
                    "window.location.href='index.php?page=data_user_tamu';" .
                    "</script>";
            } else echo "Error1: " . $sql . "<br>" . $mysqli->error;
        } else echo "Error2: " . $sql . "<br>" . $mysqli->error;
    }
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> User Buku Tamu </h3>
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
                                    <input type="text" class="form-control text-white" name="nama" autocomplete="off" placeholder="Masukkan nama tamu..." required value="<?= $row['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <input type="number" class="form-control text-white" name="nomor_telepon" autocomplete="off" placeholder="Masukkan nomor telepon..." required value="<?= $row['nomor_telepon']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control text-white" name="jenis_kelamin" required>
                                        <option <?= $row['jenis_kelamin'] === 'L' ? 'selected' : ''; ?> value="L">Laki - Laki</option>
                                        <option <?= $row['jenis_kelamin'] === 'P' ? 'selected' : ''; ?> value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="asal_instansi">Asal Instansi</label>
                                    <input type="text" class="form-control text-white" name="asal_instansi" autocomplete="off" placeholder="Masukkan asal instansi..." required value="<?= $row['asal_instansi']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control text-white" name="alamat" autocomplete="off" placeholder="Masukkan alamat..." required value="<?= $row['alamat']; ?>">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Akun</h4>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control text-white" name="username" autocomplete="off" placeholder="Masukkan username kunjungan..." value="<?= $row['username']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control text-white" name="password" autocomplete="off" placeholder="Masukkan password kunjungan..." value="<?= $row['password']; ?>">
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