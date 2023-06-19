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
                            <h5 class="card-title">Head Title</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Age</th>
                                            <th scope="col">Start Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tbl_admin as $admin)
                                            <tr>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->username }}</td>
                                                <td>
                                                    <a href="{{ route('update-admin', ['id' => $admin->id] ) }}">
                                                        <button class="btn btn-outline-success btn-sm" title="Modify">
                                                            <i class="bi bi-pencil-square"></i>
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