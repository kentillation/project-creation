@extends('includes/student-sidenav')

@section('page-content')
        <div id="loader"></div>
        <div id="forLoader" style="display:none;">
        <div class="container mb-5 homepage">
                <div class="container">
                        <p class="page-title">Dashboard</p>
                </div>
                <div class="container">
                        <div class="hero shadow-sm">
                                <div class="info">
                                        <div>
                                                <p>Christian School | A.Y. 2023-2024</p>
                                                <p>{{ Session::get('last_name') }}, {{ Session::get('first_name') }} {{ Session::get('middle_name') }} | {{ Session::get('student_id' ) }}</p>
                                                <p>College of Nursing</p>
                                        </div>
                                        
                                </div>
                                <div>
                                        <img src="<?php echo asset('images/ehr_logo_v2.png') ?>" />
                                </div>
                        </div>
                </div>
                <div class="container mt-4">
                        <div class="records">
                                <a href="{{ route('add-medical-record') }}" class="record shadow-sm">
                                        <i class="bi bi-pencil-square"></i>
                                        &nbsp;  Add Medical Record
                                </a>
                                        
                                <a href="{{ route('view-medical-record') }}" class="record shadow-sm">
                                        <i class="bi bi-search"></i>
                                        &nbsp; View Medical Records
                                </a>

                                <a href="#" class="record shadow-sm">
                                        <i class="bi bi-eye"></i>
                                        &nbsp; View Medical History
                                </a>
                        </div>
                </div>
            </div>
        </div>
@endsection