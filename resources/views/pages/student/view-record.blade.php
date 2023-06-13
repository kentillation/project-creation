@extends('includes/student-sidenav')

@section('page-content')
        <div id="loader"></div>
        <div id="forLoader" style="display:none;">
            <div class="container mb-5 add-med-rec">
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
                    <p class="page-title">Home / View Medical Record</p>
                    <div class="container header rounded shadow-sm mb-4">
                        <div class="header-content">
                            <i class="bi bi-search"></i> 
                            <span>
                                &nbsp;  View Medical Records
                            </span>
                        </div>
                    </div>
                    <div class="container border rounded p-5">
                        <div class="tbl-top-btns mb-4">
                            <div class="btn-dl me-2">
                                <a href="#" title="DOWNLOAD AS PDF" target="_blank">
                                    <button class="btn-download">
                                        <i class="bi bi-box-arrow-down">&nbsp;</i>
                                        PDF
                                    </button>
                                </a>
                                
                                <button class="btn-download" title="DOWNLOAD AS SPREADSHEET" onclick="saveAsExcel('table', 'List of Nursing Student User.xls')">
                                    <i class="bi bi-box-arrow-down">&nbsp;</i>
                                    XLS
                                </button>
                            </div>
                        </div>
                        <div class="container mb-4">
                            <div class="table-responsive">
                                <table class="table table-hover text-center" id="table">
                                    <thead class="text-bg-secondary">
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Full name</th>
                                            <th>Status</th>
                                            <th>_____Action_____</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

        </div>
@endsection
