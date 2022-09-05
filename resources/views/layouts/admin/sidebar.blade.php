<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-users-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Artikel -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard/artikel">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Artikel</span></a>
    </li>

    <!-- Nav Item - Komentar-->
    <li class="nav-item">
        <a class="nav-link" href="/message">
            <i class="fas fa-fw fa-comments"></i>
            <span>Pesan</span></a>
    </li>
    <!-- Nav Item - Pengguna -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-users"></i>
            <span>Pengguna</span></a>
    </li> --}}
    <!-- Nav Item - Sosial Media -->
    <li class="nav-item">
        <a class="nav-link" href="/medsos">
            <i class="fas fa-fw fa-camera"></i>
            <span>Sosial Media</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
