<?php
require_once "database/koneksi.php";

if (isset($_GET['id'])) {
    require_once "database/koneksi.php";

    $sql = "SELECT * FROM tabel_tamu WHERE id=" . $_GET['id'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['tolak'])) {
    $sql = "DELETE FROM tabel_tamu WHERE id=" . $_GET['id'];
    if ($mysqli->query($sql)) {
        echo "<script>alert('Pendaftaran ditolak.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_pendaftaran';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

if (isset($_POST['terima'])) {
    $nama = $_POST['nama'];
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? ("'" . $_POST['jenis_kelamin'] . "'") : 'NULL';
    $asal_instansi = $_POST['asal_instansi'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = urlencode($_POST['nomor_telepon']);
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
            UPDATE tabel_tamu SET 
                id_user='$id',
                nama='$nama',
                jenis_kelamin=$jenis_kelamin,
                asal_instansi='$asal_instansi',
                alamat='$alamat',
                nomor_telepon='$nomor_telepon',
                status='AKTIF'
            WHERE id=" . $_GET['id'];
            if ($mysqli->query($sql)) {

                // //init SMS gateway, look at android SMS gateway
                // $idmesin = "1151";
                // $pin = "120216";
                // $msg = "Anda%20telah%20terdaftar%20pada%20website%20Badan%20Pusat%20Statistik%20Hulu%20Sungau%20Utara,%20Akun%20anda%20adalah%20username:%20$username%20dan%20password:%20$password";

                // $url = "https://sms.indositus.com/sendsms.php?idmesin=$idmesin&pin=$pin&to=$nomor_telepon&text=$msg";

                // // create curl resource
                // $ch = curl_init();
                // //return the transfer as a string
                // curl_setopt($ch, CURLOPT_URL, $url);
                // curl_setopt($ch, CURLOPT_HEADER, 0);
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);

                // // $output contains the output string
                // $output = curl_exec($ch);
                // echo "<script>alert('Pendaftaran Diterima.')</script>";
                // echo "<script>" .
                //     "window.location.href='index.php?page=data_pendaftaran';" .
                //     "</script>";
            } else echo "Error1: " . $sql . "<br>" . $mysqli->error;
        } else echo "Error2: " . $sql . "<br>" . $mysqli->error;
    }
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Detail Pendaftar </h3>
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
                            <h4 class="card-title">Indentitas Pendaftar</h4>
                            <!-- <p class="card-description"> Basic form layout </p> -->
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control text-white" value="<?= $row['nama']; ?>" name="nama" autocomplete="off" placeholder="Masukkan nama tamu..." required>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <input type="number" class="form-control text-white" value="<?= $row['nomor_telepon']; ?>" name="nomor_telepon" autocomplete="off" placeholder="Masukkan nomor telepon..." required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control text-white" name="jenis_kelamin">
                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="asal_instansi">Asal Instansi</label>
                                    <input type="text" class="form-control text-white" value="<?= $row['asal_instansi']; ?>" name="asal_instansi" autocomplete="off" placeholder="Masukkan asal instansi..." required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control text-white" name="alamat" autocomplete="off" placeholder="Masukkan alamat...">
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
                                <input type="text" class="form-control text-white" name="username" autocomplete="off" placeholder="Masukkan username..." required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control text-white" name="password" autocomplete="off" placeholder="Masukkan password..." required>
                            </div>
                            <div class="form-group">
                                <form action="" method="POST" class="d-inline">
                                    <button class="btn btn-danger" type="submit" name="tolak">Tolak</button>
                                </form>
                                <button type="submit" name="terima" class="btn btn-success me-2">Terima</button>
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
<?php if (isset($_POST['terima'])) : ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $.ajax({
            url: "https://sms.indositus.com/sendsms.php?idmesin=1151&pin=120216&to=<?= $_POST['nomor_telepon']; ?>&text=Anda%20telah%20terdaftar%20pada%20website%20Badan%20Pusat%20Statistik%20Hulu%20Sungau%20Utara,%20Akun%20anda%20adalah%20username:%<?= $_POST['username']; ?>%20dan%20password:%20<?= $_POST['password']; ?>",
        }).done(function() {
            alert('Pendaftaran Diterima.');
            window.location.href = 'index.php?page=data_pendaftaran';
        });
    </script>
<?php endif; ?>