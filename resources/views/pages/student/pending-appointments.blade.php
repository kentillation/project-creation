@extends('includes/student-sidenav')

@section('page-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Pending Appointments | Laboratory Test</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Appointment</li>
        <li class="breadcrumb-item active">Pending Appointments</li>
      </ol>
    </nav>
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

                          <form action="{{ route('update-pending-appointment-response', $student_pending_appointment->id ) }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-primary btn-sm" title="Yes, I will!" type="button" data-bs-toggle="modal" data-bs-target="#ensuringModal">
                              <i class="bi bi-check-circle"></i>
                              &nbsp;Yes, I will!
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="ensuringModal" tabindex="-1" aria-labelledby="ensuringModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ensuringModalLabel">Confirmation</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you sure you want to come?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-primary">
                                      <i class="bi bi-check-circle"></i>&nbsp; Yes, I am!
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
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