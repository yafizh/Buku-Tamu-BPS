<nav class="sidebar sidebar-offcanvas" style="background-color: #0093D9;" id="sidebar">
    <div class="sidebar-brand-wrapper bg-light d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" style="text-decoration:none;" href="index.html">
            <img src="logo.png" alt="logo" style="object-fit: contain; object-position: left;" />
            <span style="margin-left: -60px;">BPS HSU</span></a>
        <!-- <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="logo.png" alt="logo" /></a> -->
    </div>
    <style>
        .active .nav-link {
            background-color: #0075ad!important;
        }

        .menu-icon {
            background-color: white!important;
        }

        .nav-item:hover .nav-link{
            background-color: #0075ad!important;
        }
    </style>
    <ul class="nav">
        <li class="nav-item nav-category">
            <span class="nav-link text-white">Navigation</span>
        </li>
        <li class="nav-item menu-items <?= isset($_GET['page']) ? (($_GET['page'] == "") ? "active" : "")  : "active" ?>">
            <a class="nav-link text-white" href="?">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items 
        <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "data_tamu") echo "active";
            else if ($_GET['page'] == "edit_tamu") echo "active";
        }
        ?>">
            <a class="nav-link text-white" href="?page=data_tamu">
                <span class="menu-icon">
                    <i class="mdi mdi-contacts"></i>
                </span>
                <span class="menu-title">Data Tamu</span>
            </a>
        </li>
        <li class="nav-item menu-items 
        <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "data_divisi") echo "active";
            else if ($_GET['page'] == "tambah_divisi") echo "active";
            else if ($_GET['page'] == "edit_divisi") echo "active";
        }
        ?>">
            <a class="nav-link text-white" href="?page=data_divisi">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Data Divisi</span>
            </a>
        </li>
        <li class="nav-item menu-items 
        <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "data_pegawai") echo "active";
            else if ($_GET['page'] == "tambah_pegawai") echo "active";
            else if ($_GET['page'] == "edit_pegawai") echo "active";
        }
        ?>">
            <a class="nav-link text-white" href="?page=data_pegawai">
                <span class="menu-icon">
                    <i class="mdi mdi-worker"></i>
                </span>
                <span class="menu-title">Data Pegawai</span>
            </a>
        </li>
        <li class="nav-item menu-items 
        <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "data_user") echo "active";
            else if ($_GET['page'] == "tambah_user") echo "active";
            else if ($_GET['page'] == "edit_user") echo "active";
        }
        ?>">
            <a class="nav-link text-white" href="?page=data_user">
                <span class="menu-icon">
                    <i class="mdi mdi-account"></i>
                </span>
                <span class="menu-title">Data User</span>
            </a>
        </li>
        <li class="nav-item menu-items 
        <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "data_pendaftar") echo "active";
            else if ($_GET['page'] == "tambah_pendaftar") echo "active";
            else if ($_GET['page'] == "edit_pendaftar") echo "active";
        }
        ?>">
            <a class="nav-link text-white" href="?page=data_pendaftar">
                <span class="menu-icon">
                    <i class="mdi mdi-account"></i>
                </span>
                <span class="menu-title">Data Pendaftar</span>
            </a>
        </li>
        <li class="nav-item menu-items <?= isset($_GET['page']) ? (($_GET['page'] == "laporan") ? "active" : "")  : "" ?>">
            <a class="nav-link text-white" href="?page=laporan">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Laporan</span>
            </a>
        </li>
    </ul>
</nav>