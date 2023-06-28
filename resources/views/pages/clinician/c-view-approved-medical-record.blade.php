@extends('includes/clinician-sidenav')

@section('page-content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>View Approved Record</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Medical Record</li>
                <li class="breadcrumb-item">View Medical Records</li>
                <li class="breadcrumb-item active">View Approved Record</li>
            </ol>
        </nav>
    </div>
    <div class="mb-3">
        <a href="{{ url()->previous() }}" title="Back">
            <i class="bi bi-arrow-left"></i>
            &nbsp;Back
        </a>
    </div>
    @if(Session::has('removal'))
    <div class="alert alert-danger text-center alert-dismissible fade show" role="alert" id="alertbox">
        {{ Session::get('removal') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <section class="section dashboard">
        <div class="row">

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body m-2">
                                <h5 class="card-title">Medical Record</h5>
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
                                                                {{ $c_view_approved_medical_record->first_name }}
                                                                {{ $c_view_approved_medical_record->middle_name }}
                                                                {{ $c_view_approved_medical_record->last_name }}
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
                                                            <h6>{{ $c_view_approved_medical_record->age }}</h6>
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
                                                            <h6>{{ $c_view_approved_medical_record->date_of_birth }}</h6>
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
                                                            <h6>{{ $c_view_approved_medical_record->phone }}</h6>
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
                                                                {{ $c_view_approved_medical_record->street_number }},
                                                                {{ $c_view_approved_medical_record->street_address }},
                                                                {{ $c_view_approved_medical_record->barangay }},
                                                                {{ $c_view_approved_medical_record->muni_city }}
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
                                                            <h6>{{ $c_view_approved_medical_record->civil_status }}</h6>
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
                                                            <h6>{{ $c_view_approved_medical_record->citizenship }}</h6>
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
                                                            <h6>{{ $c_view_approved_medical_record->height }}</h6>
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
                                                            <h6>{{ $c_view_approved_medical_record->weight }}</h6>
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
                                                            <h6>{{ $c_view_approved_medical_record->bmi }}</h6>
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
                                                            <h6>{{ $c_view_approved_medical_record->student_gender->gender }}</h6>
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
                                                            <h6>{{ $c_view_approved_medical_record->student_blood_type->blood_type }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <hr />
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body m-2">
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

    <!-- for Data Tables -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>

</main><!-- End #main -->
@endsection