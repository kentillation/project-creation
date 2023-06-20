@extends('includes/student-sidenav')

@section('page-content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Settings</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
      @if(Session::has('success'))
        <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle"></i>&nbsp;
          {{ Session::get('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" title="Close"></button>
        </div>
      @endif
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="<?php echo asset('assets/img/profile-img.png') ?>" alt="Profile" class="rounded-circle">
              <h2 class="m-3">{{ Session::get('first_name') }} {{ Session::get('middle_name') }} {{ Session::get('last_name') }}</h2>
              <h3 class="m-2">Nursing Student</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#change-username">Change username</button>
                </li>


                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#change-password">Change Password</button>
                </li>
              </ul>

              <div class="tab-content pt-2">
                <div class="tab-pane active show fade pt-3" id="change-username">
                  <!-- Change Password Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="currentUsername" class="col-md-4 col-lg-3 col-form-label">Current Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="currentUsername">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="newUsername" class="col-md-4 col-lg-3 col-form-label">New Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newusername" type="text" class="form-control" id="newUsername">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->
                </div>

                <div class="tab-pane fade pt-3" id="change-password">
                  <!-- Change Password Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection