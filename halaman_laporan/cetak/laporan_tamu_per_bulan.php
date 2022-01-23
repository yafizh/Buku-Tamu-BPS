<?php
require_once "../../database/koneksi.php";

const BULAN_DALAM_INDONESIA = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "July",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember"
];

$tahun_bulan = $_POST['bulan'];
$bulan = explode('-', $tahun_bulan)[1];
$tahun = explode('-', $tahun_bulan)[0];
$id_divisi = $_POST['id_divisi'];
$id_pegawai = $_POST['id_pegawai'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Tamu Bulan <?= BULAN_DALAM_INDONESIA[$bulan - 1] . ' ' . $tahun; ?></title>
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
            <img src="../../assets/img/Lambang_Kota_Banjarbaru.png" height="150" alt="">
            <div class="text-center" style="flex: 1;">
                <h2>
                    NAMA INSTANSI
                    <br>
                    KOTA
                </h2>
                <p>
                    Alamat:
                    <br>
                    Email:
                </p>
            </div>
        </div>
        <div class="my-3" style="border-top: 2px solid black; margin-top:12px;"></div>
        <h2 class="text-center">Laporan Tamu Bulan <?= BULAN_DALAM_INDONESIA[$bulan - 1] . ' ' . $tahun; ?></h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Asal Instansi</th>
                    <th>Keperluan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $result = $mysqli->query("SELECT * FROM tabel_tamu WHERE (MONTH(tanggal)='$bulan' AND YEAR(tanggal)='$tahun') AND id_divisi LIKE '%$id_divisi%' AND id_pegawai LIKE '%$id_pegawai%' ORDER BY id DESC");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td class="text-center"><?= $row['tanggal']; ?></td>
                            <td class="text-center"><?= $row['asal_insatnsi']; ?></td>
                            <td class="text-center"><?= $row['keperluan']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php $result->free_result(); ?>
            </tbody>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>