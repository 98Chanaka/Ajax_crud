<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee Management System</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->

  <div class="card">

    <div class="card-body login-card-body">


        <form action="{{ route('adminlte') }}" method="GET">
            @csrf <!-- CSRF protection -->
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>



        </form>
        <!-- Display error messages here -->
        @if ($errors->has('login_error'))
            <div class="alert alert-danger">
                {{ $errors->first('login_error') }}
            </div>
        @endif





    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
