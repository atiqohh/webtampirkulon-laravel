@extends('landingpage.layouts.main')

@section('container')

<!--================ Banner Section start =================-->
<section class="hero-banner text-center">
    <div class="container">
        <h6>KELOMPOK SADAR WISATA</h6>
        <h1>TAMPIR KULON ASRI</h1>
    </div>
</section>
<!--================ Banner Section end =================-->

<section class="bg-gray section-padding px-5 pt-5 pb-0">
    <div class="container">
        <div class="section-intro text-center">
            <h2>Pengumuman</h2>
            <div class="section-style"></div>
            <br>
        </div>
  
        <div class="owl-carousel owl-theme testimonial mt-0">
            @foreach ($pengumumans as $pengumuman)
            <div class="testimonial-item">
                <div class="media">
                    <div class="media-body text-center">
                        <h6>{{ $pengumuman->judul }}</h6>
                        <p>{{ $pengumuman->created_at }}</p>
                        <hr class="divider d-none d-md-block">
                        <a href="/pengumuman/detailpengumuman/{{ $pengumuman->slug }}"><button class="button">Detail</button></a>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    </div>
</section>

<section class="section-margin mx-5 mb-5 mt-0">
  <div class="container">
      <div class="row">
          <div class="row">
              <div class="card-feature card-feature-content">
                  <h2>Daya Tarik Wisata Tampir Kulon</h2>
                  <p></p>
              </div>
          </div>
          <div class="row text-center">
              <div class="col-md-6 col-lg-4">
                  <div class="card-feature text-center">
                      <div class="feature-icon">
                          <img src="img/home/png/003-pencil.png" alt="">
                      </div>
                      <h3>Wisata Alam</h3>
                      <p>Wisata Tampir Kulon memiliki daya tarik wisata alam, yaitu sungai dengan air yang jernih dan area persawahan</p>
                  </div>
              </div>

              <div class="col-md-6 col-lg-4">
                  <div class="card-feature text-center">
                      <div class="feature-icon">
                          <img src="img/home/png/004-home-page.png" alt="">
                      </div>
                      <h3>Wisata Budaya</h3>
                      <p>Daya tarik wisata budaya Tampir Kulon antara lain kerajinan, rumah tradisional dan tari tradisional</p>
                  </div>
              </div>

              <div class="col-md-6 col-lg-4">
                  <div class="card-feature text-center">
                      <div class="feature-icon">
                          <img src="img/home/png/005-headset.png" alt="">
                      </div>
                      <h3>Kuliner</h3>
                      <p>Di Desa Wisata Tampir Kulon terdapat beberapa tempat makan, mulai dari cafe hingga rumah makan keluarga</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<section class="section-padding p-5 priceTable-bg">
  <div class="container">
      <div class="section-intro-white pb-40px text-center">
          <h2>Paket Wisata</h2>
          <div class="section-style"></div>
          <br>
      </div>

      <div class="priceTable-relative">
          <div class="priceTable-wrapper">
              <div class="row">
                  @foreach ($pakets as $paket)
                  <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                      <div class="card text-center card-pricing">
                          <div class="card-pricing__header">
                              <h4>{{ $paket->nama }}</h4>
                              <br>
                              <h5 class="font-weight-bold">{{ $paket->harga }}</h5>
                              <!-- Divider -->
                              <hr class="divider d-none d-md-block">
                              <a href="/paket"><button class="button">Detail</button></a>
                              <a href="/reservasi"><button class="button">Reservasi</button></a>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
      </div>
  </div>
</section>

<section class="section-margin m-5 pb-50px">
  <div class="container">
      <div class="section-intro pb-40px text-center">
          <h2>Fasilitas</h2>
          <div class="section-style"></div>
      </div>

      <div class="row">
          <div class="col-lg-4 col-sm-6">
              <div class="card-service text-center">
                  <div class="service-icon">
                      <img src="img/home/png/006-server.png" alt="">
                  </div>
                  <h3>Penginapan</h3>
                  <p>Terdapat fasilitas penginapan yaitu <i>Homestay</i> “Omah Mbok e“ yang dapat digunakan wisatawan untuk menginap dan beristirahat</p>
              </div>
          </div>

          <div class="col-lg-4 col-sm-6">
              <div class="card-service text-center">
                  <div class="service-icon">
                      <img src="img/home/png/004-home-page.png" alt="">
                  </div>
                  <h3>Pemandu Wisata</h3>
                  <p>Wisatawan yang datang akan didampingi oleh pemandu wisata berpengalaman</p>
              </div>
          </div>

          <div class="col-lg-4 col-sm-6">
              <div class="card-service text-center">
                  <div class="service-icon">
                      <img src="img/home/png/007-server-1.png" alt="">
                  </div>
                  <h3>Balai Pertemuan</h3>
                  <p>Balai pertemuan yang dapat digunakan yaitu Balai Desa Tampirkulon, Ruang Pertemuan “Omah Mbok e” dan Omah Sawah</p>
              </div>
          </div>

          <div class="col-lg-4 col-sm-6">
              <div class="card-service text-center">
                  <div class="service-icon">
                      <img src="img/home/png/002-shield.png" alt="">
                  </div>
                  <h3>Toilet</h3>
                  <p>Terdapat toilet umum dibeberapa titik yang dapat digunakan oleh wisatawan</p>
              </div>
          </div>

          <div class="col-lg-4 col-sm-6">
              <div class="card-service text-center">
                  <div class="service-icon">
                      <img src="img/home/png/008-mail.png" alt="">
                  </div>
                  <h3>Tempat Makan</h3>
                  <p>Terdapat beberapa tempat makan yang dapat menjadi pilihan wisata untuk menyantap makanan</p>
              </div>
          </div>

          <div class="col-lg-4 col-sm-6">
              <div class="card-service text-center">
                  <div class="service-icon">
                      <img src="img/home/png/009-art.png" alt="">
                  </div>
                  <h3>Area Parkir</h3>
                  <p>Area wisata Tampir Kulon dilengkapi dengan area parkir yang cukup luas</p>
              </div>
          </div>
      </div>
  </div>
</section>

<section class="section-padding galeri-bg p-5">
  <div class="container">
      <div class="section-intro-white text-center">
          <h2>GALERI</h2>
          <div class="section-style"></div>
          <br>
      </div>

      <div class="priceTable-relative">
          <div class="priceTable-wrapper">
              <div class="row">
                  <div class="owl-carousel owl-theme testimonial">
                      @foreach ($galeris as $galeri)
                      <img src="/img/galeri/{{ $galeri->gambar }}" class="img-fluid" alt="galeri">
                      @endforeach
                  </div>
                </div>
            </div>
          <div>
              <br><br><br><br><br><br>
          </div>
      </div>
    </div>
</section>

<section class="bg-gray section-padding p-5">
    <div class="container">
        <div class="section-intro text-center">
            <h2>UMKM</h2>
            <div class="section-style"></div>
            <br>
        </div>
  
        <div class="owl-carousel owl-theme testimonial mt-0">
            @foreach ($umkms as $umkm)
            <div class="card-service text-center p-0 mb-0">
                <div class="testimonial-item py-0">
                    <div class="media-body text-center">
                        <h6>{{ $umkm->nama }}</h6>
                        <hr class="divider d-none d-md-block">
                        <a href="/umkm/detailumkm/{{ $umkm->slug }}"><button class="button">Detail</button></a>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    </div>
</section>
    
@endsection