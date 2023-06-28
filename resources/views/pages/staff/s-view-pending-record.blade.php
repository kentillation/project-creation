@extends('includes/staff-sidenav')

@section('page-content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pending Medical Record Request</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Students Area</li>
                <li class="breadcrumb-item">Medical Record Requests</li>
                <li class="breadcrumb-item">Pending Medical Records Request</li>
                <li class="breadcrumb-item Active">Pending Medical Record Request</li>

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

            <div class="col-lg-7">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body m-2">
                                <h5 class="card-title">Details</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <p>Full Name: </p>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <p>{{ $s_view_pending->first_name }} {{ $s_view_pending->middle_name }} {{ $s_view_pending->last_name }}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <p>Age: </p>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <p>{{ $s_view_pending->age }}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <p>Phone: </p>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <p>{{ $s_view_pending->phone }}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <p>Address: </p>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <p>{{ $s_view_pending->street_number }} {{ $s_view_pending->street_address }}, {{ $s_view_pending->barangay }}, {{ $s_view_pending->muni_city }}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <p>Date of Birth: </p>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <p>{{ $s_view_pending->date_of_birth }}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <p>Civil Status: </p>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <p>{{ $s_view_pending->civil_status }}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <p>Citizenship: </p>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <p>{{ $s_view_pending->citizenship }}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <p>Height (cm): </p>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <p>{{ $s_view_pending->height }}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <p>Weight (lbs): </p>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <p>{{ $s_view_pending->weight }}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <p>BMI: </p>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <p>{{ $s_view_pending->bmi }}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <p>Year & Section: </p>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <p>
                                            {{ $s_view_pending->year_level_id == 1 ? '1st year' : '' }}
                                            {{ $s_view_pending->year_level_id == 2 ? '2nd year' : '' }}
                                            {{ $s_view_pending->year_level_id == 3 ? '3rd year' : '' }}
                                            {{ $s_view_pending->year_level_id == 4 ? '4th year' : '' }}
                                            -
                                            <span>
                                                {{ $s_view_pending->section_id == 1 ? 'A' : '' }}
                                                {{ $s_view_pending->section_id == 2 ? 'B' : '' }}
                                                {{ $s_view_pending->section_id == 3 ? 'C' : '' }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <p>Gender: </p>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <p>
                                            {{ $s_view_pending->gender_id == 1 ? 'Male' : '' }}
                                            {{ $s_view_pending->gender_id == 2 ? 'Female' : '' }}
                                        </p>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <p>Blood Type: </p>
                                    </div>
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <p>
                                            {{ $s_view_pending->blood_type_id == 1 ? 'A+' : '' }}
                                            {{ $s_view_pending->blood_type_id == 2 ? 'A-' : '' }}
                                            {{ $s_view_pending->blood_type_id == 3 ? 'B+' : '' }}
                                            {{ $s_view_pending->blood_type_id == 4 ? 'B-' : '' }}
                                            {{ $s_view_pending->blood_type_id == 5 ? 'AB+' : '' }}
                                            {{ $s_view_pending->blood_type_id == 6 ? 'AB-' : '' }}
                                            {{ $s_view_pending->blood_type_id == 7 ? 'O+' : '' }}
                                            {{ $s_view_pending->blood_type_id == 8 ? 'O-' : '' }}
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <p>CBC: </p>
                                        <div class="card" style="width: 12rem;">
                                            <img src="..." class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">CBC Image</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <p>Urinalysis: </p>
                                        <div class="card" style="width: 12rem;">
                                            <img src="..." class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Urinalysis Image</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <p>Fecalysis: </p>
                                        <div class="card" style="width: 12rem;">
                                            <img src="..." class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Fecalysis Image</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <p>Chest X-ray (PA): </p>
                                        <div class="card" style="width: 12rem;">
                                            <img src="..." class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Chest X-ray (PA) Image</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <p>Heppa B Antigen: </p>
                                        <div class="card" style="width: 12rem;">
                                            <img src="..." class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Heppa B Antigen Image</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <p>Heppa B Vaccine: </p>
                                        <div class="card" style="width: 12rem;">
                                            <img src="..." class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">Heppa B Vaccine Image</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body pb-4">
                        <h5 class="card-title">Medical History</h5>
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

</main><!-- End #main -->
@endsection