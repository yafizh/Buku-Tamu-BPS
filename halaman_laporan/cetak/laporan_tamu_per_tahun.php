<?php
require_once "../../database/koneksi.php";
$tahun = $_POST['tahun'];
$id_divisi = $_POST['id_divisi'];
$id_pegawai = $_POST['id_pegawai'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Tamu Tahun <?= $tahun; ?></title>
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
        <h2 class="text-center">Laporan Tamu Tahun <?= $tahun; ?></h2>
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
                $result = $mysqli->query("SELECT * FROM tabel_tamu WHERE YEAR(tanggal)='$tahun' AND id_divisi LIKE '%$id_divisi%' AND id_pegawai LIKE '%$id_pegawai%' ORDER BY id DESC");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td class="text-center"><?= $row['tanggal']; ?></td>
                            <td class="text-center"><?= $row['asal_instansi']; ?></td>
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