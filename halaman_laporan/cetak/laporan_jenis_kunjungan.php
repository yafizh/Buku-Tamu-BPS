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


$tahun = $_POST['tahun'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Jenis Kunjungan</title>
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
        <h2 class="text-center">Laporan Jenis Kunjungan Tahun <?= $tahun; ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Offline</th>
                    <th>Online</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $result = $mysqli->query("SELECT * FROM view_jumlah_jenis_kunjungan WHERE tahun='$tahun'");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php $data = $result->fetch_all(MYSQLI_ASSOC); ?>
                    <?php for ($i = 0; $i < 12; $i++) : ?>
                        <tr>
                            <td class="text-center"><?= BULAN_DALAM_INDONESIA[$i]; ?></td>
                            <?php $exsist_umum = false; ?>
                            <?php $exsist_instansi = false; ?>
                            <?php foreach ($data as $datum) : ?>
                                <?php if ($datum['bulan'] == ($i + 1) && $datum['jenis_pertemuan'] == 'OFFLINE') : ?>
                                    <td class="text-center"><?= $datum['jumlah']; ?></td>
                                    <?php $exsist_umum = true; ?>
                                <?php endif; ?>
                                <?php if ($datum['bulan'] == ($i + 1) && $datum['jenis_pertemuan'] == 'ONLINE') : ?>
                                    <?php if (!$exsist_umum) : ?>
                                        <td class="text-center"><?= 0; ?></td>
                                        <?php $exsist_umum = true; ?>
                                    <?php endif; ?>
                                    <td class="text-center"><?= $datum['jumlah']; ?></td>
                                    <?php $exsist_instansi = true; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php if (!$exsist_umum) : ?>
                                <td class="text-center"><?= 0; ?></td>
                            <?php endif; ?>
                            <?php if (!$exsist_instansi) : ?>
                                <td class="text-center"><?= 0; ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endfor; ?>
                <?php endif; ?>
                <?php $result->free_result(); ?>
            </tbody>
        </table>
        <div style="display: flex; justify-content: end;">
            <div style="text-align: center; margin-top: 20px; padding: 10px; width: 200px;">
                <span>Amuntai, <?= Date('d') ?> <?= BULAN_DALAM_INDONESIA[Date('m') - 1] ?> <?= Date('Y') ?></span>
                <br>
                <span>Mengetahui</span>
                <br><br><br>
                <span>Sukma Handayani, M.Si</span>
                <span>(197503111996122000)</span>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>