<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SILAKSA - Fakultas Hukum</title>
  <link href="{{ asset('website/img/favicon.png') }}" rel="icon">

  {{-- <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css"> --}}
  @include('admin.partials.style')
</head>

<body>
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            SILAKSA
          </div>

          <div class="card card-primary">
            <div class="card-header"><h4>Masuk</h4></div>

            <div class="card-body">
              @foreach($errors->all() as $message)
                <div class="alert alert-danger" role="alert">
                  {{ $message }}
                </div>
              @endforeach
              <form method="POST" action="{{ route('admin.auth.login.process') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  <div class="invalid-feedback">
                    Email tidak boleh kosong
                  </div>
                </div>

                <div class="form-group">
                  <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    {{-- <div class="float-right">
                      <a href="auth-forgot-password.html" class="text-small">
                        Forgot Password?
                      </a>
                    </div> --}}
                  </div>
                  <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                  <div class="invalid-feedback">
                    Password tidak boleh kosong
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Masuk
                  </button>
                </div>
              </form>

            </div>
          </div>
          <div class="simple-footer">
            Copyright &copy; Stisla 2018
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('admin.partials.script')
</body>
</html>
