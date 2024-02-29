<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-custom sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user')?>">
        <div class="sidebar-brand-icon">
            <!-- <i class="fas fa-file-archive"></i> -->
            <img src="<?= base_url('assets/img/app-icon-putih.png')?>" alt="" class="icon-brad">
        </div>
        <!-- <div class="sidebar-brand-text mx-3">PORTAL INFORMASI</div> -->
    </a>

    <hr class="sidebar-divider mt-3 pb-0">

    <!-- QUERY MENU -->
    <?php
        echo menu_help('menu', 'user_sub_menu', 'url', 'icon', $title); 
    ?>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li> -->
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->