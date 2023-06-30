@extends('includes/student-sidenav')

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
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card add-medical-card">
              <div class="card-body">
                <h5 class="card-title text-warning"></h5>
                <div class="d-flex align-items-center justify-content-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-plus-lg"></i>
                  </div>
                  <div class="ps-3">
                    <a href="{{ route('add-medical-record') }}">
                      <h5>Add Medical Record</h5>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 col-md-6">
            <div class="card info-card view-medical-card">
              <div class="card-body">
                <h5 class="card-title text-warning"></h5>
                <div class="d-flex align-items-center justify-content-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-search"></i>
                  </div>
                  <div class="ps-3">
                    <a href="{{ route('view-medical-records') }}">
                      <h5>View Medical Records</h5>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="col-xxl-4 col-md-6">
            <div class="card info-card assignments-card">
              <div class="card-body">
                <h5 class="card-title text-warning"></h5>
                <div class="d-flex align-items-center justify-content-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-pencil-square"></i>
                  </div>
                  <div class="ps-3">
                    <a href="#">
                      <h5>My Assignments</h5>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div> -->

          <!-- <div class="col-xxl-4 col-md-6">
              <div class="card info-card declined-card">
                <div class="card-body">
                  <h5 class="card-title text-danger">Assignments <span>| Health</span></h5>
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6>0</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-end">
                    <a href="#">
                      <button class="btn btn-outline-danger btn-sm mt-4" title="View postponed appointments">
                        <span>
                          <i class="bi bi-eye"></i>&nbsp;
                          View
                        </span>
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div> -->

          <!-- Recent Medical Request -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <h5 class="card-title">Pending Laboratory Test Appointments</h5>
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
                        <td>Nurse {{ $student_pending_appointment->clinician->first_name }} {{ $student_pending_appointment->clinician->middle_name }} {{ $student_pending_appointment->clinician->last_name }}</td>
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
          </div><!-- End Recent Medical Request -->

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