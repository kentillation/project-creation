@extends('includes/admin-sidenav')

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
                                    <p>{{ Session::get('name') }} | Admin</p>
                                </div>
                                                
                            </div>
                            <div>
                                <img src="<?php echo asset('images/ehr_logo_v2.png') ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="container mt-4">
                        <div class="records">
                            <a href="#" class="btn btn-outline-warning record shadow-sm">
                                <i class="bi bi-clock-history text-warning"></i>
                                &nbsp;  Pending Medical Records
                                <span>
                                    <h1>100</h1>
                                </span>
                            </a>
                            <a href="#" class="btn btn-outline-danger record shadow-sm">
                                <i class="bi bi-exclamation-circle text-danger"></i>
                                &nbsp; Declined Medical Records
                                <span>
                                    <h1>50</h1>
                                </span>
                            </a>
                            <a href="#" class="btn btn-outline-success record shadow-sm">
                                <i class="bi bi-check-circle text-success"></i>
                                &nbsp; Approved Medical Records
                                <span>
                                    <h1>200</h1>
                                </span>
                            </a>
                        </div>
                    </div>
            </div>
        </div>
@endsection