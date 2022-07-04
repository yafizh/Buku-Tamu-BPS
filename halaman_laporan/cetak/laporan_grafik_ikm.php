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


$tahun = $_POST['tahun'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Grafik IKM</title>
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
        <h2 class="text-center">Laporan Grafik IKM</h2>
        <h2 class="text-center">Tahun <?= $tahun; ?></h2>
        <canvas id="barChart" style="max-height:470px;"></canvas>
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
    $sql = "SELECT COUNT(nilai) AS jml, tabel_ikm.nilai FROM tabel_pengajuan INNER JOIN tabel_ikm ON tabel_ikm.id=tabel_pengajuan.id_ikm WHERE YEAR(tanggal)='2022' GROUP BY tabel_ikm.nilai ORDER BY tabel_ikm.nilai ASC";
    $result = $mysqli->query($sql);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    $data_grafik = [];
    for ($i=0; $i < 5; $i++) { 
        $data_grafik[] = $data[$i]['jml'];
    }
    ?>
    <script>
        var data = {
            labels: ["Sangat Buruk", "Buruk", "Cukup", "Baik", "Sangat Baik"],
            datasets: [{
                label: 'Sangat Buruk',
                data: JSON.parse('<?= json_encode($data_grafik); ?>'),
                backgroundColor: [
                    'rgba(255, 99, 132, .5)',
                    'rgba(255, 159, 64, .5)',
                    'rgba(255, 205, 86, .5)',
                    'rgba(75, 192, 192, .5)',
                    'rgba(54, 162, 235, .5)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, .5)',
                    'rgba(255, 159, 64, .5)',
                    'rgba(255, 205, 86, .5)',
                    'rgba(75, 192, 192, .5)',
                    'rgba(54, 162, 235, .5)',
                ],
                borderWidth: 1,
                fill: false
            }]
        };

        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    },
                    gridLines: {
                        color: "rgba(204, 204, 204,0.1)"
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: "rgba(204, 204, 204,0.1)"
                    }
                }]
            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            }
        };

        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: data,
            options: options
        });

        // setTimeout(function() {
        //     window.print();
        // }, 1000);
    </script>
</body>

</html>