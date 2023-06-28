@extends('includes/admin-sidenav')

@section('page-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Approved Appointments | Laboratory Test</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Students Area</li>
        <li class="breadcrumb-item">Lab Test Appointments</li>
        <li class="breadcrumb-item active">Approved Appointments</li>
      </ol>
    </nav>
  </div>
  <div class="mb-3">
    <a href="{{ url()->previous() }}" title="Back">
      <i class="bi bi-arrow-left"></i>
      &nbsp;Back
    </a>
  </div>
  @if(Session::has('response'))
  <div class="alert alert-primary text-center alert-dismissible fade show" role="alert" id="alertbox">
    {{ Session::get('response') }}
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
                  <table class="table table-hover" id="table">
                    <thead>
                      <tr>
                        <th>School Nurse</th>
                        <th>Statement</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($approved_appointment as $student_approved_appointment)
                      <tr>
                        <td>Nurse {{ $student_approved_appointment->clinician->first_name }} {{ $student_approved_appointment->clinician->middle_name }} {{ $student_approved_appointment->clinician->last_name }}</td>
                        <td>
                          Student Nurse {{ $student_approved_appointment->student->first_name }} {{ $student_approved_appointment->student->middle_name }} {{ $student_approved_appointment->student->last_name }} approve the appointment for Laboratory Test in
                          <?php
                          if ($student_approved_appointment->lab_test == 1) {
                            echo 'CBC';
                          }
                          if ($student_approved_appointment->lab_test == 2) {
                            echo 'Urinalysis';
                          }
                          if ($student_approved_appointment->lab_test == 3) {
                            echo 'Fecalysis';
                          }
                          if ($student_approved_appointment->lab_test == 4) {
                            echo 'Chest X-ray (PA)';
                          }
                          if ($student_approved_appointment->lab_test == 5) {
                            echo 'Hepa B Antigen';
                          }
                          if ($student_approved_appointment->lab_test == 6) {
                            echo 'Hepa B Vaccine';
                          }
                          echo " on " . $student_approved_appointment->date . " at " . $student_approved_appointment->time . ". ";
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