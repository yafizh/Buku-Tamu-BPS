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
                        <a href="index.php?page=tambah_user" class="btn btn-primary">Tambah User</a>
                        <!-- <h4 class="card-title">Data User</h4> -->
                        <!-- <p class="card-description"> Add class <code>.table-hover</code> -->
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                require_once "database/koneksi.php";
                                $data_user = $mysqli->query("SELECT * FROM tabel_user ORDER BY id DESC");
                                ?>
                                <tbody>
                                    <?php while ($row = $data_user->fetch_assoc()) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;"><?= $row['nama']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['username']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['status']; ?></td>
                                            <td class="text-center">
                                                <a href="index.php?page=edit_user&id=<?= $row['id']; ?>" class="btn-sm btn-warning"><i class="mdi mdi-border-color"></i></a>
                                                <a href="index.php?page=delete_user&id=<?= $row['id']; ?>" class="btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="mdi mdi-border-color"></i></a>
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
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
        </div>
    </footer>
    <!-- partial -->
</div>