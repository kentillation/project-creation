@extends('includes/admin-sidenav')

@section('page-content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>List of system admins</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item">System Admins</li>
                    <li class="breadcrumb-item active">List of system admins</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createUserModal">
                                <i class="bi bi-plus"></i>
                                Add User
                            </button>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tbl_admin as $admin)
                                            <tr>
                                                <td>{{ $admin->first_name }} {{ $admin->middle_name }} {{ $admin->last_name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->username }}</td>
                                                <td>
                                                    <a href="{{ route('update-admin', ['id' => $admin->id] ) }}">
                                                        <button class="btn btn-outline-primary btn-sm" title="View">
                                                            <i class="bi bi-eye"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('delete-admin', ['id' => $admin->id] ) }}">
                                                        <button class="btn btn-outline-danger btn-sm" title="Delete">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Modal -->
  <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Student User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="{{ route('save-admin') }}" method="post" class="row g-3 needs-validation" novalidate>
                        @csrf

                        <div class="col-6">
                            <label for="first_name" class="form-label mt-2">First Name</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-file-person"></i>
                                </span>
                                <input type="text" name="first_name" id="first_name" class="form-control" required>
                                <div class="invalid-feedback">Enter your first name.</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="middle_name" class="form-label mt-2">Middle Name</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-file-person"></i>
                                </span>
                                <input type="text" name="middle_name" id="middle_name" class="form-control" required>
                                <div class="invalid-feedback">Enter your middle name.</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="last_name" class="form-label mt-2">Last Name</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-file-person"></i>
                                </span>
                                <input type="text" name="last_name" id="last_name" class="form-control" required>
                                <div class="invalid-feedback">Enter your last name.</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="yourEmail" class="form-label mt-2">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-at"></i>
                                </span>
                                <input type="email" name="email" class="form-control" required>
                                <div class="invalid-feedback">Enter your email.</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="username" class="form-label mt-2">Username</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-file-person"></i>
                                </span>
                                <input type="text" name="username" id="username" class="form-control" required>
                                <div class="invalid-feedback">Enter your user.</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="yourPassword" class="form-label mt-2">Password</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control" required>
                                <div class="invalid-feedback">Enter your password.</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-outline-success w-100 mt-2" type="submit">Create account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  
    <!-- for Data Tables -->
  
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  

        <!-- for Data Tables -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function () {
                $('table').DataTable();
            });
        </script>
    </main>

    @endsection