@extends('includes/admin-sidenav')

@section('page-content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Account Settings</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Settings</li>
        <li class="breadcrumb-item active">Account Settings</li>
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
    @if(Session::has('error'))
    <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-triangle"></i>&nbsp;
      {{ Session::get('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" title="Close"></button>
    </div>
    @endif
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="<?php echo asset('assets/img/profile.jpg') ?>" alt="Profile" class="rounded-circle">
            <h2 class="m-3">{{ Session::get('first_name') }} {{ Session::get('middle_name') }} {{ Session::get('last_name') }}</h2>
            <h3 class="m-2">System Administrator</h3>
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
                <form method="POST" action="{{ route('update-save-admin-username', ['id' => $admin_acount['id']]) }}">
                  @csrf
                  <div class="row mb-3">
                    <label for="currentUsername" class="col-md-4 col-lg-3 col-form-label">Current Username</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="currentusername" type="text" class="form-control" id="currentUsername">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="newUsername" class="col-md-4 col-lg-3 col-form-label">New Username</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newusername" type="text" class="form-control" id="newUsername">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#usernameModal">Change Username</button>
                  </div>
                  <div class="modal fade" id="usernameModal" tabindex="-1" aria-labelledby="usernameModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="usernameModalLabel">Confirmation</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                          <p>You are required to signout to update your username.</p>
                        </div>
                        <div class="modal-footer">
                          <a href="#">
                            <button class="btn btn-outline-success w-100 mt-2" type="submit">
                              Signout &nbsp; <i class="bi bi-box-arrow-in-right"></i>
                            </button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </form><!-- End Change Password Form -->
              </div>

              <div class="tab-pane fade pt-3" id="change-password">
                <!-- Change Password Form -->
                <form method="POST" action="{{ route('update-save-admin-password', ['id' => $admin_acount['id']]) }}">
                  @csrf
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="currentpassword" type="password" class="form-control" id="currentPassword">
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#passwordModal">Change Password</button>
                  </div>
                  <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="passwordModalLabel">Confirmation</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                          <p>You are required to signout to update your password.</p>
                        </div>
                        <div class="modal-footer">
                          <a href="#">
                            <button class="btn btn-outline-success w-100 mt-2" type="submit">
                              Signout &nbsp; <i class="bi bi-box-arrow-in-right"></i>
                            </button>
                          </a>
                        </div>
                      </div>
                    </div>
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