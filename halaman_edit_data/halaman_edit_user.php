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
        echo "<script>alert('User berhasil disimpan.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_user';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-dark"> Edit User </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card bg-light">
                    <div class="card-body">
                        <form class="forms-sample" action="" method="POST">
                            <div class="form-group">
                                <label class="text-dark" for="nama">Nama</label>
                                <input type="text" class="form-control text-dark bg-light" value="<?= $row['nama']; ?>" name="nama" autocomplete="off" placeholder="Masukkan Nama User..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="username">Username</label>
                                <input type="text" class="form-control text-dark bg-light" value="<?= $row['username']; ?>" name="username" autocomplete="off" placeholder="Masukkan Username..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="password">Password</label>
                                <input type="password" class="form-control text-dark bg-light" value="<?= $row['password']; ?>" name="password" autocomplete="off" placeholder="Masukkan Password..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="status">Status</label>
                                <select style="border: 1px solid black;" class="form-control text-dark bg-light" name="status" required>
                                    <option <?= ($row['status'] == 'ADMIN') ? "selected" : ""; ?> value="ADMIN">Admin</option>
                                    <option <?= ($row['status'] == 'PETUGAS') ? "selected" : ""; ?> value="PETUGAS">Petugas</option>
                                </select>
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