@extends('includes/admin-sidenav')

@section('page-content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pending Student Medical Record Request</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Students Area</li>
                <li class="breadcrumb-item">Medical Record Requests</li>
                <li class="breadcrumb-item">Pending Medical Records Request</li>
                <li class="breadcrumb-item Active">Pending Student Medical Record Request</li>

            </ol>
        </nav>
    </div>
    <div class="mb-3">
        <a href="{{ route('a-pending-medical-records') }}" title="Back">
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

            <div class="col-lg-7">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body m-2">
                                <h5 class="card-title">Details</h5>
                                <form method="POST" action="{{ route('a-save-update-pending-record', ['id' => $a_update_pending['id']]) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6" style="display: none;">
                                            <label for="student_id">Student ID</label>
                                            <input type='text' name='student_id' id="student_id" value="{{ $a_update_pending->id }}" class="form-control mb-3" />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="first_name">First Name</label>
                                            <input type='text' name='first_name' id="first_name" value="{{ $a_update_pending->first_name }}" class="form-control mb-3" />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="middle_name">Middle Name</label>
                                            <input type='text' name='middle_name' id="middle_name" value="{{ $a_update_pending->middle_name }}" class="form-control mb-3" />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="last_name">Last Name</label>
                                            <input type='text' name='last_name' id="last_name" value="{{ $a_update_pending->last_name }}" class="form-control mb-3" />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="street_address">Street Address</label>
                                            <input type='text' name='street_address' id="street_address" value="{{ $a_update_pending->street_address }}" class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="street_number">Street Address</label>
                                            <input type='text' name='street_number' id="street_number" value="{{ $a_update_pending->street_number }}" class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="barangay">Barangay</label>
                                            <input type='text' name='barangay' id="barangay" value="{{ $a_update_pending->barangay }}" class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="muni_city">Municipality / City</label>
                                            <input type='text' name='muni_city' id="muni_city" value="{{ $a_update_pending->muni_city }}" class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="date_of_birth">Date of Birth</label>
                                            <input type='date' name='date_of_birth' id="date_of_birth" value="{{ $a_update_pending->date_of_birth }}" class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="age">Age</label>
                                            <input type='number' name='age' id="age" value="{{ $a_update_pending->age }}" class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="phone">Phone</label>
                                            <input type='number' name='phone' id="phone" value="{{ $a_update_pending->phone }}" class="form-control mb-3" />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="civil_status">Civil Status</label>
                                            <input type='text' name='civil_status' id="civil_status" value="{{ $a_update_pending->civil_status }}" class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="citizenship">Citizenship</label>
                                            <input type='text' name='citizenship' id="citizenship" value="{{ $a_update_pending->citizenship }}" class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="height">Height (cm)</label>
                                            <input type='text' name='height' id="height" value="{{ $a_update_pending->height }}" class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="weight">Weight (lbs)</label>
                                            <input type='text' name='weight' id="weight" value="{{ $a_update_pending->weight }}" class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="bmi">BMI</label>
                                            <input type='text' name='bmi' id="bmi" value="{{ $a_update_pending->bmi }}" class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="year_level">Year Level</label>
                                            <select id="year_level" name="year_level" class="form-control mb-3">
                                                <option {{ $a_update_pending->year_level_id == 1 ? 'selected' : '' }} value="1">1st year</option>
                                                <option {{ $a_update_pending->year_level_id == 2 ? 'selected' : '' }} value="2">2nd year</option>
                                                <option {{ $a_update_pending->year_level_id == 3 ? 'selected' : '' }} value="3">3rd year</option>
                                                <option {{ $a_update_pending->year_level_id == 4 ? 'selected' : '' }} value="4">4th year</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="section">Section</label>
                                            <select id="section" name="section" class="form-control mb-3">
                                                <option {{ $a_update_pending->section_id == 1 ? 'selected' : '' }} value="1">A</option>
                                                <option {{ $a_update_pending->section_id == 2 ? 'selected' : '' }} value="2">B</option>
                                                <option {{ $a_update_pending->section_id == 3 ? 'selected' : '' }} value="3">C</option>
                                                <option {{ $a_update_pending->section_id == 4 ? 'selected' : '' }} value="4">D</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="gender">Gender</label>
                                            <select id="gender" name="gender" class="form-control mb-3">
                                                <option {{ $a_update_pending->gender_id == 1 ? 'selected' : '' }} value="1">Male</option>
                                                <option {{ $a_update_pending->gender_id == 2 ? 'selected' : '' }} value="2">Female</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="blood_type">Blood Type</label>
                                            <select id="blood_type" name="blood_type" class="form-control mb-3">
                                                <option {{ $a_update_pending->blood_type_id == 1 ? 'selected' : '' }} value="1">A+</option>
                                                <option {{ $a_update_pending->blood_type_id == 2 ? 'selected' : '' }} value="2">A-</option>
                                                <option {{ $a_update_pending->blood_type_id == 3 ? 'selected' : '' }} value="3">B+</option>
                                                <option {{ $a_update_pending->blood_type_id == 4 ? 'selected' : '' }} value="4">B-</option>
                                                <option {{ $a_update_pending->blood_type_id == 5 ? 'selected' : '' }} value="5">AB+</option>
                                                <option {{ $a_update_pending->blood_type_id == 6 ? 'selected' : '' }} value="6">AB-</option>
                                                <option {{ $a_update_pending->blood_type_id == 7 ? 'selected' : '' }} value="7">O+</option>
                                                <option {{ $a_update_pending->blood_type_id == 8 ? 'selected' : '' }} value="8">O-</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="cbc_file">CBC</label>
                                            <input type='file' name='cbc_file' id="cbc_file" class="form-control mb-3" />
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="urinalysis_file">Urinalysis</label>
                                            <input type='file' name='urinalysis_file' id="urinalysis_file" class="form-control mb-3" />
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="fecalysis_file">Fecalysis</label>
                                            <input type='file' name='fecalysis_file' id="fecalysis_file" class="form-control mb-3" />
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="x_ray_file">Chest X-ray (PA)</label>
                                            <input type='file' name='x_ray_file' id="x_ray_file" class="form-control mb-3" />
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="hba_file">Heppa B Antigen</label>
                                            <input type='file' name='hba_file' id="hba_file" class="form-control mb-3" />
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="hbv_file">Heppa B Vaccine</label>
                                            <input type='file' name='hbv_file' id="hbv_file" class="form-control mb-3" />
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6" style="display:none;">
                                            <label for="status_record">Status Record</label>
                                            <input type='text' name='status_record' id="status_record" value="2" class="form-control mb-3" required />
                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-end mt-5">
                                        <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#appointmentModal">
                                            <i class="bi bi-plus-lg"></i>&nbsp; Add appointment
                                        </button>

                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#doyouModal">
                                            Next &nbsp;<i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>

                                    <div class="modal fade" id="appointmentModal">
                                        <div class="modal-dialog modal-dialog-centered modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Appointment</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <form action="{{ route('save-admin-appointment') }}" method="post" class="row g-3 needs-validation" novalidate>
                                                        @csrf
                                                        <div class="col-12" style="display: none;">
                                                            <label for="from" class="form-label mt-2">From</label>
                                                            <div class="input-group has-validation">
                                                                <span class="input-group-text">
                                                                    <i class="bi bi-file-person"></i>
                                                                </span>
                                                                <input type="text" name="from" class="form-control" value="{{ Session::get('id') }}" id="from" required>
                                                                <div class="invalid-feedback">Empty school nurse.</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12" style="display: none;">
                                                            <label for="to" class="form-label mt-2">To</label>
                                                            <div class="input-group has-validation">
                                                                <span class="input-group-text">
                                                                    <i class="bi bi-file-person"></i>
                                                                </span>
                                                                <input type="text" name="to" class="form-control" value="{{ $a_update_pending->student_id }}" id="to" required>
                                                                <div class="invalid-feedback">Empty nursing student.</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="date" class="form-label mt-2">Schedule Date</label>
                                                            <div class="input-group has-validation">
                                                                <span class="input-group-text">
                                                                    <i class="bi bi-calendar"></i>
                                                                </span>
                                                                <input type="date" name="date" class="form-control" id="date" required>
                                                                <div class="invalid-feedback">Empty schedule date.</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="time" class="form-label mt-2">Schedule Time</label>
                                                            <div class="input-group has-validation">
                                                                <span class="input-group-text">
                                                                    <i class="bi bi-clock"></i>
                                                                </span>
                                                                <input type="time" name="time" class="form-control" id="time" required>
                                                                <div class="invalid-feedback">Empty schedule time.</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="room" class="form-label mt-2">Room</label>
                                                            <div class="input-group has-validation">
                                                                <span class="input-group-text">
                                                                    <i class="bi bi-house-door"></i>
                                                                </span>
                                                                <input type="text" name="room" class="form-control" id="room" required>
                                                                <div class="invalid-feedback">Empty room for lab test.</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="lab_test" class="form-label">Laboratory Test Category</label>
                                                            <div class="input-group has-validation">
                                                                <span class="input-group-text">
                                                                    <i class="bi bi-eyedropper"></i>
                                                                </span>
                                                                <select id="lab_test" name="lab_test" class="form-control" required>
                                                                    <option>-select-</option>
                                                                    <option value="1">CBC</option>
                                                                    <option value="2">Urinalysis</option>
                                                                    <option value="3">Fecalysis</option>
                                                                    <option value="4">Chest X-ray (PA)</option>
                                                                    <option value="5">Heppa B Antigen</option>
                                                                    <option value="6">Heppa B Vaccine</option>
                                                                </select>
                                                                <div class="invalid-feedback">Empty laboratory test category.</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-outline-success btn-md w-100 mt-3">
                                                                <i class="bi bi-plus-lg"></i>&nbsp;
                                                                Add
                                                            </button>
                                                        </div>
                                                    </form>
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

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body pb-4">
                        <h5 class="card-title">Medical History</h5>
                        <div class="news">
                            <!-- CONTENT HERE -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection