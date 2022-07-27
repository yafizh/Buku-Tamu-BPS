<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-dark"> Data Lupa Password </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card bg-light">
                    <div class="card-body">
                        </p>
                        <div class="table-responsive">
                            <table class="table">
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
                                $data_user = $mysqli->query("SELECT tabel_tamu.id, tabel_tamu.nama, tabel_user.id AS id_user, tabel_user.username  FROM tabel_tamu INNER JOIN tabel_user ON tabel_tamu.id_user=tabel_user.id WHERE tabel_tamu.nama LIKE '%$keyword%' AND tabel_tamu.status='LUPA PASSWORD' ORDER BY tabel_tamu.id DESC");
                                ?>
                                <tbody>
                                    <?php while ($row = $data_user->fetch_assoc()) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;"><?= $row['nama']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['username']; ?></td>
                                            <td class="text-center">
                                                <a href="index.php?page=detail_user_lupa_password&id=<?= $row['id']; ?>" class="btn-sm btn-info"><i class="mdi mdi-eye"></i></a>
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