@extends('includes/student-sidenav')

@section('page-content')
        <div id="loader"></div>
        <div id="forLoader" style="display:none;">
            <div class="container mb-5 page view-record">
                @if(Session::has('success'))
                    <div class="alert alert-success text-center" role="alert" id="alertbox">
                        {{ Session::get('success') }}
                        <button class="btn-close" onclick="closeFn()"></button>
                    </div>
                @endif
                @if(Session::has('removal'))
                    <div class="alert alert-danger text-center" role="alert" id="alertbox">
                        {{ Session::get('removal') }}
                        <button class="btn-close" onclick="closeFn()"></button>
                    </div>
                @endif
                <div class="container">
                    <p class="page-title">Main / View Medical Records / Record</p>
                    <div class="container header rounded shadow-sm mb-4">
                        <div class="header-content">
                            <span>
                                &nbsp; Medical Record
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('student-dashboard') }}" title="Back" class="back">
                            <i class="bi bi-arrow-left"></i>
                                &nbsp;Back
                        </a>
                    </div>
                    <div class="container border rounded p-5">
                        <div class="container mb-4">
                            <div class="row">
                                <!-- <div class="col-4">
                                    <div class="container profile-list">
                                        <ul>
                                            <li>
                                                <img src="<?php /* echo asset('images/profile.jpg') */ ?>" width="100px" alt="Profile Picture" />
                                            </li>
                                            <li><h4>This is my name</h4></li>
                                            <li>Bachelor of Science in Nursing</li>
                                            <li>Year Level | Section</li>
                                            <li>
                                                <button class="btn-profile">Link 1</button>
                                                <button class="btn-profile-outline">Link 2</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                                <div class="col-6">
                                    <p>Medical Record</p>
                                    <div class="medical-record">
                                        <ul>
                                            <li>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>Full name</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6>{{ $student_record[0]['first_name'] }} {{ $student_record[0]['middle_name'] }} {{ $student_record[0]['last_name'] }}</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr />
                                            <li>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>Age:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6>{{ $student_record[0]['age'] }}</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr />
                                            <li>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>Date of birth:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6>{{ $student_record[0]['date_of_birth'] }}</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr />
                                            <li>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>Phone:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6>{{ $student_record[0]['phone'] }}</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr />
                                            <li>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>Address:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6>{{ $student_record[0]['street_address'] }}, {{ $student_record[0]['muni_city'] }} City, Barangay {{ $student_record[0]['barangay'] }}</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr />
                                            <li>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>Civil Status:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6>{{ $student_record[0]['civil_status'] }}</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr />
                                            <li>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>Citizenship:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6>{{ $student_record[0]['citizenship'] }}</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr />
                                            <li>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>Height:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6>{{ $student_record[0]['height'] }}</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr />
                                            <li>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>Weight:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6>{{ $student_record[0]['weight'] }}</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr />
                                            <li>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>BMI:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6>{{ $student_record[0]['bmi'] }}</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr />
                                            <li>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>Gender:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6>{{ $student_record[0]['gender_id'] }}</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr />
                                            <li>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>Blood type:</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6>{{ $student_record[0]['blood_type_id'] }}</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr />
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <p>Medical History</p>
                                    <div class="medical-record">
                                        @foreach ($medical_history as $med_history)
                                        <ul>
                                            <li>
                                                <h6><strong>Checked conditions that apply to you or any of your close family members:</strong></h6>
                                                <h6>{{ $med_history->condition_option }}, {{ $med_history->other_condition_option }}</h6>
                                            </li>
                                            <hr />
                                            <li>
                                                <h6><strong>Checked symptoms that you're currently experiencing:</strong></h6>
                                                <h6>sample text</h6>
                                            </li>
                                            <hr />
                                            <li>
                                                <h6><strong>Currently taking any medication?</strong></h6>
                                                <h6>sample text</h6>
                                            </li>
                                            <hr />
                                            <li>
                                                <h6><strong>Do you have any medication allergies?</strong></h6>
                                                <h6>sample text</h6>
                                            </li>
                                            <hr />
                                            <li>
                                                <h6><strong>Do you use or do you have history of using tobacco?</strong></h6>
                                                <h6>sample text</h6>
                                            </li>
                                            <hr />
                                            <li>
                                                <h6><strong>Do you use or do you have history of using illegal drugs?</strong></h6>
                                                <h6>sample text</h6>
                                            </li>
                                            <hr />
                                            <li>
                                                <h6><strong>How often do you consume alcohol?</strong></h6>
                                                <h6>sample text</h6>
                                            </li>
                                        </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- for Data Tables -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready (function() {
                $('table').DataTable();
            });
        </script>
@endsection
