<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];

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
            '$status'
        )";

        if ($mysqli->query($sql) === TRUE) echo "<script>alert('User berhasil ditambahkan.')</script>";
        else echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-dark"> Tambah User </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card bg-light">
                    <div class="card-body">
                        <form class="forms-sample" action="" method="POST">
                            <div class="form-group">
                                <label class="text-dark" for="nama">Nama</label>
                                <input type="text" class="form-control text-dark bg-light" name="nama" autocomplete="off" placeholder="Masukkan Nama User..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="username">Username</label>
                                <input type="text" class="form-control text-dark bg-light" name="username" autocomplete="off" placeholder="Masukkan Username..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="password">Password</label>
                                <input type="password" class="form-control text-dark bg-light" name="password" autocomplete="off" placeholder="Masukkan Password..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="status">Status</label>
                                <select style="border: 1px solid black;" class="form-control text-dark bg-light" name="status" required>
                                    <option value="ADMIN">Admin</option>
                                    <option value="PETUGAS">Petugas</option>
                                </select>
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