<!DOCTYPE html>
<html lang="en">
<head>
    <title>Electronic Health Records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset('bootstrap-icons/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?php echo asset('bootstrap/js/bootstrap.min.js') ?>" />
    <link rel="icon" href="<?php echo asset('images/logo1.png') ?>" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="<?php echo asset('main.js') ?>"></script>
    <script src="<?php echo asset('saveAsExcel.js') ?>"></script>

    <!-- for Data Tables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
</head>
<body onload="loaderFunction()">
    <main>
        <header>

        </header>
        <button class="sidenav-btn-toggle" title="SHOW MENU" onclick="sidenavBtn()">
            <i class="bi bi-list"></i>
        </button>
        <div class="sidenav" id="sidenav">
            <div class="sidenav-content">
                <div class="logo">
                    <img src="<?php echo asset('images/ehr_logo_v1.png') ?>" width="80px" />
                </div>
                <hr>
                <h5 class="mb-3">Users</h5>
                <ul>
                    <li>
                        <a href="{{ route('student-list') }}" class="btn-sidenav" title="Cancelled">
                            <i class="bi bi-mortarboard"></i>
                            <span>
                                &nbsp; List of Student Nurse
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('clinician-list') }}" class="btn-sidenav" title="Statistics">
                            <i class="bi bi-thermometer-high"></i>
                            <span>
                                &nbsp; List of Clinicians
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('staff-list') }}" class="btn-sidenav" title="Financial Summary">
                            <i class="bi bi-pen"></i>
                            <span>
                                &nbsp; List of Department Staff
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin-list') }}" class="btn-sidenav" title="List of Users">
                            <i class="bi bi-people"></i>
                            <span>
                                &nbsp; List of Admin
                            </span>
                        </a>
                    </li>
                </ul>
                <hr>
                
                <h5 class="mb-3">Request</h5>
                <ul>
                    <li>
                        <a href="#" class="btn-sidenav" title="Cancelled">
                            <i class="bi bi-exclamation-diamond"></i>
                            <span>
                                &nbsp; Pending
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="btn-sidenav" title="Statistics">
                            <i class="bi bi-patch-check"></i>
                            <span>
                                &nbsp; Approved
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="btn-sidenav" title="Financial Summary">
                            <i class="bi bi-x-octagon"></i>
                            <span>
                                &nbsp; Declined
                            </span>
                        </a>
                    </li>
                </ul>
                <hr>

                <h5 class="mb-3">Others:</h5>
                <ul>
                    <li>
                        <a href="{{ route('course-list') }}" class="btn-sidenav" title="Course">
                            <i class="bi bi-exclamation-diamond"></i>
                            <span>
                                &nbsp; Course
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('section-list') }}" class="btn-sidenav" title="Section">
                            <i class="bi bi-patch-check"></i>
                            <span>
                                &nbsp; Section
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('year-level-list') }}" class="btn-sidenav" title="Year Level">
                            <i class="bi bi-x-octagon"></i>
                            <span>
                                &nbsp; Year Level
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blood-type-list') }}" class="btn-sidenav" title="Blood Type">
                            <i class="bi bi-x-octagon"></i>
                            <span>
                                &nbsp; Blood type
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gender-list') }}" class="btn-sidenav" title="Gender">
                            <i class="bi bi-x-octagon"></i>
                            <span>
                                &nbsp; Gender
                            </span>
                        </a>
                    </li>
                </ul>
                <hr>

                <h5 class="mb-3">Settings</h5>
                <ul>
                    <li>
                        <a href="#" class="btn-sidenav" title="Account">
                            <i class="bi bi-person-circle"></i>
                            <span>
                                &nbsp; Account
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="btn-sidenav" title="About">
                            <i class="bi bi-info-circle"></i>
                            <span>
                                &nbsp; About
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="btn-sidenav" title="Help" data-bs-toggle="modal"
                            data-bs-target="#backupModal">
                            <i class="bi bi-question-circle"></i>
                            <span>
                                &nbsp; Help
                            </span>
                        </a>
                    </li>
                </ul>
                <hr>
                <h5 class="mb-3">Others:</h5>
                <ul>
                    <li>
                        <a href="{{ route('course-list') }}" class="btn-sidenav" title="Course">
                            <i class="bi bi-mortarboard"></i>
                            <span>
                                &nbsp; Course
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('section-list') }}" class="btn-sidenav" title="Section">
                            <i class="bi bi-layout-three-columns"></i>
                            <span>
                                &nbsp; Section
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('year-level-list') }}" class="btn-sidenav" title="Year Level">
                            <i class="bi bi-bar-chart-steps"></i>
                            <span>
                                &nbsp; Year Level
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blood-type-list') }}" class="btn-sidenav" title="Blood Type">
                            <i class="bi bi-droplet-half"></i>
                            <span>
                                &nbsp; Blood type
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gender-list') }}" class="btn-sidenav" title="Gender">
                            <i class="bi bi-gender-ambiguous"></i>
                            <span>
                                &nbsp; Gender
                            </span>
                        </a>
                    </li>
                </ul>
                <hr>
                <!-- <div class="row">
                    <div class="col-sm-2 col-xs-12">
                        <h6>ID:</h6>
                    </div>
                    <div class="col-sm-10 col-xs-12">
                        <h6>12345</h6>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-3 col-xs-12">
                        <h6>User:</h6>
                    </div>
                    <div class="col-sm-8 col-xs-12">
                        <h6>Kent Anthony</h6>
                    </div>
                </div> -->
                <div class=" mt-4">
                    <form action="{{ route('logout') }}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-signout" type="submit" title="SIGN OUT">
                            <i class="bi bi-box-arrow-left"></i>
                            <span>
                                &nbsp; SIGN OUT
                            </span>
                        </button>
                    </form>
                </div>
            </div>
            <button class="btn-sidenav-hide" onclick="sidenavHide()" title="HIDE">
                <i class="bi bi-chevron-double-left"></i>
            </button>
        </div> <!-- end of sidenav -->

        <div class="modal fade" id="addUserModal">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h5 class="modal-title">New User</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
                        <div class="container">
                            <form method="POST" action="{{ route('save-admin') }}">
                                @csrf
                                <div class="form-ni">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" id="name" name="name" class="form-control mt-2" placeholder="Name" required/>
                                                <label for="name">Name</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="email" id="email" name="email" class="form-control mt-2" placeholder="Email" required/>
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" id="username" name="username" class="form-control mt-2" placeholder="Username" required/>
                                                <label for="username">Username</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="password" id="password" name="password" class="form-control mt-2" placeholder="Password" required/>
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <select id="role" name="role_id" class="form-control mt-2 mb-3" placeholder="Role">
                                                    <option selected>-select-</option>

                                                </select>
                                                <label for="role">Role</label>
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


        @yield('page-content')
    </main>
</body>

</html>
