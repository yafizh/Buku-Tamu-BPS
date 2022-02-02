<?php
require_once "../../database/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan User</title>
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
        <h2 class="text-center">Laporan User</h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $result = $mysqli->query("SELECT * FROM tabel_user ORDER BY id");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['username']; ?></td>
                            <td><?= $row['status']; ?></td>
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