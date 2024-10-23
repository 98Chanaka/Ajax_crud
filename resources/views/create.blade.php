<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Management System</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Employee Dropdown Menu -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{ url('Home') }}" class="nav-link active">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Home
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{ url('Employee') }}" class="nav-link active">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Employee
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                    </li>
                    <!-- /.Employee Dropdown Menu -->
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </aside>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center"> <!-- Center the form -->
                    <div class="col-md-6"> <!-- Use half of the width -->
                        <div class="card">


                            <div class="card-body">
                                <form action="{{ url('Employee') }}" method="POST">
                                    @csrf <!-- CSRF protection -->
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="birthday">Birthday</label>
                                        <input type="date" class="form-control" id="birthday" name="birthday"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number</label>
                                        <input type="tel" class="form-control" id="mobile_number"
                                            name="mobile_number" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label><br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="frontend"
                                                name="status[]" value="Front End">
                                            <label class="form-check-label" for="frontend">Front End</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="backend"
                                                name="status[]" value="Back End">
                                            <label class="form-check-label" for="backend">Back End</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="fullstack"
                                                name="status[]" value="Full Stack">
                                            <label class="form-check-label" for="fullstack">Full Stack</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="other"
                                                name="status[]" value="Other">
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->



        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
