@extends('includes/admin-sidenav')

@section('page-content')
        <div id="loader"></div>
        <div id="forLoader" style="display:none;">
            <div class="container student-list mb-5">
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
                <div class="mb-3">
                    <a href="{{ route('student-dashboard') }}" title="Back" class="back">
                        <i class="bi bi-arrow-left"></i>
                            &nbsp;Back
                    </a>
                </div>
                <div class="container border rounded p-5 reports">
                    <h1 class="heading1 text-center mb-5"><strong>List of Nursing Student</strong></h1>
                    <div class="tbl-top-btns mb-4">
                        <div class="btn-dl me-2">
                            <button class="btn-add-user" type="button" title="ADD USER" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                                <i class="bi bi-plus-lg">&nbsp;</i>
                                ADD
                            </button>
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
                                                <a href="{{ route('update-student', ['id' => $student->id] ) }}">
                                                    <button class="btn btn-outline-success btn-sm" title="Modify">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('delete-student', ['id' => $student->id] ) }}">
                                                    <button class="btn btn-outline-danger btn-sm" title="Move to trash">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('view-stud-med-record', ['id' => $student->id] ) }}">
                                                    <button class="btn btn-outline-primary btn-sm" title="View medical record">
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
            </div>
        </div>
        <div class="modal fade" id="addStudentModal">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h5 class="modal-title">New account for Nursing Student</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
                        <div class="container">
                            <form method="POST" action="{{ route('save-student') }}">
                                @csrf
                                <div class="form-ni">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" id="student_id" name="student_id" class="form-control mt-2 mb-3" placeholder="Student ID" required/>
                                                <label for="student_id">Student ID</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" id="first_name" name="first_name" class="form-control mt-2 mb-3" placeholder="First name" required/>
                                                <label for="first_name">First name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" id="middle_name" name="middle_name" class="form-control mt-2 mb-3" placeholder="Middle name" required/>
                                                <label for="middle_name">Middle name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" id="last_name" name="last_name" class="form-control mt-2 mb-3" placeholder="Last name" required/>
                                                <label for="last_name">Last name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" id="phone" name="phone" class="form-control mt-2" placeholder="Phone" required/>
                                                <label for="phone">Phone</label>
                                                <i class="phone-example">example: +63 900 000 0000</i>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="form-floating">
                                                <input type="email" id="email" name="email" class="form-control mt-2 mb-3" placeholder="Email" required/>
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" id="username" name="username" class="form-control mt-2 mb-3" placeholder="Username" required/>
                                                <label for="username">Username</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="password" id="password" name="password" class="form-control mt-2 mb-3" placeholder="Password" required/>
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn-submit mb-2">SUBMIT</button>
                                </div>
                            </form>
                        </div>
					</div> <!-- End of modal body-->
				</div> <!-- End of modal content-->
			</div>
		</div> <!-- End of Add Project Modal-->

        <!-- for Data Tables -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready (function() {
                $('table').DataTable();
            });
        </script>
@endsection
