<?php
if (isset($_POST['submit'])) {
    require_once "database/koneksi.php";
    $id_user = $_SESSION['user']['id'];
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi_password_baru = $_POST['konfirmasi_password_baru'];

    $sql = "SELECT * FROM tabel_user WHERE id='$id_user' AND password='$password_lama'";
    if ($result = $mysqli->query($sql)){
        if(mysqli_num_rows($result) > 0){
            if($password_baru === $konfirmasi_password_baru){
                $sql = "UPDATE tabel_user SET password='$password_baru' WHERE id='$id_user'";
                if($mysqli->query($sql) === TRUE){
                    echo "<script>alert('Password Berhasil Diperbaharui, Silakan login ulang!')</script>";
                    echo "<script>window.location.href ='index.php?page=logout'</script>";
                } else echo "Error: " . $sql . "<br>" . $mysqli->error;
            } else echo "<script>alert('Password Baru Tidak Cocok!')</script>";
        } else echo "<script>alert('Password Lama Salah!')</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
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
                                <label class="text-dark" for="password_lama">Password Lama</label>
                                <input type="password" class="form-control text-dark bg-light" name="password_lama" autocomplete="off" placeholder="Masukkan Password Lama..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="password_baru">Password Baru</label>
                                <input type="password" class="form-control text-dark bg-light" name="password_baru" autocomplete="off" placeholder="Masukkan Password Baru..." required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="konfirmasi_password_baru">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control text-dark bg-light" name="konfirmasi_password_baru" autocomplete="off" placeholder="Masukkan Ulang Password Baru..." required>
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