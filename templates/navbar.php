<nav class="navbar p-0 fixed-top d-flex flex-row bg-light">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <!-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a> -->
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <?php if (isset($_GET['page'])) : ?>
            <?php if (explode('_', $_GET['page'])[0] == 'data') : ?>
                <ul class="navbar-nav w-100">
                    <li class="nav-item w-100">
                        <form method="POST" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            <input type="text" name="keyword" value="<?= isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" class="form-control text-white bg-light" placeholder="Cari Data...">
                        </form>
                    </li>
                </ul>
            <?php endif; ?>
        <?php endif; ?>
        <ul class="navbar-nav navbar-nav-right text-dark">
            <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                    <div class="navbar-profile">
                        <img class="img-xs rounded-circle" src="<?= is_null($_SESSION['user']['gambar']) ? 'uploads/avatar.jpg' : $_SESSION['user']['gambar']; ?>" alt="">
                        <p class="mb-0 d-none d-sm-block navbar-profile-name"><?= $_SESSION['user']['nama']; ?></p>
                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                    </div>
                </a>
                <div class="dropdown-menu bg-light dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                    <a href="index.php?page=edit_profile" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-light rounded-circle">
                                <i class="mdi mdi-account text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1">Profile</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="index.php?page=ganti_password" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1">Ganti Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="index.php?page=logout" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-logout text-danger"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1">Keluar</p>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>
    </div>
</nav>