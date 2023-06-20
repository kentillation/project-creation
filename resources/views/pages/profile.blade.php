@extends('includes/admin-sidenav')

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
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php echo asset('assets/img/profile-img.png') ?>" alt="Profile" class="rounded-circle">
              <h2 class="m-3">{{ Session::get('first_name') }} {{ Session::get('middle_name') }} {{ Session::get('last_name') }}</h2>
              <h3 class="m-3">Administrator</h3>
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
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">First Name</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('$first_name') }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Middle Name</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('$middle_name') }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Last Name</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('$last_name') }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Street Number</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('$street_number') }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Street Address</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('$street_address') }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Barangay</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('$barangay') }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Municipality / City</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('$muni_city') }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('$phone') }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('$email') }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('$username') }}</div>
                  </div>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection