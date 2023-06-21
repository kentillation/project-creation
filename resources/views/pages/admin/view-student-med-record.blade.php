@extends('includes/admin-sidenav')

@section('page-content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>View Medical Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item">List of Student Nurses</li>
          <li class="breadcrumb-item active">Student Medical Records</li>
        </ol>
      </nav>
    </div>
    <div class="mb-3">
      <a href="{{ route('student-list') }}" title="Back">
        <i class="bi bi-arrow-left"></i>
        &nbsp;Back
      </a>
    </div>
    @if(Session::has('success'))
      <div class="alert alert-success text-center alert-dismissible fade show" role="alert" id="alertbox">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if(Session::has('removal'))
      <div class="alert alert-danger text-center alert-dismissible fade show" role="alert" id="alertbox">
        {{ Session::get('removal') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-12">
          <div class="row">
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body m-2">
                  <h5 class="card-title"></h5>
                    <div class="table-responsive">
                        <table class="table table-hover text-center" id="table">
                            <thead class="text-bg-secondary">
                                <tr>
                                    <th>First name</th>
                                    <th>Middle name</th>
                                    <th>Last name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($a_student_record as $student_record)
                                    <tr>
                                        <td>{{ $student_record->first_name }}</td>
                                        <td>{{ $student_record->middle_name }}</td>
                                        <td>{{ $student_record->last_name }}</td>
                                        <td>{{ $student_record->status_record_id == 1 ? "Pending" : "Approved"}}</td>
                                        <td>
                                            <a href="#">
                                                <button class="btn-view btn-sm" title="VIEW RECORD">
                                                    <i class="bi bi-eye"></i>
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
        </div>

          
      </div>
    </section>

    <!-- for Data Tables -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
      $(document).ready (function() {
        $('table').DataTable();
      });
    </script>

  </main><!-- End #main -->
@endsection