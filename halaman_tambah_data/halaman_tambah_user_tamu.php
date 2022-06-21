<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $asal_instansi = $_POST['asal_instansi'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "
        INSERT INTO tabel_user (
            nama,
            username,
            password,
            status  
        ) VALUES (
            '$nama', 
            '$username', 
            '$password', 
            'TAMU'  
        )";

    if ($mysqli->query($sql)) {
        $id = $mysqli->insert_id;
        $sql = "
        INSERT INTO tabel_tamu (
            id_user,
            nama,
            jenis_kelamin,
            asal_instansi,
            alamat,
            nomor_telepon 
        ) VALUES (
            '$id', 
            '$nama', 
            '$jenis_kelamin', 
            '$asal_instansi', 
            '$alamat', 
            '$nomor_telepon' 
        )";
        if ($mysqli->query($sql)) {
            echo "<script>alert('User Tamu berhasil ditambahkan.')</script>";
        } else echo "Error1: " . $sql . "<br>" . $mysqli->error;
    } else echo "Error2: " . $sql . "<br>" . $mysqli->error;
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
                            <h4 class="card-title">Akun</h4>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control text-white" name="username" autocomplete="off" placeholder="Masukkan username kunjungan...">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control text-white" name="password" autocomplete="off" placeholder="Masukkan password kunjungan...">
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