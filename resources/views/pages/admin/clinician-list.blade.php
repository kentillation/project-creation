@extends('includes/admin-sidenav')

@section('page-content')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>List of clinicians</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item">Clinicians</li>
                <li class="breadcrumb-item active">List of clinicians</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
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
                                    @foreach ($tbl_clinician as $clinician)
                                        <tr>
                                            <td>{{ $clinician->name }}</td>
                                            <td>{{ $clinician->email }}</td>
                                            <td>{{ $clinician->username }}</td>
                                            <td>
                                                <a href="{{ route('update-clinician', ['id' => $clinician->id] ) }}">
                                                    <button class="btn btn-outline-success btn-sm" title="Modify">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('delete-clinician', ['id' => $clinician->id] ) }}">
                                                    <button class="btn btn-outline-danger btn-sm" title="Move to trash">
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