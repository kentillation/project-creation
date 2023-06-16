@extends('includes/admin-sidenav')

@section('page-content')
        <div id="loader"></div>
        <div id="forLoader" style="display:none;">
            <div class="container border rounded p-5 mt-5">
                <div class="container">
                    <div class="mb-3">
                        <a href="{{ route('student-list') }}" title="Back" class="back">
                            <i class="bi bi-arrow-left"></i>
                                &nbsp;Back
                        </a>
                    </div>
                    <form method="post" action="{{ route('update-save-student', ['id' => $tbl_student['id']]) }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="student_id">Student ID</label>
                                <input type='text' name='student_id' value="{{ $tbl_student['student_id'] }}" id="student_id" class="form-control mb-3 readonly" readonly />
                            </div>
                            <div class="col-12">
                                <label for="first_name">First name</label>
                                <input type='text' name='first_name' value="{{ $tbl_student['first_name'] }}" id="first_name" class="form-control mb-3" required />
                            </div>
                            <div class="col-12">
                                <label for="middle_name">Middle name</label>
                                <input type='text' name='middle_name' value="{{ $tbl_student['middle_name'] }}" id="middle_name" class="form-control mb-3" required />
                            </div>
                            <div class="col-12">
                                <label for="last_name">Last name</label>
                                <input type='text' name='last_name' value="{{ $tbl_student['last_name'] }}" id="last_name" class="form-control mb-3" required />
                            </div>
                            <div class="col-12">
                                <label for="phone">Phone</label>
                                <input type='number' name='phone' value="{{ $tbl_student['phone'] }}" id="phone" class="form-control mb-3" required />
                            </div>
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input type='email' name='email' value="{{ $tbl_student['email'] }}" id="email" class="form-control mb-3" required />
                            </div>
                            <div class="col-12">
                                <label for="username">Username</label>
                                <input type='text' name='username' value="{{ $tbl_student['username'] }}" id="username" class="form-control mb-3" required />
                            </div>
                        </div>
                        <div class="container mt-2">
                            <button class="btn-profile mt-3" type="submit">
                                <i class="bi bi-arrow-clockwise"></i>
                                &nbsp;Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
