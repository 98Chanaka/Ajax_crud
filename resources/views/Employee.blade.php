<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Employee Management System</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ url('Home') }}" class="brand-link">
            <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin</span>
        </a>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ url('/Home') }}" class="nav-link active">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Home<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <a href="{{ url('Employee') }}" class="nav-link active">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Employee<i class="right fas fa-angle-left"></i></p>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employee Management System</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/login">Logout</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <a onclick="addEmployee()" href="javascript:void(0)" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New Employee
                                </a>
                            </div>
                            <div class="card-body">
                                <table class="display" style="width: 100%" id="employee-datatable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Birth Day</th>
                                            <th>Gender</th>
                                            <th>Mobile Number</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Employee Modal -->
    <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="EmployeeForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="employeeModalLabel">Add Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>


                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="ID" id="employeeID">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" name="birthday" id="birthday" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="mobile_number" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile_number" id="mobile_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" name="status" id="status">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                            Close <span aria-hidden="true"></span>
                        </button>

                        <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#employee-datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('Employee') }}",
                    type: 'get'
                },
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'birthday', name: 'birthday' },
                    { data: 'gender', name: 'gender' },
                    { data: 'mobile_number', name: 'mobile_number' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action' }
                ],
                order: [[0, 'desc']]
            });
        });

        // Add Employee
        function addEmployee() {
            $('#EmployeeForm').trigger("reset");
            $('#employeeID').val('');
            $('#employeeModalLabel').html("Add Employee");
            $('#submitButton').html("Add");
            $('#employeeModal').modal('show');
        }
    // Edit Employee
    function editEmployee(id) {
        $.ajax({
            type: "GET",
            url: "/employee/" + id + "/edit",
            success: function(response) {
                $('#employeeID').val(response.id);
                $('#name').val(response.name);
                $('#birthday').val(response.birthday);
                $('#gender').val(response.gender);
                $('#mobile_number').val(response.mobile_number);
                $('#status').val(response.status);

                $('#employeeModalLabel').html("Edit Employee");
                $('#submitButton').html("Update");
                $('#employeeModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error("Error:", xhr.responseText);
                alert("Error occurred while processing your request: " + xhr.responseText);
            }
        });
    }




    $('#EmployeeForm').on('submit', function(e) {
        e.preventDefault();
        var id = $('#employeeID').val();
        var type = id ? 'PUT' : 'POST';
        var url = id ? "{{ url('Employee') }}" + '/' + id : "{{ url('Employee') }}";

        var formData = {
            name: $('#name').val(),
            birthday: $('#birthday').val(),
            gender: $('#gender').val(),
            mobile_number: $('#mobile_number').val(),
            status: $('#status').val()
        };

        $.ajax({
            type: type,
            url: url,
            data: JSON.stringify(formData),
            contentType: "application/json",
            success: function(response) {
                $('#employeeModal').modal('hide');
                $('#employee-datatable').DataTable().ajax.reload();
                alert(response.message);
            },
            error: function(xhr, status, error) {
                console.error("Error:", xhr.responseText);
                alert("Update Error occurred while processing your request: " + xhr.responseText);
            }
        });
    });


        // Delete Employee
        function deleteEmployee(id) {
            if (confirm("Are you sure you want to delete this employee?")) {
                $.ajax({
                    type: "DELETE",
                    url: "/employee/" + id,
                    success: function(response) {
                        $('#employee-datatable').DataTable().ajax.reload();
                        alert(response.message);
                    },
                    error: function(response) {
                        alert('Error occurred while deleting employee');
                    }
                });
            }
        }

    </script>
</div>
</body>
</html>
