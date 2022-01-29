<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" style="text-decoration:none;" href="index.html">
            <img src="logo.png" alt="logo" style="object-fit: contain; object-position: left;" />
            <span style="margin-left: -60px;" class="text-white">BPS HSU</span></a>
        <!-- <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="logo.png" alt="logo" /></a> -->
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
    </ul>
</nav>