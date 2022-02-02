<?php
require_once "database/koneksi.php";
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <?php $hari_ini = $mysqli->query("SELECT COUNT(id) AS hari_ini FROM tabel_tamu WHERE tanggal=CURRENT_DATE()"); ?>
                                <?php $hari_ini = $hari_ini->fetch_assoc(); ?>
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"><?= !empty($hari_ini) ? $hari_ini['hari_ini'] : 0 ?></h3>
                                    <p class="text-white ms-2 mb-0 font-weight-medium">Orang</p>
                                </div>
                            </div>
                            <!-- <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div> -->
                        </div>
                        <h6 class="text-muted font-weight-normal">Hari ini</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <?php $minggu_ini = $mysqli->query("SELECT COUNT(id) AS minggu_ini FROM tabel_tamu WHERE tanggal BETWEEN CURRENT_DATE() - INTERVAL 1 WEEK AND CURRENT_DATE()"); ?>
                                <?php $minggu_ini = $minggu_ini->fetch_assoc(); ?>
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"><?= !empty($minggu_ini) ? $minggu_ini['minggu_ini'] : 0 ?></h3>
                                    <p class="text-white ms-2 mb-0 font-weight-medium">Orang</p>
                                </div>
                            </div>
                            <!-- <div class="col-3">
                                <div class="icon icon-box-success">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div> -->
                        </div>
                        <h6 class="text-muted font-weight-normal">Minggu ini</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <?php $bulan_ini = $mysqli->query("SELECT COUNT(id) AS bulan_ini FROM tabel_tamu WHERE MONTH(tanggal)=MONTH(CURRENT_DATE()) AND YEAR(tanggal)=YEAR(CURRENT_DATE())"); ?>
                                <?php $bulan_ini = $bulan_ini->fetch_assoc(); ?>
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"><?= !empty($bulan_ini) ? $bulan_ini['bulan_ini'] : 0 ?></h3>
                                    <p class="text-white ms-2 mb-0 font-weight-medium">Orang</p>
                                </div>
                            </div>
                            <!-- <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                </div>
                            </div> -->
                        </div>
                        <h6 class="text-muted font-weight-normal">Bulan ini</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <?php $tahun_ini = $mysqli->query("SELECT COUNT(id) AS tahun_ini FROM tabel_tamu WHERE YEAR(tanggal)=YEAR(CURRENT_DATE())"); ?>
                                <?php $tahun_ini = $tahun_ini->fetch_assoc(); ?>
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"><?= !empty($tahun_ini) ? $tahun_ini['tahun_ini'] : 0 ?></h3>
                                    <p class="text-white ms-2 mb-0 font-weight-medium">Orang</p>
                                </div>
                            </div>
                            <!-- <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div> -->
                        </div>
                        <h6 class="text-muted font-weight-normal">Tahun ini</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kunjungan Divisi Bulan ini</h4>
                        <canvas height="320" id="transaction-history" class="transaction-chart"></canvas>
                        <!-- <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                            <div class="text-md-center text-xl-left">
                                <h6 class="mb-1">Transfer to Paypal</h6>
                                <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                            </div>
                            <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                <h6 class="font-weight-bold mb-0">$236</h6>
                            </div>
                        </div>
                        <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                            <div class="text-md-center text-xl-left">
                                <h6 class="mb-1">Tranfer to Stripe</h6>
                                <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                            </div>
                            <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                <h6 class="font-weight-bold mb-0">$593</h6>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title mb-1">Kunjungan Terbaru</h4>
                            <!-- <p class="text-muted mb-1">Your data status</p> -->
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Divisi yang dikunjungi</th>
                                                <th>Karyawan yang dikunjungi</th>
                                                <th>Keperluan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $data_tamu = $mysqli->query("SELECT * FROM view_tamu ORDER BY id DESC"); ?>
                                            <?php while ($row = $data_tamu->fetch_assoc()) : ?>
                                                <tr>
                                                    <td style="vertical-align: middle;"><?= $row['nama']; ?></td>
                                                    <td style="vertical-align: middle;"><?= $row['tanggal']; ?></td>
                                                    <td style="vertical-align: middle;"><?= $row['nama_divisi']; ?></td>
                                                    <td style="vertical-align: middle;"><?= $row['nama_pegawai']; ?></td>
                                                    <td style="vertical-align: middle;"><?= $row['keperluan']; ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

</div>
<!-- main-panel ends -->