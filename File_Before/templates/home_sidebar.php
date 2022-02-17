<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon rotate-n">
            <img src="<?= base_url('assets/img/logo unbaja.png'); ?>" width="65" height="50">
        </div>
        <div class=" sidebar-brand-text mx-0">SIAP_UNBAJA</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>HOME</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>">
            <i class="fas fa-fw fa-phone-square-alt"></i>
            <span>CONTACT</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>">
            <i class="fas fa-fw fa-address-card"></i>
            <span>ABOUT</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth'); ?>">
            <i class="fas fa-fw fa-sign-in-alt"></i>
            <span>Login</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->