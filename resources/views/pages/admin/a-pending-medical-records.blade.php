@extends('includes/admin-sidenav')

@section('page-content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Pending Medical Record Requests</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Students Area</li>
                    <li class="breadcrumb-item">Medical Record Requests</li>
                    <li class="breadcrumb-item active">Pending Requests</li>
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
                                            <th scope="col">Phone</th>
                                            <th scope="col">Municipality / City</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($a_pending_records as $student_record)
                                            <tr>
                                                <td>{{ $student_record->first_name }} {{ $student_record->middle_name }} {{ $student_record->last_name }}</td>
                                                <td>{{ $student_record->phone }}</td>
                                                <td>{{ $student_record->muni_city }}</td>
                                                <td>
                                                    <a href="{{ route('a-view-pending-record', ['id' => $student_record->id]) }}">
                                                        <button class="btn btn-outline-primary btn-sm" title="View medical record">
                                                            <i class="bi bi-eye"></i>
                                                            View record
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->

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
    </main><!-- End #main -->

@endsection
