<?php
require_once "database/koneksi.php";

$sql = "SELECT * FROM view_user WHERE id=" . $_SESSION['user']['id'];
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();


if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $sql = "SELECT * FROM view_user WHERE username='$username' AND id!=" . $_SESSION['user']['id'];
    $result = $mysqli->query($sql);

    if ($result->num_rows) {
        echo "<script>alert('Username tidak bisa digunakan.')</script>";
    } else {
        if ($_FILES['gambar']['error'] == 4) {
            $target_file = $row['gambar'];
        } else {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
            move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
        }

        $sql = "
        UPDATE tabel_user SET 
            gambar='$target_file',
            nama='$nama'";

        if ($row['username'] != $username)
            $sql .= ", username='$username' ";

        $sql .= " WHERE id=" . $_SESSION['user']['id'];

        if ($mysqli->query($sql)) {
            if ($_SESSION['user']['status'] === 'TAMU') {
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $asal_instansi = $_POST['asal_instansi'];
                $alamat = $_POST['alamat'];
                $nomor_telepon = $_POST['nomor_telepon'];
                $sql = "
                    UPDATE tabel_tamu SET 
                        nama='$nama',
                        jenis_kelamin='$jenis_kelamin',
                        asal_instansi='$asal_instansi',
                        alamat='$alamat',
                        nomor_telepon='$nomor_telepon' 
                    WHERE id_user=" . $_SESSION['user']['id'];
                if ($mysqli->query($sql) === TRUE) {
                    echo "<script>alert('Profil berhasil diperbaharui.');window.location.replace('index.php?page=edit_profile');</script>";
                } else echo "Error1: " . $sql . "<br>" . $mysqli->error;
            } else {
                echo "<script>alert('Profil berhasil diperbaharui.');window.location.replace('index.php?page=edit_profile');</script>";
            }
        } else echo "Error2: " . $sql . "<br>" . $mysqli->error;
    }
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-dark"> Profile </h3>
        </div>
        <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h4 class="card-title text-dark">Akun</h4>
                            <div class="form-group">
                                <label class="text-dark" for="nama">Nama</label>
                                <input type="text" class="form-control text-dark bg-light" name="nama" autocomplete="off" placeholder="Masukkan nama tamu..." required value="<?= $row['nama']; ?>">
                            </div>
                            <?php if (in_array($_SESSION['user']['status'], ['TAMU'])) : ?>
                                <div class="form-group">
                                    <label class="text-dark" for="nomor_telepon">Nomor Telepon</label>
                                    <input type="number" class="form-control text-dark bg-light" name="nomor_telepon" autocomplete="off" placeholder="Masukkan nomor telepon..." required value="<?= $row['nomor_telepon']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="jenis_kelamin">Jenis Kelamin</label>
                                    <select style="border: 1px solid black;" class="form-control text-dark bg-light" name="jenis_kelamin" required>
                                        <option <?= $row['jenis_kelamin'] === 'L' ? 'selected' : ''; ?> value="L">Laki - Laki</option>
                                        <option <?= $row['jenis_kelamin'] === 'P' ? 'selected' : ''; ?> value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="asal_instansi">Asal Instansi</label>
                                    <input type="text" class="form-control text-dark bg-light" name="asal_instansi" autocomplete="off" placeholder="Masukkan asal instansi..." required value="<?= $row['asal_instansi']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="alamat">Alamat</label>
                                    <input type="text" class="form-control text-dark bg-light" name="alamat" autocomplete="off" placeholder="Masukkan alamat..." required value="<?= $row['alamat']; ?>">
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label class="text-dark" for="username">Username</label>
                                <input type="text" class="form-control text-dark bg-light" name="username" autocomplete="off" placeholder="Masukkan username kunjungan..." value="<?= $row['username']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="gambar" class="d-block mb-2">Gambar</label>
                                <input type="file" name="gambar">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary me-2">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
<!-- main-panel ends -->