@extends('includes/student-sidenav')

@section('page-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>View Medical Records</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Medical Record</li>
        <li class="breadcrumb-item active">View Medical Records</li>
      </ol>
    </nav>
  </div>
  @if(Session::has('success'))
  <div class="alert alert-success text-center alert-dismissible fade show" role="alert" id="alertbox">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if(Session::has('error'))
  <div class="alert alert-danger text-center alert-dismissible fade show" role="alert" id="alertbox">
    {{ Session::get('error') }}
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
                  <table class="table table-hover table-borderless" id="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Medical Record Request Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($student_records as $student_record)
                      <tr>
                        <td>{{ $student_record->first_name }} {{ $student_record->middle_name }} {{ $student_record->last_name }}</td>
                        <td>{{ $student_record->status_record_id == 1 ? "Pending" : "Approved"}}</td>
                        <td>
                          <!-- <a href="{{ route('view-record') }}"> -->
                          <button class="btn btn-outline-primary btn-sm" title="View Record" data-bs-toggle="modal" data-bs-target="#accessModal">
                            <i class="bi bi-eye"></i>
                            <span>&nbsp; View Record</span>
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
    <div class="modal fade" id="accessModal" tabindex="-1" aria-labelledby="accessModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="accessModalLabel">Access Mecidal Records</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-4">
            <form action="{{ route('send-access-code') }}" method="POST" class="row g-3 needs-validation" novalidate>
              @csrf
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-at"></i>
                </span>
                <input type="text" name="send_access_code" class="form-control" value="" id="view_access_code" placeholder="Enter access code" required>
                <div class="invalid-feedback">Enter access code.</div>
              </div>
              <button class="btn btn-outline-success w-100 mt-4" type="submit">
                Submit &nbsp; <i class="bi bi-box-arrow-in-right"></i>
              </button>
              <button class="btn btn-outline-primary w-100 mt-2" type="button" data-bs-toggle="modal" data-bs-target="#sendcodeModal">
                <i class="bi bi-clipboard-check"></i>
                &nbsp; Request access code
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="sendcodeModal" tabindex="-1" aria-labelledby="sendcodeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="sendcodeModalLabel">Access Mecidal Records</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-4">
            <p>Do you want to proceed?</p>
          </div>
          <div class="modal-footer">
            <form action="#" method="POST">
              @csrf
                <button class="btn btn-outline-success" type="submit">
                  <i class="bi bi-box-arrow-in-right"></i>
                  &nbsp; Yes
                </button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- for Data Tables -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function() {
      $('table').DataTable();
    });
  </script>

</main><!-- End #main -->
@endsection