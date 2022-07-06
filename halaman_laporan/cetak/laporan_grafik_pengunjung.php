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


$dari_tahun_bulan = $_POST['dari_bulan'];
$dari_bulan = explode('-', $dari_tahun_bulan)[1];
$dari_tahun = explode('-', $dari_tahun_bulan)[0];

$sampai_tahun_bulan = $_POST['sampai_bulan'];
$sampai_bulan = explode('-', $sampai_tahun_bulan)[1];
$sampai_tahun = explode('-', $sampai_tahun_bulan)[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Grafik Pengunjung</title>
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
        <h2 class="text-center">Laporan Grafik Pengunjung</h2>
        <?php if ($dari_tahun_bulan === $sampai_tahun_bulan) : ?>
            <h2 class="text-center">Bulan <?= BULAN_DALAM_INDONESIA[$dari_bulan - 1] . ' ' . $dari_tahun; ?></h2>
        <?php else : ?>
            <h2 class="text-center">Bulan <?= BULAN_DALAM_INDONESIA[$dari_bulan - 1] . ' ' . $dari_tahun; ?> - <?= BULAN_DALAM_INDONESIA[$sampai_bulan - 1] . ' ' . $sampai_tahun; ?></h2>
        <?php endif; ?>
        <canvas id="lineChart" style="max-height:470px"></canvas>
        <div style="display: flex; justify-content: end;">
            <div style="text-align: center; margin-top: 20px; padding: 10px; width: 200px;">
                <span>Amuntai, <?= Date('d') ?> <?= BULAN_DALAM_INDONESIA[Date('m') - 1] ?> <?= Date('Y') ?></span>
                <br>
                <span>Mengetahui</span>
                <br><br><br>
                <span>Sukma Handayani, M.Si</span>
                <span>NIP. 197503111996122000</span>
            </div>
        </div>
    </div>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <?php
    $online = $mysqli->query("SELECT COUNT(nama) AS jumlah, MONTH(tanggal) AS bulan, YEAR(tanggal) AS tahun, jenis_pertemuan FROM  `view_tamu` WHERE jenis_pertemuan='ONLINE' AND (tanggal >= '$dari_tahun_bulan-01' AND tanggal <= '$sampai_tahun_bulan-31') GROUP BY MONTH(tanggal) ORDER BY bulan");
    $db_data_online = $online->fetch_all(MYSQLI_ASSOC);

    $offline = $mysqli->query("SELECT COUNT(nama) AS jumlah, MONTH(tanggal) AS bulan, YEAR(tanggal) AS tahun, jenis_pertemuan FROM  `view_tamu` WHERE jenis_pertemuan='OFFLINE' AND (tanggal >= '$dari_tahun_bulan-01' AND tanggal <= '$sampai_tahun_bulan-31') GROUP BY MONTH(tanggal) ORDER BY bulan");
    $db_data_offline = $offline->fetch_all(MYSQLI_ASSOC);

    $labels_online = [];
    $data_online = [];

    $temp = $dari_tahun_bulan;
    do {
        $bulan = (explode('-', $temp)[1]);
        $tahun = (explode('-', $temp)[0]);

        $check = false;
        foreach ($db_data_online as $index => $value) {
            if ($bulan == $value['bulan'] && $tahun == $value['tahun']) {
                $data_online[] = $value['jumlah'];
                unset($db_data_online[$index]);
                $check = true;
                break;
            }
        }

        if (!$check) {
            $data_online[] = 0;
        }

        $labels_online[] = BULAN_DALAM_INDONESIA[$bulan - 1];
        $temp = date('Y-m', strtotime($temp . ' + 1 month'));
    } while ($temp != date('Y-m', strtotime(($sampai_tahun_bulan) . '+1 months')));


    $labels_offline = [];
    $data_offline = [];

    $temp = $dari_tahun_bulan;
    do {
        $bulan = (explode('-', $temp)[1]);
        $tahun = (explode('-', $temp)[0]);

        $check = false;
        foreach ($db_data_offline as $index => $value) {
            if ($bulan == $value['bulan'] && $tahun == $value['tahun']) {
                $data_offline[] = $value['jumlah'];
                unset($db_data_offline[$index]);
                $check = true;
                break;
            }
        }

        if (!$check) {
            $data_offline[] = 0;
        }

        $labels_offline[] = BULAN_DALAM_INDONESIA[$bulan - 1];
        $temp = date('Y-m', strtotime($temp . ' + 1 month'));
    } while ($temp != date('Y-m', strtotime(($sampai_tahun_bulan) . '+1 months')));

    ?>
    <script>
        var data = {
            labels: JSON.parse('<?= json_encode($labels_online); ?>'),
            datasets: [{
                    label: 'Online',
                    data: JSON.parse('<?= json_encode($data_online); ?>'),
                    backgroundColor: [
                        'rgba(0,0,255,1)',
                    ],
                    borderColor: [
                        'rgba(0,0,255,1)',
                    ],
                    borderWidth: 1,
                    fill: false
                },
                {
                    label: 'Offline',
                    data: JSON.parse('<?= json_encode($data_offline); ?>'),
                    backgroundColor: [
                        'rgba(255,0,0,1)',
                    ],
                    borderColor: [
                        'rgba(255,0,0,1)',
                    ],
                    borderWidth: 1,
                    fill: false
                }
            ]
        };

        var options = {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Line Chart'
                }
            }
        };

        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: data,
            options: options
        });

        setTimeout(function(){
            window.print();
        },1000)
    </script>
</body>

</html>