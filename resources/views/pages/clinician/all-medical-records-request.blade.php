@extends('includes/clinician-sidenav')

@section('page-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>All Medical Records Request</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Students Area</li>
        <li class="breadcrumb-item">Medical Record Requests</li>
        <li class="breadcrumb-item active">All Medical Records Request</li>
      </ol>
    </nav>
  </div>
  <div class="mb-3">
    <a href="{{ url()->previous() }}" title="Back">
      <i class="bi bi-arrow-left"></i>
      &nbsp;Back
    </a>
  </div>
  <section class="section dashboard">
    <div class="row">

      <div class="col-lg-12">
        <div class="row">
          <div class="col-12">
            <div class="card recent-sales overflow-auto">
              <div class="card-body m-2">
                <h5 class="card-title">All Medical Record Request</h5>
                <div class="table-responsive">
                  <table class="table table-hover" id="table">
                    <thead>
                      <tr>
                        <th>Student Name</th>
                        <th>Year and Section</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Request Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($all_medical_records_request as $student_record)
                      <tr>
                        <td>{{ $student_record->first_name }} {{ $student_record->middle_name }} {{ $student_record->last_name }}</td>
                        <td>
                          <?php
                          if ($student_record->year_level_id == 1) {
                            echo '1st year ';
                          }
                          if ($student_record->year_level_id == 2) {
                            echo '2nd year ';
                          }
                          if ($student_record->year_level_id == 3) {
                            echo '3rd year ';
                          }
                          if ($student_record->year_level_id == 4) {
                            echo '4th year ';
                          }

                          if ($student_record->section_id == 1) {
                            echo '- A';
                          }
                          if ($student_record->section_id == 2) {
                            echo '- B';
                          }
                          if ($student_record->section_id == 3) {
                            echo '- C';
                          }
                          ?>
                        </td>
                        <td>{{ $student_record->street_number }}, {{ $student_record->street_address }}, {{ $student_record->barangay }}, {{ $student_record->muni_city }}</td>
                        <td>
                          <?php
                          if ($student_record->gender_id == 1) {
                            echo 'Male';
                          }
                          if ($student_record->gender_id == 2) {
                            echo 'Female';
                          }
                          ?>
                        </td>
                        <td>
                          <?php
                          if ($student_record->status_record_id == 1) {
                            echo 'Pending';
                          }
                          if ($student_record->status_record_id == 2) {
                            echo 'Approved';
                          }
                          ?>
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
    $(document).ready(function() {
      $('table').DataTable();
    });
  </script>

</main><!-- End #main -->
@endsection