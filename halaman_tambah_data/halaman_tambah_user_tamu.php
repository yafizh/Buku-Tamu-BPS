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

    $sql = "SELECT * FROM tabel_user WHERE username='$username'";
    $result = $mysqli->query($sql);
    if ($result->num_rows) {
        echo "<script>alert('Username telah digunakan. Gunakan username lain')</script>";
    } else {
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
            nomor_telepon,
            status  
        ) VALUES (
            '$id', 
            '$nama', 
            '$jenis_kelamin', 
            '$asal_instansi', 
            '$alamat', 
            '$nomor_telepon',
            'AKTIF'  
        )";
            if ($mysqli->query($sql)) {
                echo "<script>alert('User Tamu berhasil ditambahkan.')</script>";
            } else echo "Error1: " . $sql . "<br>" . $mysqli->error;
        } else echo "Error2: " . $sql . "<br>" . $mysqli->error;
    }
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> User Buku Tamu </h3>
        </div>
        <form class="forms-sample" action="" method="POST">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Indentitas Tamu</h4>
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