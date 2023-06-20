@extends('includes/student-sidenav')

@section('page-content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div>
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card pending-card">
                <div class="card-body">
                  <h5 class="card-title text-warning">Pending <span>| Appointments</span></h5>
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clock-history"></i>
                    </div>
                    <div class="ps-3">
                      <h6>0</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-end">
                    <a href="#">
                      <button class="btn btn-outline-warning btn-sm mt-4" title="View pending appointments">
                        <span>
                          <i class="bi bi-eye"></i>&nbsp;
                          View
                        </span>
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card declined-card">
                <div class="card-body">
                  <h5 class="card-title text-danger">Postponed <span>| Appointments</span></h5>
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
            </div>

            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card approved-card">
                <div class="card-body">
                  <h5 class="card-title text-primary">Approved <span>| Appointments</span></h5>
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6>0</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-end">
                    <a href="#">
                      <button class="btn btn-outline-primary btn-sm mt-4" title="View approved appointments">
                        <span>
                          <i class="bi bi-eye"></i>&nbsp;
                          View
                        </span>
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Recent Medical Request -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Recent Medical Appointments</h5>
                  <div class="table-responsive">
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Clinicians Name</th>
                          <th scope="col">Appointment Description</th>
                          <th scope="col">Contact number</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row"><a href="#">#2457</a></th>
                          <td>Roxanne</td>
                          <td>Sample description</td>
                          <td><a href="tel: 09123456789">09123456789</a></td>
                          <td><span class="badge bg-success">Approved</span></td>
                        </tr>
                        <tr>
                          <th scope="row"><a href="#">#2147</a></th>
                          <td>Jose Ian</td>
                          <td>Sample description</td>
                          <td><a href="tel: 09123456789">09876543210</a></td>
                          <td><span class="badge bg-warning">Pending</span></td>
                        </tr>
                        <tr>
                          <th scope="row"><a href="#">#2049</a></th>
                          <td>Acel Jay</td>
                          <td>Sample description</td>
                          <td><a href="tel: 09123456789">00011122233</a></td>
                          <td><span class="badge bg-success">Approved</span></td>
                        </tr>
                        <tr>
                          <th scope="row"><a href="#">#2644</a></th>
                          <td>Kent Anthony</td>
                          <td>Sample description</td>
                          <td><a href="tel: 09123456789">01230123012</a></td>
                          <td><span class="badge bg-danger">Rejected</span></td>
                        </tr>
                        <tr>
                          <th scope="row"><a href="#">#2644</a></th>
                          <td>Juan Delacruz</td>
                          <td>Sample description</td>
                          <td><a href="tel: 09123456789">09080706050</a></td>
                          <td><span class="badge bg-success">Approved</span></td>
                        </tr>
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
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>
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

  </main><!-- End #main -->
@endsection