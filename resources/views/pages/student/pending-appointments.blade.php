@extends('includes/student-sidenav')

@section('page-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Pending Appointments</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Appointment</li>
        <li class="breadcrumb-item active">Pending Appointments</li>
      </ol>
    </nav>
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
                  <table class="table table-hover" id="table">
                    <thead>
                      <tr>
                        <th>School Nurse</th>
                        <th>Statement</th>
                        <th>Will you come?</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($pending_appointment as $student_pending_appointment)
                      <tr>
                        <td>Nurse @foreach ($cilinician_record as $cilinician) {{ $cilinician->first_name }} {{ $cilinician->middle_name }} {{ $cilinician->last_name }} @endforeach</td>
                        <td>
                          You have an appointment for Laboratory Test in
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
                          ?>. Please come to our {{ $student_pending_appointment->room }} on {{ $student_pending_appointment->date }} at {{ $student_pending_appointment->time }}. Thank you!
                        </td>
                          <td>
                            <form action="{{ route('update-pending-appointment-come') }}">
                              <button class="btn btn-outline-primary btn-sm" title="I will!" type="submit">
                                <i class="bi bi-check-circle"></i>
                                &nbsp;I will!
                              </button>
                            </form>
                            <form action="{{ route('update-pending-appointment-not') }}">
                                <button class="btn btn-outline-danger btn-sm" title="Not now!" type="submit">
                                  <i class="bi bi-x-circle"></i>
                                  &nbsp;Not now!
                                </button>
                              </form>
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