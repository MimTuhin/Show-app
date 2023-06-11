<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        
        
        <span class="text-white">(    <?php echo e(rolename(Auth::user()->role_id)); ?>     )</span>
         
         <span class="text-white"><?php echo e(Auth::user()->name ?? ''); ?></span>


        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('user.profile')); ?>">Profile</a></li>
                <li><hr class="dropdown-divider" /></li>

<!-- Authentication with logout -->
                <li>

<form method="POST" action="<?php echo e(route('logout')); ?>">
    <?php echo csrf_field(); ?>

    <a class="dropdown-item" href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">>Logout</a>
</form>

                </li>
                <!-- end Authentication -->
    </ul>
</nav>
<?php /**PATH F:\Web\show-app\resources\views/admin/layouts/partials/header.blade.php ENDPATH**/ ?>