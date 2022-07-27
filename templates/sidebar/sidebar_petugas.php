<nav class="sidebar sidebar-offcanvas" style="background-color: #0093D9;" id="sidebar">
    <div class="sidebar-brand-wrapper bg-light d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" style="text-decoration:none;" href="index.html">
            <img src="logo.png" alt="logo" style="object-fit: contain; object-position: left;" />
            <span style="margin-left: -60px;" class="">BPS HSU</span></a>
    </div>
    <style>
        .active .nav-link {
            background-color: #0075ad !important;
        }

        .menu-icon {
            background-color: white !important;
        }

        .nav .menu-items:hover .nav-link {
            background-color: #0075ad !important;
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
            if ($_GET['page'] == "buku_tamu") echo "active";
        }
        ?>">
            <a class="nav-link text-white" href="?page=buku_tamu">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open-variant"></i>
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
            if ($_GET['page'] == "data_user_tamu") echo "active";
            else if ($_GET['page'] == "edit_user_tamu") echo "active";
        }
        ?>">
            <a class="nav-link text-white" href="?page=data_user_tamu">
                <span class="menu-icon">
                    <i class="mdi mdi-contacts"></i>
                </span>
                <span class="menu-title">Data User Tamu</span>
            </a>
        </li>
        <li class="nav-item menu-items 
        <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "data_user_lupa_password") echo "active";
            else if ($_GET['page'] == "edit_lupa_password") echo "active";
        }
        ?>">
            <a class="nav-link text-white" href="?page=data_user_lupa_password">
                <span class="menu-icon">
                    <i class="mdi mdi-contacts"></i>
                </span>
                <span class="menu-title">Data Lupa Password</span>
            </a>
        </li>
    </ul>
</nav>