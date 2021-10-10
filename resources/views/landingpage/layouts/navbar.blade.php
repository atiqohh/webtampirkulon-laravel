<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <a class="navbar-brand logo_h m-0" href="/"><img src="/img/logo-mini.png" alt="logo" height="80"></a>
                <a class="mt-1 judul" href="/"><h6>POKDARWIS <br> Tampir Kulon Asri</h6></a>
      
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-end">
                        <li class="nav-item mr-4 {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="/">Home</a></li> 
                        <li class="nav-item mr-4 {{ Request::is('artikel*') ? 'active' : '' }}"><a class="nav-link" href="/artikel">Artikel</a></li> 
                        <li class="nav-item mr-4 {{ Request::is('wisata*') ? 'active' : '' }}"><a class="nav-link" href="/wisata">Wisata</a>
                        <li class="nav-item mr-4 {{ Request::is('paket*') ? 'active' : '' }}"><a class="nav-link" href="/paket">Paket Wisata</a>
                        <li class="nav-item mr-4 {{ Request::is('reservasi*') ? 'active' : '' }}"><a class="nav-link" href="/reservasi">Reservasi</a>
                        <li class="nav-item mr-4 {{ Request::is('galeri*') ? 'active' : '' }}"><a class="nav-link" href="/galeri">Galeri</a>
                        <li class="nav-item mr-4 {{ Request::is('umkm*') ? 'active' : '' }}"><a class="nav-link" href="/umkm">UMKM</a>
                        <li class="nav-item mr-4 submenu dropdown {{ Request::is('tentangkami*') ? 'active' : '' }}">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Tentang Kami</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="/tentangkami/sejarah">Sejarah</a>                 
                                <li class="nav-item"><a class="nav-link" href="/tentangkami/kontak">Kontak</a>                 
                            </ul>
                        </li>
                    </ul>
                </div> 
            </div>
        </nav>
    </div>
  </header>