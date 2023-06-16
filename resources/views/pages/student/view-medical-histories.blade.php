@extends('includes/student-sidenav')

@section('page-content')
        <div id="loader"></div>
        <div id="forLoader" style="display:none;">
            <div class="container page mb-5">
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
                    <p class="page-title">Main / View Medical History</p>
                    <div class="container header rounded shadow-sm mb-4">
                        <div class="header-content">
                            <span>
                                &nbsp; Medical History
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
                            <div class="table-responsive">
                                <table class="table table-hover text-center" id="table">
                                    <thead class="text-bg-secondary">
                                        <tr>
                                            <th>First name</th>
                                            <th>Middle name</th>
                                            <th>Last name</th>
                                            <th>Status</th>
                                            <th>Action</th>
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

        <!-- for Data Tables -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready (function() {
                $('table').DataTable();
            });
        </script>
@endsection
