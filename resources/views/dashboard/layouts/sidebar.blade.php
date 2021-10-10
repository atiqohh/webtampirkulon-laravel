<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
          <img src="/img/logo-mini.png" alt="logo" height="50">
      </div>
      <div class="sidebar-brand-text">TAMPIRKULON</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
    <a class="nav-link" aria-current="page" href="/dashboard">
      <i class="fas fa-home"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Reservasi -->
  <li class="nav-item {{ Request::is('dashboard/reservasi*') ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard/reservasi">
      <i class="fas fa-calendar-day"></i>
      <span>Reservasi</span></a>
  </li>

  <!-- Nav Item - Pemandu -->
  <li class="nav-item {{ Request::is('dashboard/pemandu*') ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard/pemandu">
      <i class="fas fa-users"></i>
      <span>Pemandu</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Artikel -->
  <li class="nav-item {{ Request::is('dashboard/artikel*') ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard/artikel">
      <i class="far fa-newspaper"></i>
      <span>Artikel</span></a>
  </li>

  <!-- Nav Item - Pengumuman -->
  <li class="nav-item {{ Request::is('dashboard/pengumuman*') ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard/pengumuman">
      <i class="far fa-comment-alt"></i>
      <span>Pengumuman</span></a>
  </li>

  <!-- Nav Item - Wisata -->
  <li class="nav-item {{ Request::is('dashboard/wisata*') ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard/wisata">
      <i class="fas fa-map-marker-alt"></i>
      <span>Wisata</span></a>
  </li>

  <!-- Nav Item - Paket Wisata -->
  <li class="nav-item {{ Request::is('dashboard/paket*') ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard/paket">
      <i class="far fa-credit-card"></i>
      <span>Paket Wisata</span></a>
  </li>

  <!-- Nav Item - UMKM -->
  <li class="nav-item {{ Request::is('dashboard/umkm*') ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard/umkm">
      <i class="fas fa-store-alt"></i>
      <span>UMKM</span></a>
  </li>

  <!-- Nav Item - galeri -->
  <li class="nav-item {{ Request::is('dashboard/galeri*') ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard/galeri">
      <i class="far fa-images"></i>
      <span>Galeri</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - admin -->
  <li class="nav-item {{ Request::is('dashboard/admin*') ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard/admin">
      <i class="fas fa-users-cog"></i>
      <span>Admin</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>