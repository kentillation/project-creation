@extends('includes/clinician-sidenav')

@section('page-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
  </div>
  @if(Session::has('success'))
  <div class="alert alert-success text-center alert-dismissible fade show mt-4 mb-4" role="alert" id="alertbox">
    <i class="bi bi-check-circle"></i>&nbsp;
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">

          <div class="col-xxl-3 col-lg-3">
            <div class="card info-card pending-card">
              <div class="card-body">
                <h5 class="card-title text-danger">Pending <span>| Medical Record Requests</span></h5>
                <div class="d-flex align-items-center justify-content-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-clock-history"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $pending_medical_record_request}}</h6>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-end">
                  <a href="{{ route('c-pending-medical-records') }}">
                    <button class="btn btn-outline-danger btn-sm mt-4">
                      <span>
                        <i class="bi bi-eye"></i>&nbsp;
                        View Requests
                      </span>
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-3 col-lg-3">
            <div class="card info-card approved-card">
              <div class="card-body">
                <h5 class="card-title text-primary">Approved <span>| Medical Record Requests</span></h5>
                <div class="d-flex align-items-center justify-content-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-check-circle"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $approved_medical_record_request }}</h6>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-end">
                  <a href="{{ route('c-approved-medical-records') }}">
                    <button class="btn btn-outline-primary btn-sm mt-4">
                      <span>
                        <i class="bi bi-eye"></i>&nbsp;
                        View Requests
                      </span>
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-3 col-lg-3">
            <div class="card info-card pending-card">
              <div class="card-body">
                <h5 class="card-title text-danger">Pending <span>| Lab Test Appointments</span></h5>
                <div class="d-flex align-items-center justify-content-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-clock-history"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $pending_lab_test_appointments }}</h6>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-end">
                  <a href="{{ route('c-pending-lab-test-appointments') }}">
                    <button class="btn btn-outline-danger btn-sm mt-4">
                      <span>
                        <i class="bi bi-eye"></i>&nbsp;
                        View Appointments
                      </span>
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-3 col-lg-3">
            <div class="card info-card approved-card">
              <div class="card-body">
                <h5 class="card-title text-primary">Approved <span>| Lab Test Appointments</span></h5>
                <div class="d-flex align-items-center justify-content-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-check-circle"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $approved_lab_test_appointments }}</h6>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-end">
                  <a href="{{ route('c-approved-lab-test-appointments') }}">
                    <button class="btn btn-outline-primary btn-sm mt-4">
                      <span>
                        <i class="bi bi-eye"></i>&nbsp;
                        View Appointments
                      </span>
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>


          <!-- All Medical Record Request -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <h5 class="card-title">Medical Records Request Masterlist</h5>
                <div class="table-responsive">
                  <table class="table table-hover table-borderless" id="table">
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

          <!-- All Lab Test Appointments -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <h5 class="card-title">Lab Test Appointments Masterlist (you set)</h5>
                <div class="table-responsive">
                  <table class="table table-hover" id="table">
                    <thead>
                      <tr>
                        <th>Student Name</th>
                        <th>Laboratory Test</th>
                        <th>Room</th>
                        <th>Date and Time</th>
                        <th>Lab Test Appointment Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($all_lab_test_appointments as $lab_test_appointment)
                      <tr>
                        <td>{{ $lab_test_appointment->student->first_name }} {{ $lab_test_appointment->student->middle_name }} {{ $lab_test_appointment->student->last_name }}</td>
                        <td>
                          <?php
                          if ($lab_test_appointment->lab_test == 1) {
                            echo 'CBC';
                          }
                          if ($lab_test_appointment->lab_test == 2) {
                            echo 'Urinalysis';
                          }
                          if ($lab_test_appointment->lab_test == 3) {
                            echo 'Fecalysis';
                          }
                          if ($lab_test_appointment->lab_test == 4) {
                            echo 'Chest X-ray  (PA)';
                          }
                          if ($lab_test_appointment->lab_test == 5) {
                            echo 'Hepa B Antigen';
                          }
                          if ($lab_test_appointment->lab_test == 6) {
                            echo 'Hepa B Vaccine';
                          }
                          ?>
                        </td>
                        <td>{{ $lab_test_appointment->room }}</td>
                        <td>{{ $lab_test_appointment->date }} {{ $lab_test_appointment->time }}</td>
                        <td>
                          <?php
                          if ($lab_test_appointment->status_appointment == 1) {
                            echo 'Pending';
                          }
                          if ($lab_test_appointment->status_appointment == 2) {
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
      </div><!-- End Left side columns -->

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