@extends('includes/admin-sidenav')

@section('page-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Pending Appointments | Laboratory Test</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Students Area</li>
        <li class="breadcrumb-item">Lab Test Appointments</li>
        <li class="breadcrumb-item active">Pending Appointments</li>
      </ol>
    </nav>
  </div>
  @if(Session::has('success'))
  <div class="alert alert-primary text-center alert-dismissible fade show" role="alert" id="alertbox">
    {{ Session::get('success') }}
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
                      @foreach ($pending_appointment as $student_pending_appointment)
                      <tr>
                        <td>Nurse {{ $student_pending_appointment->clinician->first_name }} {{ $student_pending_appointment->clinician->middle_name }} {{ $student_pending_appointment->clinician->last_name }}</td>
                        <td>
                          Set an appointment for Laboratory Test in
                          <?php
                          if ($student_pending_appointment->lab_test == 1) {
                            echo 'CBC';
                          }
                          if ($student_pending_appointment->lab_test == 2) {
                            echo 'Urinalysis';
                          }
                          if ($student_pending_appointment->lab_test == 3) {
                            echo 'Fecalysis';
                          }
                          if ($student_pending_appointment->lab_test == 4) {
                            echo 'Chest X-ray (PA)';
                          }
                          if ($student_pending_appointment->lab_test == 5) {
                            echo 'Hepa B Antigen';
                          }
                          if ($student_pending_appointment->lab_test == 6) {
                            echo 'Hepa B Vaccine';
                          }
                          ?> to Student Nurse {{ $student_pending_appointment->student->first_name }} {{ $student_pending_appointment->student->middle_name }} {{ $student_pending_appointment->student->last_name }}.
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