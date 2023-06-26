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
      <div class="col-lg-8">
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
                      <h5>Add Record</h5>
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

          <div class="col-xxl-4 col-md-6">
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
          </div>

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
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>School Nurse</th>
                        <th>Statement</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($pending_appointment as $student_pending_appointment)
                      <tr>
                        <td>Nurse @foreach ($cilinician_record as $cilinician) {{ $cilinician->first_name }} {{ $cilinician->middle_name }} {{ $cilinician->last_name }} @endforeach</td>
                        <td>
                          Good day! You have an appointment for your Laboratory Test in
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


      <!-- Right side columns -->
      <div class="col-lg-4">
        <!-- News & Updates -->
        <div class="card">
          <div class="card-body pb-0">
            <h5 class="card-title">Activity Logs</h5>
            <div class="news">
              <div class="post-item clearfix">
                <img src="assets/img/news-5.jpg" alt="">
                <h4><a href="#">Title</a></h4>
                <p>This is just a sample paragraph</p>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/news-5.jpg" alt="">
                <h4><a href="#">Title</a></h4>
                <p>This is just a sample paragraph</p>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/news-5.jpg" alt="">
                <h4><a href="#">Title</a></h4>
                <p>This is just a sample paragraph</p>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/news-5.jpg" alt="">
                <h4><a href="#">Title</a></h4>
                <p>This is just a sample paragraph</p>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/news-5.jpg" alt="">
                <h4><a href="#">Title</a></h4>
                <p>This is just a sample paragraph</p>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/news-5.jpg" alt="">
                <h4><a href="#">Title</a></h4>
                <p>This is just a sample paragraph</p>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/news-5.jpg" alt="">
                <h4><a href="#">Title</a></h4>
                <p>This is just a sample paragraph</p>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/news-5.jpg" alt="">
                <h4><a href="#">Title</a></h4>
                <p>This is just a sample paragraph</p>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/news-5.jpg" alt="">
                <h4><a href="#">Title</a></h4>
                <p>This is just a sample paragraph</p>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/news-5.jpg" alt="">
                <h4><a href="#">Title</a></h4>
                <p>This is just a sample paragraph</p>
              </div>
            </div><!-- End sidebar recent posts-->
          </div>
        </div><!-- End News & Updates -->
      </div><!-- End Right side columns -->

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