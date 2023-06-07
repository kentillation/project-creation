@extends('includes/admin-sidenav')

@section('page-content')
        <div id="loader"></div>
        <div id="forLoader" style="display:none;">
            <div class="container mt-5 mb-5">
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
                <div class="container border rounded p-5 reports">
                    <h1 class="heading1 text-center mb-5"><strong>List of Year Level</strong></h1>
                    <div class="tbl-top-btns mb-4">
                        <div class="btn-dl me-2">
                            <button class="btn-add-user" type="button" title="ADD USER" data-bs-toggle="modal" data-bs-target="#addModal">
                                <i class="bi bi-plus-lg">&nbsp;</i>
                                ADD
                            </button>
                        </div>
                    </div>
                    <div class="container mb-4">
                        <div class="table-responsive">
                            <table class="table table-hover text-center" id="table">
                                <thead class="text-bg-secondary">
                                    <tr>
                                        <th>Year Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tbl_year_level as $year_level )
                                        <tr>
                                            <td>{{ $year_level ->year_level }}</td>
                                            <td>
                                                <a href="{{ route('update-year-level', ['id' => $year_level ->id] ) }}">
                                                    <button class="btn-view btn-sm" title="MODIFY">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('delete-year-level', ['id' => $year_level ->id] ) }}">
                                                    <button class="btn-restricted btn-sm" title="DELETE">
                                                        <i class="bi bi-trash"></i>
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
        <div class="modal fade" id="addModal">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h5 class="modal-title">New Year Level</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
                        <div class="container">
                            <form method="POST" action="{{ route('save-year-level') }}">
                                @csrf
                                <div class="form-ni">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" id="year_level" name="year_level" class="form-control mt-2" placeholder="Year Level" required/>
                                                <label for="course">Year Level</label>
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
