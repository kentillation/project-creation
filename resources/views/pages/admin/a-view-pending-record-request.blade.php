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
        <a href="{{ url()->previous() }}" title="Back">
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
                        <div class="card">
                            <div class="card-body pt-3">

                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#medical-record">Medical
                                            Record</button>
                                    </li>

                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#lab-test">Laboratory Test</button>
                                    </li>
                                </ul>

                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade show active" id="medical-record">
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
                                                    <label for="street_number">Street Number</label>
                                                    <input type='text' name='street_number' id="street_number" value="{{ $a_update_pending->street_number }}" class="form-control mb-3" required />
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <label for="street_address">Street Address</label>
                                                    <input type='text' name='street_address' id="street_address" value="{{ $a_update_pending->street_address }}" class="form-control mb-3" required />
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
                                            </div>

                                            <div class="d-flex justify-content-end mt-3 mb-2">
                                                <button type="submit" class="btn btn-outline-primary me-2">
                                                    <i class="bi bi-check-circle"></i>&nbsp; Update Medical Record
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade profile-edit" id="lab-test">
                                        <form method="POST" action="{{ route('a-save-update-lab-test', ['id' => $a_update_pending['id']]) }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <p class="fs-5 mt-2 mb-4">Laboratory Test</p>
                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <label for="cbc_file">CBC</label>
                                                    <a href="/cbc-folder/{{ $a_update_pending->cbc_file }}">
                                                        <div class="container rounded border img-container">
                                                            <div class="img-lab-test-container">
                                                                <img src="/cbc-folder/{{ $a_update_pending->cbc_file }}" width="150" height="150" />
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <input type='file' name='cbc_file' id="cbc_file" class="form-control mb-3" />
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <label for="urinalysis_file">Urinalysis</label>
                                                    <a href="/urinalysis-folder/{{ $a_update_pending->urinalysis_file }}">
                                                        <div class="container rounded border img-container">
                                                            <div class="img-lab-test-container">
                                                                <img src="/urinalysis-folder/{{ $a_update_pending->urinalysis_file }}" width="150" height="150" />
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <input type='file' name='urinalysis_file' id="urinalysis_file" class="form-control mb-3" />
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <label for="fecalysis_file">Fecalysis</label>
                                                    <a href="/fecalysis-folder/{{ $a_update_pending->fecalysis_file }}">
                                                        <div class="container rounded border img-container">
                                                            <div class="img-lab-test-container">
                                                                <img src="/fecalysis-folder/{{ $a_update_pending->fecalysis_file }}" width="150" height="150" />
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <input type='file' name='fecalysis_file' id="fecalysis_file" class="form-control mb-3" />
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <label for="x_ray_file">Chest X-ray (PA)</label>
                                                    <a href="/xray-folder/{{ $a_update_pending->x_ray_file }}">
                                                        <div class="container rounded border img-container">
                                                            <div class="img-lab-test-container">
                                                                <img src="/xray-folder/{{ $a_update_pending->x_ray_file }}" width="150" height="150" />
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <input type='file' name='x_ray_file' id="x_ray_file" class="form-control mb-3" />
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <label for="hba_file">Heppa B Antigen</label>
                                                    <a href="/hba-folder/{{ $a_update_pending->hba_file }}">
                                                        <div class="container rounded border img-container">
                                                            <div class="img-lab-test-container">
                                                                <img src="/hba-folder/{{ $a_update_pending->hba_file }}" width="150" height="150" />
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <input type='file' name='hba_file' id="hba_file" class="form-control mb-3" />
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <label for="hbv_file">Heppa B Vaccine</label>
                                                    <a href="/hbv-folder/{{ $a_update_pending->hbv_file }}">
                                                        <div class="container rounded border img-container">
                                                            <div class="img-lab-test-container">
                                                                <img src="/hbv-folder/{{ $a_update_pending->hbv_file }}" width="150" height="150" />
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <input type='file' name='hbv_file' id="hbv_file" class="form-control mb-3" />
                                                </div>

                                            </div>
                                            <div class="d-flex justify-content-end mt-5">
                                                <button type="submit" class="btn btn-outline-primary me-2">
                                                    <i class="bi bi-check-circle"></i>&nbsp; Update Lab Test Result
                                                </button>

                                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#doyouModal">
                                                    Approve &nbsp;<i class="bi bi-arrow-right"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="doyouModal">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container mt-3 mb-3">
                                <div class="text-center">
                                    <h5 class="mb-3">Do you want to approved request?</h5>
                                    <form action="{{ route('a-approve-request', ['id' => $a_update_pending['id']]) }}" method="POST" class="row g-3 needs-validation" novalidate>
                                    @csrf
                                    <button class="btn btn-outline-success w-100 mt-4" type="submit">
                                        Proceed &nbsp; <i class="bi bi-box-arrow-in-right"></i>
                                    </button>
                                    </form>
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
                            @foreach ($medical_history as $med_history)
                            <div class="post-item clearfix">
                                <h6><strong>History Date:</strong></h6>
                                <h6>{{ $med_history->date }}</h6>
                            </div>
                            <div class="post-item clearfix">
                                <h6><strong>Checked conditions that apply to you or any of your close family members:</strong></h6>
                                <h6>
                                    <?php foreach (json_decode($med_history->condition_option) as $value) {
                                        if ($value != 'other') {
                                            echo "$value, ";
                                        }
                                    } ?>{{ $med_history->other_condition_option }}
                                </h6>
                            </div>

                            <div class="post-item clearfix">
                                <h6><strong>Checked symptoms that you're currently experiencing:</strong></h6>
                                <h6>
                                    <?php foreach (json_decode($med_history->symptoms_option) as $value) {
                                        if ($value != 'other') {
                                            echo "$value, ";
                                        }
                                    } ?>{{ $med_history->other_symptoms_option }}
                                </h6>
                            </div>

                            <div class="post-item clearfix">
                                <h6><strong>Currently taking any medication?</strong></h6>
                                <h6>{{ $med_history->medication }}</h6>
                            </div>

                            <div class="post-item clearfix">
                                <h6><strong>Do you have any medication allergies?</strong></h6>
                                <h6>{{ $med_history->allergies }}</h6>
                            </div>

                            <div class="post-item clearfix">
                                <h6><strong>Do you use or do you have history of using tobacco?</strong></h6>
                                <h6>{{ $med_history->using_tobacco }}</h6>
                            </div>

                            <div class="post-item clearfix">
                                <h6><strong>Do you use or do you have history of using illegal drugs?</strong></h6>
                                <h6>{{ $med_history->using_illegal_drug }}</h6>
                            </div>

                            <div class="post-item clearfix">
                                <h6><strong>How often do you consume alcohol?</strong></h6>
                                <h6>{{ $med_history->consume_alcohol }}</h6>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection