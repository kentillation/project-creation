@extends('includes/clinician-sidenav')

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
                                                        <p>{{ Session::get('name') }} | Clinician</p>
                                                </div>
                                                
                                        </div>
                                        <div>
                                                <img src="<?php echo asset('images/ehr_logo_v2.png') ?>" />
                                        </div>
                                </div>
                        </div>
                        <div class="container mt-4">
                                <div class="records">
                                        <a href="{{ route('c-pending-medical-records') }}" class="btn btn-outline-warning record shadow-sm">
                                                <i class="bi bi-clock-history text-warning"></i>
                                                        &nbsp;  Pending Medical Records
                                                <span>
                                                        <h1>{{ $pending }}</h1>
                                                </span>
                                        </a>

                                        <a href="{{ route('c-declined-medical-records') }}" class="btn btn-outline-danger record shadow-sm">
                                                <i class="bi bi-exclamation-circle text-danger"></i>
                                                &nbsp; Declined Medical Records
                                                <span>
                                                        <h1>{{ $declined }}</h1>
                                                </span>
                                        </a>
                                                
                                        <a href="{{ route('c-approved-medical-records') }}" class="btn btn-outline-success record shadow-sm">
                                                <i class="bi bi-check-circle text-success"></i>
                                                &nbsp; Approved Medical Records
                                                <span>
                                                        <h1>{{ $approved }}</h1>
                                                </span>
                                        </a>

                                        
                                </div>
                        </div>
                </div>
        </div>
@endsection