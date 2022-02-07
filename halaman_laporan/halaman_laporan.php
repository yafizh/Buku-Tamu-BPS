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
                        <h4 class="card-title">Data Tamu Per Tanggal</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_tamu_per_tanggal.php" method="POST" target="_blank">
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control text-white" value="<?= Date("Y-m-d"); ?>" id="tanggal" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_divisi" class="col-sm-3 col-form-label">Divisi</label>
                                <div class="col-sm-9">
                                    <?php $data_divisi = $mysqli->query("SELECT * FROM tabel_divisi"); ?>
                                    <select class="form-control text-white" id="id_divisi" name="id_divisi">
                                        <option value="" selected>Semua Divisi</option>
                                        <?php while ($row = $data_divisi->fetch_assoc()) : ?>
                                            <option value="<?= $row['id']; ?>"><?= ucwords(strtolower($row['nama_divisi'])); ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_pegawai" class="col-sm-3 col-form-label">Pegawai</label>
                                <div class="col-sm-9">
                                    <?php $data_pegawai = $mysqli->query("SELECT * FROM tabel_pegawai"); ?>
                                    <select class="form-control text-white" id="id_pegawai" name="id_pegawai">
                                        <option value="" selected>Semua Pegawai</option>
                                        <?php while ($row = $data_pegawai->fetch_assoc()) : ?>
                                            <option value="<?= $row['id']; ?>"><?= ucwords(strtolower($row['nama'])); ?></option>
                                        <?php endwhile; ?>
                                    </select>
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
                        <h4 class="card-title">Data Tamu Per Bulan</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_tamu_per_bulan.php" target="_blank" method="POST">
                            <div class="form-group row">
                                <label for="bulan" class="col-sm-3 col-form-label">Bulan</label>
                                <div class="col-sm-9">
                                    <input type="month" value="<?= Date("Y-m"); ?>" class="form-control text-white" id="bulan" name="bulan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_divisi" class="col-sm-3 col-form-label">Divisi</label>
                                <div class="col-sm-9">
                                    <?php $data_divisi = $mysqli->query("SELECT * FROM tabel_divisi"); ?>
                                    <select class="form-control text-white" id="id_divisi" name="id_divisi">
                                        <option value="" selected>Semua Divisi</option>
                                        <?php while ($row = $data_divisi->fetch_assoc()) : ?>
                                            <option value="<?= $row['id']; ?>"><?= ucwords(strtolower($row['nama_divisi'])); ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_pegawai" class="col-sm-3 col-form-label">Pegawai</label>
                                <div class="col-sm-9">
                                    <?php $data_pegawai = $mysqli->query("SELECT * FROM tabel_pegawai"); ?>
                                    <select class="form-control text-white" id="id_pegawai" name="id_pegawai">
                                        <option value="" selected>Semua Pegawai</option>
                                        <?php while ($row = $data_pegawai->fetch_assoc()) : ?>
                                            <option value="<?= $row['id']; ?>"><?= ucwords(strtolower($row['nama'])); ?></option>
                                        <?php endwhile; ?>
                                    </select>
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
                        <h4 class="card-title">Data Tamu Per Tahun</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" action="halaman_laporan/cetak/laporan_tamu_per_tahun.php" target="_blank" method="POST">
                            <div class="form-group row">
                                <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                                <div class="col-sm-9">
                                    <input type="number" value="<?= Date("Y"); ?>" class="form-control text-white" id="tahun" name="tahun">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_divisi" class="col-sm-3 col-form-label">Divisi</label>
                                <div class="col-sm-9">
                                    <?php $data_divisi = $mysqli->query("SELECT * FROM tabel_divisi"); ?>
                                    <select class="form-control text-white" id="id_divisi" name="id_divisi">
                                        <option value="" selected>Semua Divisi</option>
                                        <?php while ($row = $data_divisi->fetch_assoc()) : ?>
                                            <option value="<?= $row['id']; ?>"><?= ucwords(strtolower($row['nama_divisi'])); ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_pegawai" class="col-sm-3 col-form-label">Pegawai</label>
                                <div class="col-sm-9">
                                    <?php $data_pegawai = $mysqli->query("SELECT * FROM tabel_pegawai"); ?>
                                    <select class="form-control text-white" id="id_pegawai" name="id_pegawai">
                                        <option value="" selected>Semua Pegawai</option>
                                        <?php while ($row = $data_pegawai->fetch_assoc()) : ?>
                                            <option value="<?= $row['id']; ?>"><?= ucwords(strtolower($row['nama'])); ?></option>
                                        <?php endwhile; ?>
                                    </select>
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
                        <h4 class="card-title">Pegawai</h4>
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
                        <br>
                        <p class="card-description"> Jumlah Pengunjung Tiap Divisi </p>
                        <form class="forms-sample">
                            <a href="halaman_laporan/cetak/laporan_jumlah_kunjungan_divisi.php" target="_blank" class="btn btn-primary me-2">Cetak</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User</h4>
                        <p class="card-description"> Data User </p>
                        <form class="forms-sample">
                            <a href="halaman_laporan/cetak/laporan_user.php" target="_blank" class="btn btn-primary me-2">Cetak</a>
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