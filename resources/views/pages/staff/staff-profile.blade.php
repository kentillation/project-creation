@extends('includes/staff-sidenav')

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
                        <img src="<?php echo asset('assets/img/profile.jpg') ?>" alt="Profile" class="rounded-circle">
                        <h2 class="m-3">{{ Session::get('first_name') }} {{ Session::get('middle_name') }} {{ Session::get('last_name') }}</h2>
                        <h3 class="m-2">Department Staff</h3>
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
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profile Details</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Name</div>
                                    <div class="col-lg-9 col-md-8">{{ Session::get('first_name') }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Middle Name</div>
                                    <div class="col-lg-9 col-md-8">{{ Session::get('middle_name') }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Last Name</div>
                                    <div class="col-lg-9 col-md-8">{{ Session::get('last_name') }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ Session::get('email') }}</div>
                                </div>
                            </div>
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->

                                <form action="{{ route('update-save-staff-image-profile', ['id' => $staff_profile['id']]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="/profile-folder/{{ $staff_profile->image }}" style="height: 100px; width: 100px; border-radius: 50%;" alt="" id="default_pp">
                                            <div id="image-preview"></div>
                                            <div class="pt-2">
                                                <!-- <label for="image-upload" class="btn btn-primary btn-sm" onclick="upload_pp()" id="upload-pp">
                                                <i class="bi bi-arrow-left-right"></i>
                                                &nbsp; Change Image
                                                </label> -->
                                                <input type="file" id="image-upload" name="image" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form action="{{ route('update-save-staff-profile', ['id' => $staff_profile['id']]) }}" method="post">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="first_name" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="first_name" type="text" class="form-control" id="first_name" value="{{ $staff_profile->first_name }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="middle_name" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="middle_name" type="text" class="form-control" id="middle_name" value="{{ $staff_profile->middle_name }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="last_name" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="last_name" type="text" class="form-control" id="last_name" value="{{ $staff_profile->last_name }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email" value="{{ $staff_profile->email }}">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signoutModal">Update profile</button>
                                    </div>
                                    <div class="modal fade" id="signoutModal" tabindex="-1" aria-labelledby="signoutModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="signoutModalLabel">Confirmation</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <p>You are required to signout to update your profile.</p>
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
                                </form><!-- End Profile Edit Form -->
                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

@endsection