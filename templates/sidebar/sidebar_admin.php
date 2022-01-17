<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        BPS HSU
        <!-- <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a> -->
        <!-- <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a> -->
    </div>
    <ul class="nav">
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items <?= isset($_GET['page']) ? (($_GET['page'] == "") ? "active" : "")  : "active" ?>">
            <a class="nav-link" href="?">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items 
        <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "buku_tamu") echo "active";
        }
        ?>">
            <a class="nav-link" href="?page=buku_tamu">
                <span class="menu-icon">
                    <i class="mdi mdi-contacts"></i>
                </span>
                <span class="menu-title">Buku Tamu</span>
            </a>
        </li>
        <li class="nav-item menu-items 
        <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "data_tamu") echo "active";
            else if ($_GET['page'] == "edit_tamu") echo "active";
        }
        ?>">
            <a class="nav-link" href="?page=data_tamu">
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
            <a class="nav-link" href="?page=data_divisi">
                <span class="menu-icon">
                    <i class="mdi mdi-contacts"></i>
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
            <a class="nav-link" href="?page=data_pegawai">
                <span class="menu-icon">
                    <i class="mdi mdi-contacts"></i>
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
            <a class="nav-link" href="?page=data_user">
                <span class="menu-icon">
                    <i class="mdi mdi-contacts"></i>
                </span>
                <span class="menu-title">Data User</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="?page=laporan">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Laporan</span>
            </a>
        </li>
    </ul>
</nav>