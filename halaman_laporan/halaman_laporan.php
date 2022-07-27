<?php

require_once "database/koneksi.php";

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-dark"> Laporan </h3>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card bg-light shadow">
                    <div class="card-body">
                        <h4 class="card-title text-dark">Data Kunjungan</h4>
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_tamu.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="dari_tanggal" class="col-sm-3 col-form-label text-dark">Dari Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-dark bg-light" value="<?= Date("Y-m-d"); ?>" id="dari_tanggal" name="dari_tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sampai_tanggal" class="col-sm-3 col-form-label text-dark">Sampai Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-dark bg-light" value="<?= Date("Y-m-d"); ?>" id="sampai_tanggal" name="sampai_tanggal">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card bg-light shadow">
                    <div class="card-body">
                        <h4 class="card-title text-dark">Data Pengajuan Kunjungan</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_pengajuan.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="dari_tanggal" class="col-sm-3 col-form-label text-dark">Dari Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-dark bg-light" value="<?= Date("Y-m-d"); ?>" id="dari_tanggal" name="dari_tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sampai_tanggal" class="col-sm-3 col-form-label text-dark">Sampai Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-dark bg-light" value="<?= Date("Y-m-d"); ?>" id="sampai_tanggal" name="sampai_tanggal">
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
                <div class="card bg-light shadow">
                    <div class="card-body">
                        <h4 class="card-title text-dark">Data Pegawai</h4>
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
                <div class="card bg-light shadow">
                    <div class="card-body">
                        <h4 class="card-title text-dark">Data User Tamu</h4>
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
                <div class="card bg-light shadow">
                    <div class="card-body">
                        <h4 class="card-title text-dark">Data Pendaftaran Akun Tamu</h4>
                        <!-- <p class="card-description"> Data Divisi </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_pendaftaran_akun.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="dari_tanggal" class="col-sm-3 col-form-label text-dark">Dari Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-dark bg-light" value="<?= Date("Y-m-d"); ?>" id="dari_tanggal" name="dari_tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sampai_tanggal" class="col-sm-3 col-form-label text-dark">Sampai Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-dark bg-light" value="<?= Date("Y-m-d"); ?>" id="sampai_tanggal" name="sampai_tanggal">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card bg-light shadow">
                    <div class="card-body">
                        <h4 class="card-title text-dark">Indeks Kepuasan Masyarakat</h4>
                        <!-- <p class="card-description"> Data IKM </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_ikm.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="dari_tanggal" class="col-sm-3 col-form-label text-dark">Dari Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-dark bg-light" value="<?= Date("Y-m-d"); ?>" id="dari_tanggal" name="dari_tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sampai_tanggal" class="col-sm-3 col-form-label text-dark">Sampai Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-dark bg-light" value="<?= Date("Y-m-d"); ?>" id="sampai_tanggal" name="sampai_tanggal">
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
                <div class="card bg-light shadow">
                    <div class="card-body">
                        <h4 class="card-title text-dark">Data Jenis Kunjungan</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_jenis_kunjungan.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="tahun" class="col-sm-3 col-form-label text-dark">Tahun</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control text-dark bg-light" value="<?= Date("Y"); ?>" id="tahun" name="tahun">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card bg-light shadow">
                    <div class="card-body">
                        <h4 class="card-title text-dark">Grafik Kunjungan</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_grafik_pengunjung.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="dari_bulan" class="col-sm-3 col-form-label text-dark">Dari Bulan</label>
                                <div class="col-sm-9">
                                    <input type="month" class="form-control text-dark bg-light" value="<?= Date("Y-m"); ?>" id="dari_bulan" name="dari_bulan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sampai_bulan" class="col-sm-3 col-form-label text-dark">Sampai Bulan</label>
                                <div class="col-sm-9">
                                    <input type="month" class="form-control text-dark bg-light" value="<?= Date("Y-m"); ?>" id="sampai_bulan" name="sampai_bulan">
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
                <div class="card bg-light shadow">
                    <div class="card-body">
                        <h4 class="card-title text-dark">Data Grafik IKM</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_grafik_ikm.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="tahun" class="col-sm-3 col-form-label text-dark">Tahun</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control text-dark bg-light" value="<?= Date("Y"); ?>" id="tahun" name="tahun">
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