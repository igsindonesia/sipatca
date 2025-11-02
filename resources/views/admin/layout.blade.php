<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SILAKSA - Fakultas Hukum</title>
  <link href="{{ asset('website/img/favicon.png') }}" rel="icon">

  @include('admin.partials.style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('admin.partials.navbar')
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('admin.index') }}">SILAKSA</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.index') }}">SPC</a>
          </div>
          @include('admin.partials.sidebar')
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  @include('admin.partials.script')
</body>
</html>
