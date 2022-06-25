<?php
require_once "database/koneksi.php";

if (isset($_GET['id'])) {

    $sql = "SELECT * FROM view_user WHERE id_tamu=" . $_GET['id'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
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
<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nomor_telepon = $_POST['nomor_telepon'];

    $sql = "UPDATE tabel_tamu SET status='AKTIF' WHERE id=" . $_GET['id'];
    if ($mysqli->query($sql)) { ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $.ajax({
                url: "https://sms.indositus.com/sendsms.php?idmesin=1151&pin=120216&to=<?= $nomor_telepon ?>&text=Pengajuan%20Lupa%20Password%20Anda%20telah%20diterima%20pada%20website%20Badan%20Pusat%20Statistik%20Hulu%20Sungau%20Utara,%20Akun%20anda%20adalah%20username:%20<?= $username; ?>%20dan%20password:%20<?= $password; ?>",
            }).done(function() {});
            alert('Password berhasil dikirim.');
            window.location.href = 'index.php?page=data_user_lupa_password';
        </script>
<?php   }
}
?>