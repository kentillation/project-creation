@extends('includes/staff-sidenav')

@section('page-content')
        <div id="loader"></div>
                <div id="forLoader" style="display:none;">
                        <div class="container mb-5 homepage">
                                <div class="container">
                                        <div class="hero shadow-sm">
                                                <div class="info">
                                                        <div>
                                                        <p>Christian School | A.Y 2023-2024</p>
                                                        <p>{{ Session::get('last_name') }}, {{ Session::get('first_name') }} {{ Session::get('middle_name') }} | {{ Session::get('student_id' ) }}</p>
                                                        <p>College of Nursing | {{ Session::get('year_level') }}</p>
                                                        </div>
                                                
                                                </div>
                                                        <div>
                                                        <img src="<?php echo asset('images/ehr_logo_v2.png') ?>" />
                                                        </div>
                                        </div>
                                </div>
                        
                        </div>

                        <div class="container mb-4">
                        <div class="table-responsive">
                            <table class="table table-hover text-center" id="table">
                                <thead class="text-bg-secondary">
                                    <tr>
                                        <th>Student ID</th>
                                        <th>First name</th>
                                        <th>Middle name</th>
                                        <th>Last name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>_____Action_____</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tbl_student as $student)
                                        <tr>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->first_name }}</td>
                                            <td>{{ $student->middle_name }}</td>
                                            <td>{{ $student->last_name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->username }}</td>
                                            <td>
                                                <a href="#">
                                                    <button class="btn-view btn-sm" title="VIEW STUDENT RECORD">
                                                        <i class="bi bi-eye"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
@endsection