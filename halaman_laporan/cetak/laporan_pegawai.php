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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pegawai</title>
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
        <h2 class="text-center">Laporan Pegawai</h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Divisi Bekerja</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal Lahir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $result = $mysqli->query("SELECT * FROM tabel_pegawai INNER JOIN tabel_divisi ON tabel_pegawai.id_divisi=tabel_divisi.id ORDER BY tabel_pegawai.id");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $row['nip']; ?></td>
                            <td class="text-center"><?= $row['nama']; ?></td>
                            <td class="text-center"><?= $row['nama_divisi']; ?></td>
                            <td class="text-center"><?= $row['jenis_kelamin']; ?></td>
                            <td class="text-center"><?= $row['nomor_telepon']; ?></td>
                            <td class="text-center">
                                <?php
                                $tahun_bulan_tanggal = $row['tanggal_lahir'];
                                $tahun = explode("-", $tahun_bulan_tanggal)[0];
                                $bulan = explode("-", $tahun_bulan_tanggal)[1];
                                $tanggal = explode("-", $tahun_bulan_tanggal)[2];
                                ?>
                                <?= $tanggal . " " . BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun ?>
                            </td>
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