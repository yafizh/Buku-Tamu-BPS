<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Buku Tamu BPS HSU</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <?php if (isset($_SESSION['user'])) : ?>
            <?php if ($_SESSION['user']['status'] == 'ADMIN') : ?>
                <?php include_once "templates/sidebar/sidebar_admin.php"; ?>
            <?php elseif ($_SESSION['user']['status'] == 'PETUGAS') : ?>
                <?php include_once "templates/sidebar/sidebar_petugas.php"; ?>
            <?php endif; ?>
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_navbar.html -->
                <?php include_once "templates/navbar.php"; ?>
                <!-- partial -->
                <?php
                if (isset($_GET['page'])) {
                    switch ($_GET['page']) {
                        case "buku_tamu":
                            include_once "halaman_buku_tamu.php";
                            break;
                        case "buku_tamu_keluar":
                            include_once "halaman_buku_tamu/halaman_buku_tamu_keluar.php";
                            break;
                        case "tambah_user":
                            include_once "halaman_tambah_data/halaman_tambah_user.php";
                            break;
                        case "tambah_divisi":
                            include_once "halaman_tambah_data/halaman_tambah_divisi.php";
                            break;
                        case "tambah_pegawai":
                            include_once "halaman_tambah_data/halaman_tambah_pegawai.php";
                            break;
                        case "data_tamu":
                            include_once "halaman_tampil_data/halaman_data_tamu.php";
                            break;
                        case "data_user":
                            include_once "halaman_tampil_data/halaman_data_user.php";
                            break;
                        case "data_divisi":
                            include_once "halaman_tampil_data/halaman_data_divisi.php";
                            break;
                        case "data_pegawai":
                            include_once "halaman_tampil_data/halaman_data_pegawai.php";
                            break;
                        case "edit_tamu":
                            include_once "halaman_edit_data/halaman_edit_tamu.php";
                            break;
                        case "edit_user":
                            include_once "halaman_edit_data/halaman_edit_user.php";
                            break;
                        case "edit_divisi":
                            include_once "halaman_edit_data/halaman_edit_divisi.php";
                            break;
                        case "edit_pegawai":
                            include_once "halaman_edit_data/halaman_edit_pegawai.php";
                            break;
                        case "delete_tamu":
                            include_once "halaman_delete_data/halaman_delete_tamu.php";
                            break;
                        case "delete_user":
                            include_once "halaman_delete_data/halaman_delete_user.php";
                            break;
                        case "delete_divisi":
                            include_once "halaman_delete_data/halaman_delete_divisi.php";
                            break;
                        case "delete_pegawai":
                            include_once "halaman_delete_data/halaman_delete_pegawai.php";
                            break;
                        case "ganti_password":
                            include_once "halaman_profile/halaman_ganti_password.php";
                            break;
                        case "logout":
                            include_once "halaman_auth/halaman_logout.php";
                            break;
                        case "laporan":
                            include_once "halaman_laporan/halaman_laporan.php";
                            break;
                        default:
                            include_once "beranda.php";
                    }
                } else include_once "beranda.php";

                ?>
            </div>
        <?php else : ?>
            <script>window.location.href='halaman_auth/halaman_login.php';</script>;
        <?php endif; ?>
        <!-- partial -->
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>