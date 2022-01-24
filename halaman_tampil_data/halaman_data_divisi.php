<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Data Divisi </h3>
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
            </nav> -->
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php?page=tambah_divisi" class="btn btn-primary">Tambah Divisi</a>
                        <!-- <h4 class="card-title">Data Divisi</h4> -->
                        <!-- <p class="card-description"> Add class <code>.table-hover</code> -->
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Divisi</th>
                                        <th>Keterangan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                require_once "database/koneksi.php";
                                $data_divisi = $mysqli->query("SELECT * FROM tabel_divisi ORDER BY id DESC");
                                ?>
                                <tbody>
                                    <?php while ($row = $data_divisi->fetch_assoc()) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;"><?= $row['nama_divisi']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['keterangan']; ?></td>
                                            <td class="text-center">
                                                <a href="index.php?page=edit_divisi&id=<?= $row['id']; ?>" class="btn-sm btn-warning"><i class="mdi mdi-border-color"></i></a>
                                                <a href="index.php?page=delete_divisi&id=<?= $row['id']; ?>" class="btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="mdi mdi-delete"></i></a>
                                            </td>
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