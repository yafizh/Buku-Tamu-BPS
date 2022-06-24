<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Data Tamu </h3>
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
                        <!-- <a href="index.php?page=tambah_user" class="btn btn-primary">Tambah User</a> -->
                        <!-- <h4 class="card-title">Data User</h4> -->
                        <!-- <p class="card-description"> Add class <code>.table-hover</code> -->
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Karyawan yang dikunjungi</th>
                                        <th>Keperluan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                require_once "database/koneksi.php";
                                $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

                                if ($_SESSION['user']['status'] === 'TAMU')
                                    $query = "SELECT * FROM view_tamu WHERE (nama LIKE '%$keyword%' OR nama_pegawai LIKE '%$keyword%' OR keperluan LIKE '%$keyword%' ) AND id_tamu=" . $_SESSION['user']['id_tamu'];
                                else
                                    $query = "SELECT * FROM view_tamu WHERE nama LIKE '%$keyword%' OR nama_pegawai LIKE '%$keyword%' OR keperluan LIKE '%$keyword%'";

                                $data_tamu = $mysqli->query($query . " ORDER BY tanggal DESC, waktu DESC");
                                ?>
                                <tbody>
                                    <?php while ($row = $data_tamu->fetch_assoc()) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;"><?= $row['nama']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['tanggal']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['nama_pegawai']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['keperluan']; ?></td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <?php if (is_null($row['status']) || $row['status'] === 'SELESAI') : ?>
                                                    <div class="w-100 badge badge-outline-success">Selesai</div>
                                                <?php elseif ($row['status'] === 'DITERIMA') : ?>
                                                    <div class="w-100 badge badge-outline-success">Diterima</div>
                                                <?php elseif ($row['status'] === 'DITOLAK') : ?>
                                                    <div class="w-100 badge badge-outline-danger">Ditolak</div>
                                                <?php elseif ($row['status'] === 'PENGAJUAN') : ?>
                                                    <div class="w-100 badge badge-outline-warning">Pengajuan</div>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="index.php?page=detail_tamu&<?= (is_null($row['id']) ? ('id_pengajuan=' . $row['id_pengajuan']) : ('id=' . $row['id'])); ?>" class="btn-sm btn-info"><i class="mdi mdi-eye"></i></a>
                                                <a href="index.php?page=edit_tamu&<?= (is_null($row['id']) ? ('id_pengajuan=' . $row['id_pengajuan']) : ('id=' . $row['id'])); ?>" class="btn-sm btn-warning"><i class="mdi mdi-border-color"></i></a>
                                                <a href="index.php?page=delete_tamu&<?= (is_null($row['id']) ? ('id_pengajuan=' . $row['id_pengajuan']) : ('id=' . $row['id'])); ?>" class="btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="mdi mdi-delete"></i></a>
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