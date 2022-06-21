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
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_tamu_per_tanggal.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-3 col-form-label">Dari Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="tanggal" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="tanggal" name="tanggal">
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
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_tamu_per_tanggal.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-3 col-form-label">Dari Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="tanggal" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="tanggal" name="tanggal">
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
                        <p class="card-description"> Jumlah Pengunjung Tiap Pegawai </p>
                        <form class="forms-sample">
                            <a href="halaman_laporan/cetak/laporan_jumlah_pengunjung_per_pegawai.php" target="_blank" class="btn btn-primary me-2">Cetak</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data User Tamu</h4>
                        <p class="card-description"> Data User Tamu </p>
                        <form class="forms-sample">
                            <a href="halaman_laporan/cetak/laporan_pegawai.php" target="_blank" class="btn btn-primary me-2">Cetak</a>
                        </form>
                        <br>
                        <p class="card-description"> Jumlah Kunjungan Tiap Tamu </p>
                        <form class="forms-sample">
                            <a href="halaman_laporan/cetak/laporan_jumlah_pengunjung_per_pegawai.php" target="_blank" class="btn btn-primary me-2">Cetak</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Divisi</h4>
                        <p class="card-description"> Data Divisi </p>
                        <form class="forms-sample">
                            <a href="halaman_laporan/cetak/laporan_divisi.php" target="_blank" class="btn btn-primary me-2">Cetak</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Indeks Kepuasan Masyarakat</h4>
                        <p class="card-description"> Data IKM </p>
                        <form class="forms-sample">
                            <a href="halaman_laporan/cetak/laporan_user.php" target="_blank" class="btn btn-primary me-2">Cetak</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Agenda</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_tamu_per_tanggal.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-3 col-form-label">Dari Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="tanggal" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="tanggal" name="tanggal">
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
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_tamu_per_tanggal.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-3 col-form-label">Dari Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="tanggal" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="tanggal" name="tanggal">
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