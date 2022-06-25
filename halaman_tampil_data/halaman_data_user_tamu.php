<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Data User </h3>
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
                        <a href="index.php?page=tambah_user_tamu" class="btn btn-primary">Tambah User</a>
                        <!-- <h4 class="card-title">Data User</h4> -->
                        <!-- <p class="card-description"> Add class <code>.table-hover</code> -->
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                require_once "database/koneksi.php";
                                $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
                                $data_user = $mysqli->query("SELECT * FROM view_user WHERE id_tamu IS NOT NULL");
                                ?>
                                <tbody>
                                    <?php while ($row = $data_user->fetch_assoc()) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;"><?= $row['nama']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['username']; ?></td>
                                            <td class="text-center">
                                                <a href="index.php?page=detail_user_tamu&id_tamu=<?= $row['id_tamu']; ?>" class="btn-sm btn-info"><i class="mdi mdi-eye"></i></a>
                                                <a href="index.php?page=edit_user_tamu&id=<?= $row['id_tamu']; ?>" class="btn-sm btn-warning"><i class="mdi mdi-border-color"></i></a>
                                                <a href="index.php?page=delete_user_tamu&id=<?= $row['id_tamu']; ?>&id=<?= $row['id']; ?>" class="btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="mdi mdi-delete"></i></a>
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