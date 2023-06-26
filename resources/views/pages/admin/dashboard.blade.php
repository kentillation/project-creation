@extends('includes/admin-sidenav')

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
            <div class="card info-card pending-card">
              <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->
              <div class="card-body">
                <h5 class="card-title text-warning">Pending <span>| Medical Record Requests</span></h5>
                <div class="d-flex align-items-center justify-content-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-clock-history"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $pending}}</h6>
                    <!-- <span class="text-warning small pt-1 fw-bold">10%</span> <span class="text-muted small pt-2 ps-1">sample</span> -->
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-end">
                  <a href="{{ route('a-pending-medical-records') }}">
                    <button class="btn btn-outline-warning btn-sm mt-4">
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

          <!-- <div class="col-xxl-4 col-md-6">
              <div class="card info-card declined-card">
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
                <div class="card-body">
                  <h5 class="card-title text-danger">Declined <span>| Medical Record Requests</span></h5>
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-end">
                    <a href="{{ route('a-declined-medical-records') }}">
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
            </div> -->

          <div class="col-xxl-4 col-xl-12">
            <div class="card info-card approved-card">
              <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->
              <div class="card-body">
                <h5 class="card-title text-primary">Approved <span>| Medical Record Requests</span></h5>
                <div class="d-flex align-items-center justify-content-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-check-circle"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $approved }}</h6>
                    <!-- <span class="text-primary small pt-1 fw-bold">100%</span> <span class="text-muted small pt-2 ps-1">sample</span> -->
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-end">
                  <a href="{{ route('a-approved-medical-records') }}">
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


          <!-- <div class="col-12">
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
                <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>
                  <div id="reportsChart"></div>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'First',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Second',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Third',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                </div>
              </div>
            </div> -->

          <!-- Recent Medical Request -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <h5 class="card-title">Recent Medical Request <span>| Today</span></h5>
                <div class="table-responsive">
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Contact number</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Roxanne</td>
                        <td><a href="tel: 09123456789">09123456789</a></td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>Jose Ian</td>
                        <td><a href="tel: 09123456789">09123456789</a></td>
                        <td><span class="badge bg-warning">Pending</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>Acel Jay</td>
                        <td><a href="tel: 09123456789">09123456789</a></td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Kent Anthony</td>
                        <td><a href="tel: 09123456789">09123456789</a></td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Juan Delacruz</td>
                        <td><a href="tel: 09123456789">09123456789</a></td>
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
        <!-- News & Updates Traffic -->
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
            <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>
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