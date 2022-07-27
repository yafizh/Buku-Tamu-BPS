<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-dark"> Data Pegawai </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card bg-light">
                    <div class="card-body">
                        <a href="index.php?page=tambah_pegawai" class="btn btn-primary">Tambah Pegawai</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Divisi</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Nomor Telepon</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                require_once "database/koneksi.php";
                                $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
                                $data_pegawai = $mysqli->query("SELECT * FROM view_pegawai WHERE nama LIKE '%$keyword%' OR nip LIKE '%$keyword%' OR nama_divisi LIKE '%$keyword%' OR jenis_kelamin LIKE '%$keyword%' OR nomor_telepon LIKE '%$keyword%' ORDER BY id DESC");
                                ?>
                                <tbody>
                                    <?php while ($row = $data_pegawai->fetch_assoc()) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;"><?= $row['nama']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['nip']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['nama_divisi']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['jenis_kelamin']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['tanggal_lahir']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['nomor_telepon']; ?></td>
                                            <td class="text-center">
                                                <a href="index.php?page=edit_pegawai&id=<?= $row['id']; ?>" class="btn-sm btn-warning"><i class="mdi mdi-border-color"></i></a>
                                                <a href="index.php?page=delete_pegawai&id=<?= $row['id']; ?>" class="btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="mdi mdi-delete"></i></a>
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