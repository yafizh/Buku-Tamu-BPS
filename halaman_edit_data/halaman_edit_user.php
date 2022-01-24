<?php
require_once "database/koneksi.php";

if (isset($_GET['id'])) {
    require_once "database/koneksi.php";

    $sql = "SELECT * FROM tabel_user WHERE id=" . $_GET['id'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_user';" .
        "</script>";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    $sql = "UPDATE tabel_user 
            SET 
                nama='$nama', 
                username='$username', 
                password='$password', 
                status='$status'
            WHERE 
                id=" . $_GET['id'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('User berhasil diedit.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_user';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit User </h3>
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
                                <input type="text" class="form-control text-white" value="<?= $row['nama']; ?>" name="nama" autocomplete="off" placeholder="Masukkan Nama User..." required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control text-white" value="<?= $row['username']; ?>" name="username" autocomplete="off" placeholder="Masukkan Username..." required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control text-white" value="<?= $row['password']; ?>" name="password" autocomplete="off" placeholder="Masukkan Password..." required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control text-white" name="status" required>
                                    <option <?= ($row['status'] == 'ADMIN') ? "selected" : ""; ?> value="ADMIN">Admin</option>
                                    <option <?= ($row['status'] == 'PETUGAS') ? "selected" : ""; ?> value="PETUGAS">Petugas</option>
                                </select>
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