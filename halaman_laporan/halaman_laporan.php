<?php

require_once "database/koneksi.php";

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Laporan </h3>
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
            </nav> -->
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Kunjungan</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_tamu.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="dari_tanggal" class="col-sm-3 col-form-label">Dari Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="dari_tanggal" name="dari_tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sampai_tanggal" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="sampai_tanggal" name="sampai_tanggal">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pengajuan Kunjungan</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_pengajuan.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="dari_tanggal" class="col-sm-3 col-form-label">Dari Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="dari_tanggal" name="dari_tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sampai_tanggal" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="sampai_tanggal" name="sampai_tanggal">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pegawai</h4>
                        <p class="card-description"> Data Pegawai </p>
                        <form class="forms-sample">
                            <a href="halaman_laporan/cetak/laporan_pegawai.php" target="_blank" class="btn btn-primary me-2">Cetak</a>
                        </form>
                        <br>
                        <!-- <p class="card-description"> Jumlah Pengunjung Tiap Pegawai </p>
                        <form class="forms-sample">
                            <a href="halaman_laporan/cetak/laporan_jumlah_pengunjung_per_pegawai.php" target="_blank" class="btn btn-primary me-2">Cetak</a>
                        </form> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data User Tamu</h4>
                        <p class="card-description"> Data User Tamu </p>
                        <form class="forms-sample">
                            <a href="halaman_laporan/cetak/laporan_user_tamu.php" target="_blank" class="btn btn-primary me-2">Cetak</a>
                        </form>
                        <br>
                        <!-- <p class="card-description"> Jumlah Kunjungan Tiap Tamu </p>
                        <form class="forms-sample">
                            <a href="halaman_laporan/cetak/laporan_jumlah_pengunjung_per_pegawai.php" target="_blank" class="btn btn-primary me-2">Cetak</a>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pendaftaran Akun Tamu</h4>
                        <!-- <p class="card-description"> Data Divisi </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_pendaftaran_akun.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="dari_tanggal" class="col-sm-3 col-form-label">Dari Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="dari_tanggal" name="dari_tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sampai_tanggal" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="sampai_tanggal" name="sampai_tanggal">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Indeks Kepuasan Masyarakat</h4>
                        <!-- <p class="card-description"> Data IKM </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_ikm.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="dari_tanggal" class="col-sm-3 col-form-label">Dari Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="dari_tanggal" name="dari_tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sampai_tanggal" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="sampai_tanggal" name="sampai_tanggal">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Jenis Kunjungan</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_jenis_kunjungan.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control text-white" value="<?= Date("Y"); ?>" id="tahun" name="tahun">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Grafik Kunjungan</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_grafik_pengunjung.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="dari_bulan" class="col-sm-3 col-form-label">Dari Bulan</label>
                                <div class="col-sm-9">
                                    <input type="month" class="form-control text-white" value="<?= Date("Y-m"); ?>" id="dari_bulan" name="dari_bulan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sampai_bulan" class="col-sm-3 col-form-label">Sampai Bulan</label>
                                <div class="col-sm-9">
                                    <input type="month" class="form-control text-white" value="<?= Date("Y-m"); ?>" id="sampai_bulan" name="sampai_bulan">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Grafik IKM</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_grafik_ikm.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control text-white" value="<?= Date("Y"); ?>" id="tahun" name="tahun">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
</div>
<!-- main-panel ends -->