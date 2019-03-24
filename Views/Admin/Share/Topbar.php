<header id="header" class="header">
    <div class="top-left" style="height: 53px">
        <div class="navbar-header">
            <a class="navbar-brand text-center p-0" href="<?= WEB_FOLDER ?>/admin"><img src="<?= WEB_FOLDER ?>/public/img/logo.png" alt="Logo" height="53px"></a>
            <a class="navbar-brand hidden" href="./"><img src=""></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>
            </div>
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="<?= WEB_FOLDER . '/upload/admin-img/' . $admin->admin_image ?>" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <!--a class="nav-link" href="#"><i class="fa fa-user"></i>My Profile</a>
                    <a class="nav-link" href="#"><i class="fa fa-bell-o"></i>Notifications <span class="count">13</span></a>
                    <a class="nav-link" href="#"><i class="fa fa-cog"></i>Settings</a-->
                    <a class="nav-link" href="<?= WEB_FOLDER ?>/admin/accounts/logout"><i class="fa fa-power-off"></i>Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>