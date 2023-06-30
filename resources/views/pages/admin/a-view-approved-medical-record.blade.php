@extends('includes/admin-sidenav')

@section('page-content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Approved Student Medical Record Request</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Students Area</li>
                <li class="breadcrumb-item">Medical Record Requests</li>
                <li class="breadcrumb-item">Approved Medical Records Request</li>
                <li class="breadcrumb-item Active">Approved Student Medical Record Request</li>
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
    <div class="mt-3 mb-3">
        <div class="row">
            <div class="col-lg-3">
                <form action="{{ route('update-access-code', ['id' => $a_view_approved_medical_record['id']]) }}" method="POST" class="row g-3 needs-validation" novalidate>
                    @csrf
                    <div class="input-group has-validation mt-5">
                        <span class="input-group-text">
                            <i class="bi bi-at"></i>
                        </span>
                        <input type="text" name="access_code" class="form-control" value="{{ $a_view_approved_medical_record['access_code_from_admin'] }}" id="access_code" placeholder="Access Code" required>
                        <div class="invalid-feedback">Enter access code.</div>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-outline-success btn-sm w-100" type="submit">
                            <i class="bi bi-arrow-clockwise"></i>
                            &nbsp; Update
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
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
                                        <h5 class="card-title"></h5>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="view-medical-record">
                                                    <ul>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h6>Full name</h6>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6>
                                                                        {{ $a_view_approved_medical_record->first_name }}
                                                                        {{ $a_view_approved_medical_record->middle_name }}
                                                                        {{ $a_view_approved_medical_record->last_name }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <hr />
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h6>Age:</h6>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6>{{ $a_view_approved_medical_record->age }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <hr />
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h6>Date of birth:</h6>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6>{{ $a_view_approved_medical_record->date_of_birth }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <hr />
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h6>Phone:</h6>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6>{{ $a_view_approved_medical_record->phone }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <hr />
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h6>Address:</h6>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6>
                                                                        {{ $a_view_approved_medical_record->street_number }},
                                                                        {{ $a_view_approved_medical_record->street_address }},
                                                                        {{ $a_view_approved_medical_record->barangay }},
                                                                        {{ $a_view_approved_medical_record->muni_city }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <hr />
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h6>Civil Status:</h6>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6>{{ $a_view_approved_medical_record->civil_status }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <hr />
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h6>Citizenship:</h6>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6>{{ $a_view_approved_medical_record->citizenship }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <hr />
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h6>Height:</h6>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6>{{ $a_view_approved_medical_record->height }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <hr />
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h6>Weight:</h6>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6>{{ $a_view_approved_medical_record->weight }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <hr />
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h6>BMI:</h6>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6>{{ $a_view_approved_medical_record->bmi }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <hr />
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h6>Gender:</h6>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6>{{ $a_view_approved_medical_record->student_gender->gender }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <hr />
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h6>Blood type:</h6>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6>{{ $a_view_approved_medical_record->student_blood_type->blood_type }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <hr />
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade profile-edit" id="lab-test">
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <label for="cbc_file">CBC</label>
                                                <a href="/cbc-folder/{{ $a_view_approved_medical_record->cbc_file }}">
                                                    <div class="container rounded border img-container">
                                                        <div class="img-lab-test-container">
                                                            <img src="/cbc-folder/{{ $a_view_approved_medical_record->cbc_file }}" width="150" height="150" />
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <label for="urinalysis_file">Urinalysis</label>
                                                <a href="/urinalysis-folder/{{ $a_view_approved_medical_record->urinalysis_file }}">
                                                    <div class="container rounded border img-container">
                                                        <div class="img-lab-test-container">
                                                            <img src="/urinalysis-folder/{{ $a_view_approved_medical_record->urinalysis_file }}" width="150" height="150" />
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <label for="fecalysis_file">Fecalysis</label>
                                                <a href="/fecalysis-folder/{{ $a_view_approved_medical_record->fecalysis_file }}">
                                                    <div class="container rounded border img-container">
                                                        <div class="img-lab-test-container">
                                                            <img src="/fecalysis-folder/{{ $a_view_approved_medical_record->fecalysis_file }}" width="150" height="150" />
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-6 mt-3">
                                                <label for="x_ray_file">Chest X-ray (PA)</label>
                                                <a href="/xray-folder/{{ $a_view_approved_medical_record->x_ray_file }}">
                                                    <div class="container rounded border img-container">
                                                        <div class="img-lab-test-container">
                                                            <img src="/xray-folder/{{ $a_view_approved_medical_record->x_ray_file }}" width="150" height="150" />
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-6 mt-3">
                                                <label for="hba_file">Heppa B Antigen</label>
                                                <a href="/hba-folder/{{ $a_view_approved_medical_record->hba_file }}">
                                                    <div class="container rounded border img-container">
                                                        <div class="img-lab-test-container">
                                                            <img src="/hba-folder/{{ $a_view_approved_medical_record->hba_file }}" width="150" height="150" />
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-6 mt-3">
                                                <label for="hbv_file">Heppa B Vaccine</label>
                                                <a href="/hbv-folder/{{ $a_view_approved_medical_record->hbv_file }}">
                                                    <div class="container rounded border img-container">
                                                        <div class="img-lab-test-container">
                                                            <img src="/hbv-folder/{{ $a_view_approved_medical_record->hbv_file }}" width="150" height="150" />
                                                        </div>
                                                    </div>
                                                </a>
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