<?php
require_once "../../database/koneksi.php";

const BULAN_DALAM_INDONESIA = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember"
];


$dari_tahun_bulan_tanggal = $_POST['dari_tanggal'];
$dari_tanggal = explode('-', $dari_tahun_bulan_tanggal)[2];
$dari_bulan = explode('-', $dari_tahun_bulan_tanggal)[1];
$dari_tahun = explode('-', $dari_tahun_bulan_tanggal)[0];

$sampai_tahun_bulan_tanggal = $_POST['sampai_tanggal'];
$sampai_tanggal = explode('-', $sampai_tahun_bulan_tanggal)[2];
$sampai_bulan = explode('-', $sampai_tahun_bulan_tanggal)[1];
$sampai_tahun = explode('-', $sampai_tahun_bulan_tanggal)[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pendaftaran Akun</title>
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table {
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        #kop {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="kop" class="d-flex justify-content-center gap-5">
            <img src="../../logo.png" height="110" alt="" style="position: absolute; left: 10px; top: 40px;">
            <div class="text-center" style="flex: 1;">
                <h2>
                    Badan Pusat Statistik
                    <br>
                    Hulu Sungai Utara
                </h2>
                <p>
                    Jl. H. Saberan Effendi No.RT 3, Sungai Malang, Amuntai Tengah,
                    <br>
                    Kabupaten Hulu Sungai Utara, Kalimantan Selatan 71418
                    <br>
                    Email: bps6308@gmail.com
                </p>
            </div>
        </div>
        <div class="my-3" style="border-top: 2px solid black; margin-top:12px;"></div>
        <h2 class="text-center">Laporan Pendaftaran Akun</h2>
        <?php if ($dari_tahun_bulan_tanggal === $sampai_tahun_bulan_tanggal) : ?>
            <h2 class="text-center">Tanggal <?= $dari_tanggal . ' ' . BULAN_DALAM_INDONESIA[$dari_bulan - 1] . ' ' . $dari_tahun; ?></h2>
        <?php else : ?>
            <h2 class="text-center">Tanggal <?= $dari_tanggal . ' ' . BULAN_DALAM_INDONESIA[$dari_bulan - 1] . ' ' . $dari_tahun; ?> - <?= $sampai_tanggal . ' ' . BULAN_DALAM_INDONESIA[$sampai_bulan - 1] . ' ' . $sampai_tahun; ?></h2>
        <?php endif; ?>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Nomor Handphone</th>
                    <th>Asal Instansi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $result = $mysqli->query("SELECT tabel_tamu.*, tabel_user.username, tabel_user.password FROM tabel_tamu INNER JOIN tabel_user ON tabel_tamu.id_user=tabel_user.id WHERE tabel_tamu.status='AKTIF' AND tabel_tamu.mendaftar_sendiri=1 AND (DATE(tabel_tamu.tanggal_terdaftar) >= '$dari_tahun_bulan_tanggal' AND DATE(tabel_tamu.tanggal_terdaftar) <= '$sampai_tahun_bulan_tanggal') ORDER BY id DESC");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td class="text-center"><?= $row['username']; ?></td>
                            <td class="text-center"><?= $row['password']; ?></td>
                            <td class="text-center"><?= $row['nomor_telepon']; ?></td>
                            <td class="text-center"><?= $row['asal_instansi']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php $result->free_result(); ?>
            </tbody>
        </table>
        <div style="display: flex; justify-content: end;">
            <div style="text-align: center; margin-top: 20px; padding: 10px; width: 200px;">
                <span>Amuntai, <?= Date('d') ?> <?= BULAN_DALAM_INDONESIA[Date('m') - 1] ?> <?= Date('Y') ?></span>
                <br>
                <span>Mengetahui</span>
                <br><br><br><br><br>
                <span>Sukma Handayani, M.Si</span>
                <br>
                <span>NIP. 197503111996122000</span>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>