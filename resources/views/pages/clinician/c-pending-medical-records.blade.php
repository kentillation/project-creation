@extends('includes/clinician-sidenav')

@section('page-content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Pending Medical Records Request</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Students Area</li>
          <li class="breadcrumb-item">Medical Record Requests</li>
          <li class="breadcrumb-item active">Pending Medical Records Request</li>
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
                      <table class="table table-hover text-center" id="table">
                        <thead class="text-bg-secondary">
                          <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Municipality / City</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($c_pending_records as $student_record)
                            <tr>
                              <td>{{ $student_record->first_name }} {{ $student_record->middle_name }} {{ $student_record->last_name }}</td>
                              <td>{{ $student_record->phone }}</td>
                              <td>{{ $student_record->muni_city }}</td>
                              <td>
                                <a href="{{ route('update-pending-record', ['id' => $student_record->id] ) }}">
                                  <button class="btn btn-outline-primary btn-sm" title="View record">
                                    <i class="bi bi-eye"></i>
                                    &nbsp; View record
                                  </button>
                                </a>
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

          <!-- <div class="col-lg-4">
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
              <div class="card-body pb-4">
                <h5 class="card-title">Activity Logs</h5>
                <div class="news">
                  <div class="post-item clearfix">
                    <img src="<?php echo asset('assets/img/news-5.jpg') ?>" alt="">
                    <h4><a href="#">Title</a></h4>
                    <p>This is just a sample paragraph</p>
                  </div>
                  <div class="post-item clearfix">
                    <img src="<?php echo asset('assets/img/news-5.jpg') ?>" alt="">
                    <h4><a href="#">Title</a></h4>
                    <p>This is just a sample paragraph</p>
                  </div>
                  <div class="post-item clearfix">
                    <img src="<?php echo asset('assets/img/news-5.jpg') ?>" alt="">
                    <h4><a href="#">Title</a></h4>
                    <p>This is just a sample paragraph</p>
                  </div>
                  <div class="post-item clearfix">
                    <img src="<?php echo asset('assets/img/news-5.jpg') ?>" alt="">
                    <h4><a href="#">Title</a></h4>
                    <p>This is just a sample paragraph</p>
                  </div>
                  <div class="post-item clearfix">
                    <img src="<?php echo asset('assets/img/news-5.jpg') ?>" alt="">
                    <h4><a href="#">Title</a></h4>
                    <p>This is just a sample paragraph</p>
                  </div>
                  <div class="post-item clearfix">
                    <img src="<?php echo asset('assets/img/news-5.jpg') ?>" alt="">
                    <h4><a href="#">Title</a></h4>
                    <p>This is just a sample paragraph</p>
                  </div>
                </div>
              </div>
            </div>
          </div> -->

      </div>
    </section>

    <!-- for Data Tables -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
      $(document).ready (function() {
        $('table').DataTable();
      });
    </script>

  </main><!-- End #main -->
@endsection