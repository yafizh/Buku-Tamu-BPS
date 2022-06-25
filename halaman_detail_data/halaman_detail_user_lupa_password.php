<?php
require_once "database/koneksi.php";

if (isset($_GET['id'])) {

    $sql = "SELECT * FROM view_user WHERE id_tamu=" . $_GET['id'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nomor_telepon = $_POST['nomor_telepon'];

    $sql = "UPDATE tabel_tamu SET status='AKTIF' WHERE id=" . $_GET['id'];
    if ($mysqli->query($sql)) {
        //init SMS gateway, look at android SMS gateway
        $idmesin = "1150";
        $pin = "122047";
        $msg = "Pengajuan Lupa Password Anda telah diterima pada website Badan Pusat Statistik Hulu Sungau Utara, Akun anda adalah username: $username dan password: $password";

        $encoded_message = urlencode($msg);
        $url = "https://sms.indositus.com/sendsms.php?idmesin=$idmesin&pin=$pin&to=$nomor_telepon&text=$encoded_message";
        // create curl resource
        $ch = curl_init($url);
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        echo "<script>alert('Password berhasil dikirim.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_user_lupa_password';" .
            "</script>";
    }
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Detail User Tamu </h3>
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
                            <h4 class="card-title">Indentitas User Tamu</h4>
                            <!-- <p class="card-description"> Basic form layout </p> -->
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control text-white bg-dark" readonly value="<?= $row['nama']; ?>" name="nama" autocomplete="off" placeholder="Masukkan nama tamu..." required>
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="number" class="form-control text-white bg-dark" readonly value="<?= $row['nomor_telepon']; ?>" name="nomor_telepon" autocomplete="off" placeholder="Masukkan nomor telepon..." required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control text-white bg-dark" readonly value="<?= ($row['jenis_kelamin'] == 'L' ? "Laki - Laki" : "Perempuan"); ?>" name="jenis_kelamin" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="asal_instansi">Asal Instansi</label>
                                <input type="text" class="form-control text-white bg-dark" readonly value="<?= $row['asal_instansi']; ?>" name="asal_instansi" autocomplete="off" placeholder="Masukkan asal instansi..." required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control text-white bg-dark" readonly value="<?= $row['alamat']; ?>" name="alamat" autocomplete="off" placeholder="Masukkan alamat..." required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Akun</h4>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control text-white" name="username" autocomplete="off" placeholder="Masukkan username..." value="<?= $row['username']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control text-white" name="password" autocomplete="off" placeholder="Masukkan password..." value="<?= $row['password']; ?>" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-success me-2">Kirim Password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial -->
</div>
<!-- main-panel ends -->