@extends('includes/admin-sidenav')

@section('page-content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Clinician Information</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item">Clinicians</li>
          <li class="breadcrumb-item">List of Clinicians</li>
          <li class="breadcrumb-item active">Clinician Information</li>
        </ol>
      </nav>
    </div>
    <div class="mb-3">
        <a href="{{ route('clinician-list') }}" title="Back" class="back">
            <i class="bi bi-arrow-left"></i>
            &nbsp;Back
        </a>
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

        <div class="col-lg-8">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body m-2">
                            <h5 class="card-title"></h5>
                            <form method="post" action="{{ route('update-save-clinician', ['id' => $tbl_clinician['id']]) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <label for="name">Name</label>
                                        <input type='text' name='name' value="{{ $tbl_clinician['name'] }}" id="name" class="form-control mb-3" required />
                                    </div>
                                    <div class="col-12">
                                        <label for="email">Email</label>
                                        <input type='email' name='email' value="{{ $tbl_clinician['email'] }}" id="email" class="form-control mb-3" required />
                                    </div>
                                    <div class="col-12">
                                        <label for="username">Username</label>
                                        <input type='text' name='username' value="{{ $tbl_clinician['username'] }}" id="username" class="form-control mb-3" required />
                                    </div>
                                </div>
                                <button class="btn btn-success mt-3" type="submit">
                                    <i class="bi bi-arrow-clockwise"></i>
                                    &nbsp;Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <div class="col-lg-4">

            <div class="card">
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
          </div>
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