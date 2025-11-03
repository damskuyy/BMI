<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login - BMI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('be/css/app.css') }}">
  <style>
    .login-wrapper{min-height:100vh;display:flex;align-items:center;justify-content:center;background:#f6f8fb}
    .login-card{max-width:420px;width:100%}
  </style>
</head>
<body class="login-wrapper">
  <div class="card login-card">
    <div class="card-body">
      <div class="text-center mb-3">
        <img src="{{ asset('fe/img/logo/logo-bmi-kotak.png') }}" alt="BMI" style="height:56px">
        <h5 class="mt-2">Admin Dashboard Login</h5>
      </div>

      @if($errors->any())
        <div class="alert alert-danger">
          {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autofocus>
          @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
          @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <div class="d-grid">
          <button class="btn btn-primary">Login</button>
        </div>
      </form>

      <div class="mt-3 text-center text-muted small">
        Masuk untuk mengelola dashboard.
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>