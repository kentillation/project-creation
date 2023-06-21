@extends('includes/admin-sidenav')

@section('page-content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Create New Account</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item">Nursing Students</li>
          <li class="breadcrumb-item">List of Nursing Students</li>
          <li class="breadcrumb-item">Create New Account</li>
        </ol>
      </nav>
    </div>
    <div class="mb-3">
        <a href="{{ route('student-list') }}" title="Back">
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
                  <form action="{{ route('save-student') }}" method="post" class="row g-3 needs-validation" novalidate>
                        @csrf

                        <div class="col-12" style="display: none;">
                            <label for="admin_email" class="form-label mt-2">My Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="email" name="admin_email" id="admin_email" class="form-control" value="{{ $admin_profile->email }}" required>
                                <div class="invalid-feedback">Enter your admin email.</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="student_id" class="form-label mt-2">Student ID</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-file-person"></i>
                                </span>
                                <input type="text" name="student_id" id="student_id" class="form-control" required>
                                <div class="invalid-feedback">Enter your student id.</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="first_name" class="form-label mt-2">First Name</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-file-person"></i>
                                </span>
                                <input type="text" name="first_name" id="first_name" class="form-control" required>
                                <div class="invalid-feedback">Enter your first name.</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="middle_name" class="form-label mt-2">Middle Name</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-file-person"></i>
                                </span>
                                <input type="text" name="middle_name" id="middle_name" class="form-control" required>
                                <div class="invalid-feedback">Enter your middle name.</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="last_name" class="form-label mt-2">Last Name</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-file-person"></i>
                                </span>
                                <input type="text" name="last_name" id="last_name" class="form-control" required>
                                <div class="invalid-feedback">Enter your last name.</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="phone" class="form-label mt-2">Phone number</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-telephone"></i>
                                </span>
                                <input type="text" name="phone" id="phone" class="form-control" required>
                                <div class="invalid-feedback">Enter your phone number.</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="yourEmail" class="form-label mt-2">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-at"></i>
                                </span>
                                <input type="email" name="email" class="form-control" required>
                                <div class="invalid-feedback">Enter your email.</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label mt-2">Password</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control" required>
                                <div class="invalid-feedback">Enter your password.</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-outline-success w-100 mt-2" type="submit">Create account</button>
                        </div>
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