@extends('includes/clinician-sidenav')

@section('page-content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Student Medical Record Request</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Students Area</li>
                <li class="breadcrumb-item">Medical Record Requests</li>
                <li class="breadcrumb-item">Pending Medical Records Request</li>
                <li class="breadcrumb-item Active">Student Medical Record Request</li>

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

            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body m-2">
                                <h5 class="card-title">Head Title</h5>

                                <form method="POST"
                                    action="{{ route('save-update-pending-record', ['id' => $c_update_pending['id']]) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6" style="display: none;">
                                            <label for="student_id">Student ID</label>
                                            <input type='text' name='student_id' id="student_id"
                                                value="{{ $c_update_pending->id }}" class="form-control mb-3" />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="first_name">First Name</label>
                                            <input type='text' name='first_name' id="first_name"
                                                value="{{ $c_update_pending->first_name }}" class="form-control mb-3" />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="middle_name">Middle Name</label>
                                            <input type='text' name='middle_name' id="middle_name"
                                                value="{{ $c_update_pending->middle_name }}"
                                                class="form-control mb-3" />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="last_name">Last Name</label>
                                            <input type='text' name='last_name' id="last_name"
                                                value="{{ $c_update_pending->last_name }}" class="form-control mb-3" />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="street_address">Street Address / Street Number</label>
                                            <input type='text' name='street_address' id="street_address"
                                                value="{{ $c_update_pending->street_address }}"
                                                class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="barangay">Barangay</label>
                                            <input type='text' name='barangay' id="barangay"
                                                value="{{ $c_update_pending->barangay }}" class="form-control mb-3"
                                                required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="muni_city">Municipality / City</label>
                                            <input type='text' name='muni_city' id="muni_city"
                                                value="{{ $c_update_pending->muni_city }}" class="form-control mb-3"
                                                required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="date_of_birth">Date of Birth</label>
                                            <input type='date' name='date_of_birth' id="date_of_birth"
                                                value="{{ $c_update_pending->date_of_birth }}" class="form-control mb-3"
                                                required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="age">Age</label>
                                            <input type='number' name='age' id="age"
                                                value="{{ $c_update_pending->age }}" class="form-control mb-3"
                                                required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="phone">Phone</label>
                                            <input type='number' name='phone' id="phone"
                                                value="{{ $c_update_pending->phone }}" class="form-control mb-3" />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="civil_status">Civil Status</label>
                                            <input type='text' name='civil_status' id="civil_status"
                                                value="{{ $c_update_pending->civil_status }}" class="form-control mb-3"
                                                required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="citizenship">Citizenship</label>
                                            <input type='text' name='citizenship' id="citizenship"
                                                value="{{ $c_update_pending->citizenship }}" class="form-control mb-3"
                                                required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="height">Height (cm)</label>
                                            <input type='text' name='height' id="height"
                                                value="{{ $c_update_pending->height }}" class="form-control mb-3"
                                                required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="weight">Weight (lbs)</label>
                                            <input type='text' name='weight' id="weight"
                                                value="{{ $c_update_pending->weight }}" class="form-control mb-3"
                                                required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="bmi">BMI</label>
                                            <input type='text' name='bmi' id="bmi" value="{{ $c_update_pending->bmi }}"
                                                class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="year_level">Year Level</label>
                                            <select id="year_level" name="year_level" class="form-control mb-3">
                                                <option {{ $c_update_pending->year_level_id == 1 ? 'selected' : '' }}
                                                    value="1">1st year</option>
                                                <option {{ $c_update_pending->year_level_id == 2 ? 'selected' : '' }}
                                                    value="2">2nd year</option>
                                                <option {{ $c_update_pending->year_level_id == 3 ? 'selected' : '' }}
                                                    value="3">3rd year</option>
                                                <option {{ $c_update_pending->year_level_id == 4 ? 'selected' : '' }}
                                                    value="4">4th year</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="section">Section</label>
                                            <select id="section" name="section" class="form-control mb-3">
                                                <option {{ $c_update_pending->section_id == 1 ? 'selected' : '' }}
                                                    value="1">A</option>
                                                <option {{ $c_update_pending->section_id == 2 ? 'selected' : '' }}
                                                    value="2">B</option>
                                                <option {{ $c_update_pending->section_id == 3 ? 'selected' : '' }}
                                                    value="3">C</option>
                                                <option {{ $c_update_pending->section_id == 4 ? 'selected' : '' }}
                                                    value="4">D</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="gender">Gender</label>
                                            <select id="gender" name="gender" class="form-control mb-3">
                                                <option {{ $c_update_pending->gender_id == 1 ? 'selected' : '' }}
                                                    value="1">Male</option>
                                                <option {{ $c_update_pending->gender_id == 2 ? 'selected' : '' }}
                                                    value="2">Female</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="blood_type">Blood Type</label>
                                            <select id="blood_type" name="blood_type" class="form-control mb-3">
                                                <option {{ $c_update_pending->blood_type_id == 1 ? 'selected' : '' }}
                                                    value="1">A+</option>
                                                <option {{ $c_update_pending->blood_type_id == 2 ? 'selected' : '' }}
                                                    value="2">A-</option>
                                                <option {{ $c_update_pending->blood_type_id == 3 ? 'selected' : '' }}
                                                    value="3">B+</option>
                                                <option {{ $c_update_pending->blood_type_id == 4 ? 'selected' : '' }}
                                                    value="4">B-</option>
                                                <option {{ $c_update_pending->blood_type_id == 5 ? 'selected' : '' }}
                                                    value="5">AB+</option>
                                                <option {{ $c_update_pending->blood_type_id == 6 ? 'selected' : '' }}
                                                    value="6">AB-</option>
                                                <option {{ $c_update_pending->blood_type_id == 7 ? 'selected' : '' }}
                                                    value="7">O+</option>
                                                <option {{ $c_update_pending->blood_type_id == 8 ? 'selected' : '' }}
                                                    value="8">O-</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="cbc_file">CBC</label>
                                            <input type='file' name='cbc_file' id="cbc_file"
                                                class="form-control mb-3" />
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="urinalysis_file">Urinalysis</label>
                                            <input type='file' name='urinalysis_file' id="urinalysis_file"
                                                class="form-control mb-3" />
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="fecalysis_file">Fecalysis</label>
                                            <input type='file' name='fecalysis_file' id="fecalysis_file"
                                                class="form-control mb-3" />
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="x_ray_file">Chest X-ray (PA)</label>
                                            <input type='file' name='x_ray_file' id="x_ray_file"
                                                class="form-control mb-3" />
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="hba_file">Heppa B Antigen</label>
                                            <input type='file' name='hba_file' id="hba_file"
                                                class="form-control mb-3" />
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="hbv_file">Heppa B Vaccine</label>
                                            <input type='file' name='hbv_file' id="hbv_file"
                                                class="form-control mb-3" />
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6" style="display:none;">
                                            <label for="status_record">Status Record</label>
                                            <input type='text' name='status_record' id="status_record" value="3"
                                                class="form-control mb-3" required />
                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-end mt-5">
                                        <button type="button" class="btn btn-outline-primary me-2"
                                            data-bs-toggle="modal" data-bs-target="#appointmentModal">
                                            <i class="bi bi-plus-lg"></i>&nbsp; Add appointment
                                        </button>

                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                            data-bs-target="#doyouModal">
                                            Approve &nbsp;<i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>

                                    <div class="modal fade" id="doyouModal">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Confirmation</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container mt-3 mb-3">
                                                        <div class="text-center">
                                                            <h5 class="mb-3">Do you want to approved request?</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-outline-primary">
                                                        Proceed&nbsp;<i class="bi bi-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="appointmentModal">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Appointment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container mt-3 mb-3">
                                <div class="">
                                    <label for="date_schedule_appointment">Date Schedule</label>
                                    <input type='date' name='date_schedule_appointment' id="date_schedule_appointment"
                                        value="3" class="form-control mb-3" required />
                                </div>
                                <div class="">
                                    <label for="lab_test_category">Laboratory Test Category</label>
                                    <select id="lab_test_category" name="category_applab_test_categoryointment"
                                        class="form-control mb-3">
                                        <option>-select-</option>
                                        <option value="1">CBC</option>
                                        <option value="2">Urinalysis</option>
                                        <option value="3">Fecalysis</option>
                                        <option value="4">Chest X-ray (PA)</option>
                                        <option value="5">Heppa B Antigen</option>
                                        <option value="6">Heppa B Vaccine</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="buton" class="btn btn-outline-success btn-md" data-bs-dismiss="modal">
                                Send &nbsp; <i class="bi bi-send"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
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
          </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection