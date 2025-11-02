<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SILAKSA - Fakultas Hukum</title>
  <meta content="Sistem Informasi Pelayanan Administrasi Terpadu Civitas Akamedik" name="description">
  <meta content="Sistem Informasi Pelayanan Administrasi Terpadu Civitas Akamedik" name="keywords">

  @include('website.partials.style')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('website.partials.navbar')
  <!-- End Header -->

  <main id="main" class="d-flex flex-column justify-content-between vh-100">
    <div class="flex-grow-1">
        @yield('content')
    </div>

    <!-- ======= Footer ======= -->
    @include('website.partials.footer')
    <!-- End Footer -->
  </main>
  <!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('website.partials.script')
</body>

</html>
