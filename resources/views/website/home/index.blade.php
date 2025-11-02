@extends('website.layout')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">Selamat Datang</h1>
        <h2 data-aos="fade-up" data-aos-delay="400">Sistem Informasi Pelayanan Administrasi Terpadu Civitas Akamedik (SILAKSA)</h2>
      </div>
      <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="{{ asset('website/img/hero-img.png') }}" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</section>
<!-- End Hero -->

<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">
    <div class="row gx-0">

      <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
          <h3>Tentang Kami</h3>
          <h2>Sistem Informasi Pelayanan Administrasi Terpadu Civitas Akamedik (SILAKSA)</h2>
          <p>
            Adalah sistem informasi yang dapat digunakan oleh mahasiswa aktif Fakultas Hukum untuk memudahkan proses pengajuan surat-surat yang dibutuhkan selama proses perkuliahan
          </p>
        </div>
      </div>

      <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
        <img src="{{ asset('website/img/fh.png') }}" class="img-fluid" alt="">
      </div>

    </div>
  </div>

</section><!-- End About Section -->

<!-- ======= Bagian Jurusan ======= -->
<section id="jurusan" class="values">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Jurusan</h2>
      <p>Jurusan Yang Ada Di FH</p>
    </header>

    <div class="row">

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="box">
          <img src="{{ asset('website/img/values-1.png') }}" class="img-fluid" alt="">
          <h3>Informatika</h3>
        </div>
      </div>

      <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
        <div class="box">
          <img src="{{ asset('website/img/values-2.png') }}" class="img-fluid" alt="">
          <h3>Sistem Informasi</h3>
        </div>
      </div>

      <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
        <div class="box">
          <img src="{{ asset('website/img/values-3.png') }}" class="img-fluid" alt="">
          <h3>Sains Data</h3>
        </div>
      </div>

    </div>

  </div>

</section><!-- End Bagian Jurusan -->

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
  <div class="container" data-aos="fade-up">

    <div class="row gy-4">

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-emoji-smile"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Pengguna Mahasiswa</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Pengajuan</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-headset" style="color: #15be56;"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p>Pengajuan Diproses</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-people" style="color: #bb0852;"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Pengajuan Selesai</p>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Counts Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Layanan</h2>
      <p>Layanan Yang Kami Sediakan</p>
    </header>

    <div class="row gy-4">

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-box blue">
          <i class="ri-discuss-line icon"></i>
          <h3>Perkuliahan</h3>
          <p>Informasi seputar </p>
          <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-box orange">
          <i class="ri-discuss-line icon"></i>
          <h3>Surat Pengantar</h3>
          <p>Layanan pengajuan dan monitoring berbagai macam surat pengantar.</p>
          <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="service-box green">
          <i class="ri-discuss-line icon"></i>
          <h3>Surat Keterangan</h3>
          <p>Layanan pengajuan dan monitoring berbagai macam surat keterangan.</p>
          <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
        <div class="service-box red">
          <i class="ri-discuss-line icon"></i>
          <h3>Surat Rekomendasi</h3>
          <p>Layanan pengajuan dan monitoring berbagai macam surat rekomendasi.</p>
          <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="service-box purple">
          <i class="ri-discuss-line icon"></i>
          <h3>Surat Lainnya</h3>
          <p>Layanan pengajuan dan monitoring berbagai macam surat-surat lain yang dibutuhkan mahasiswa.</p>
          <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
        <div class="service-box pink">
          <i class="ri-discuss-line icon"></i>
          <h3>Yudisium</h3>
          <p>Layanan sistem informasi untuk proses yudisium.</p>
          <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

    </div>

  </div>

</section><!-- End Services Section -->

<!-- ======= F.A.Q Section ======= -->
{{-- <section id="faq" class="faq">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>F.A.Q</h2>
      <p>Pertanyaan Yang Sering Ditanyakan</p>
    </header>

    <div class="row">
      <div class="col-lg-6">
        <!-- F.A.Q List 1-->
        <div class="accordion accordion-flush" id="faqlist1">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                Non consectetur a erat nam at lectus urna duis?
              </button>
            </h2>
            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
              <div class="accordion-body">
                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
              </button>
            </h2>
            <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
              <div class="accordion-body">
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
              </button>
            </h2>
            <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
              <div class="accordion-body">
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="col-lg-6">

        <!-- F.A.Q List 2-->
        <div class="accordion accordion-flush" id="faqlist2">

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
              </button>
            </h2>
            <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
              <div class="accordion-body">
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                Tempus quam pellentesque nec nam aliquam sem et tortor consequat?
              </button>
            </h2>
            <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
              <div class="accordion-body">
                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                Varius vel pharetra vel turpis nunc eget lorem dolor?
              </button>
            </h2>
            <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
              <div class="accordion-body">
                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>

</section> --}}
<!-- End F.A.Q Section -->

<!-- ======= Portfolio Section ======= -->
{{-- <section id="portfolio" class="portfolio">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Galeri</h2>
      <p>Galeri Foto FH</p>
    </header>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-app">App</li>
          <li data-filter=".filter-card">Card</li>
          <li data-filter=".filter-web">Web</li>
        </ul>
      </div>
    </div>

    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-wrap">
          <img src="{{ asset('website/img/portfolio/portfolio-1.jpg') }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>App 1</h4>
            <p>App</p>
            <div class="portfolio-links">
              <a href="{{ asset('website/img/portfolio/portfolio-1.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <div class="portfolio-wrap">
          <img src="{{ asset('website/img/portfolio/portfolio-2.jpg') }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Web 3</h4>
            <p>Web</p>
            <div class="portfolio-links">
              <a href="{{ asset('website/img/portfolio/portfolio-2.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-wrap">
          <img src="{{ asset('website/img/portfolio/portfolio-3.jpg') }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>App 2</h4>
            <p>App</p>
            <div class="portfolio-links">
              <a href="{{ asset('website/img/portfolio/portfolio-3.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 2"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-wrap">
          <img src="{{ asset('website/img/portfolio/portfolio-4.jpg') }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Card 2</h4>
            <p>Card</p>
            <div class="portfolio-links">
              <a href="{{ asset('website/img/portfolio/portfolio-4.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 2"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <div class="portfolio-wrap">
          <img src="{{ asset('website/img/portfolio/portfolio-5.jpg') }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Web 2</h4>
            <p>Web</p>
            <div class="portfolio-links">
              <a href="{{ asset('website/img/portfolio/portfolio-5.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 2"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-wrap">
          <img src="{{ asset('website/img/portfolio/portfolio-6.jpg') }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>App 3</h4>
            <p>App</p>
            <div class="portfolio-links">
              <a href="{{ asset('website/img/portfolio/portfolio-6.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 3"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-wrap">
          <img src="{{ asset('website/img/portfolio/portfolio-7.jpg') }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Card 1</h4>
            <p>Card</p>
            <div class="portfolio-links">
              <a href="{{ asset('website/img/portfolio/portfolio-7.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 1"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-wrap">
          <img src="{{ asset('website/img/portfolio/portfolio-8.jpg') }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Card 3</h4>
            <p>Card</p>
            <div class="portfolio-links">
              <a href="{{ asset('website/img/portfolio/portfolio-8.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 3"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <div class="portfolio-wrap">
          <img src="{{ asset('website/img/portfolio/portfolio-9.jpg') }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Web 3</h4>
            <p>Web</p>
            <div class="portfolio-links">
              <a href="{{ asset('website/img/portfolio/portfolio-9.jpg') }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
              <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</section> --}}
<!-- End Portfolio Section -->

<!-- ======= Team Section ======= -->
{{-- <section id="team" class="team">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Dekanat</h2>
      <p>Dekanat Fakultas Hukum</p>
    </header>

    <div class="row gy-4">

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="member">
          <div class="member-img">
            <img src="{{ asset('website/img/team/team-1.jpg') }}" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Walter White</h4>
            <span>Dekan</span>
            <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum exercitationem iure minima enim corporis et voluptate.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
        <div class="member">
          <div class="member-img">
            <img src="{{ asset('website/img/team/team-2.jpg') }}" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Sarah Jhonson</h4>
            <span>Wakil Dekan 1</span>
            <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
        <div class="member">
          <div class="member-img">
            <img src="{{ asset('website/img/team/team-3.jpg') }}" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>William Anderson</h4>
            <span>Wakil Dekan 2</span>
            <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates enim aut architecto porro aspernatur molestiae modi.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
        <div class="member">
          <div class="member-img">
            <img src="{{ asset('website/img/team/team-4.jpg') }}" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Amanda Jepson</h4>
            <span>Wakil Dekan 3</span>
            <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut aliquid doloremque ut possimus ipsum officia.</p>
          </div>
        </div>
      </div>

    </div>

  </div>

</section> --}}
<!-- End Team Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Kontak</h2>
      <p>Kontak Kami</p>
    </header>

    <div class="row gy-4">

      <div class="col">

        <div class="row gy-4">
          <div class="col">
            <div class="info-box">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <p>Gedung FH 2<br>Jl. Rungkut Madya No.1, Kec. Gunung Anyar, Surabaya, Jawa Timur 60294</p>
            </div>
          </div>
          <div class="col">
            <div class="info-box">
              <i class="bi bi-telephone"></i>
              <h3>Telp</h3>
              <p><a href="tel:+62 (031) 870 6369">+62 (031) 870 6369</a></p>
            </div>
          </div>
          <div class="col">
            <div class="info-box">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:fh@upnjatim.ac.id">fh@upnjatim.ac.id</a></p>
            </div>
          </div>
          <div class="col">
            <div class="info-box">
              <i class="bi bi-clock"></i>
              <h3>Jam Operasional</h3>
              <p>Senin - Jumat<br>07:30 - 16:00</p>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</section><!-- End Contact Section -->
@stop
