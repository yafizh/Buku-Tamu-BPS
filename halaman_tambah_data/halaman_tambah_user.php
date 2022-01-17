<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];

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

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Tambah User </h3>
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
                                <input type="text" class="form-control" name="nama" autocomplete="off" placeholder="Masukkan Nama User..." required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" autocomplete="off" placeholder="Masukkan Username..." required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Masukkan Password..." required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" required>
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