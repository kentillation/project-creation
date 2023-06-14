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
    <link rel="icon" href="<?php echo asset('images/ehr_logo_v1.png') ?>" />
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
            <nav class="topnav">
                <div class="tab">
                    <div class="logo">
                        <a href="#">
                            <img src="<?php echo asset('images/ehr_logo_v1.png') ?>" />
                            <span style="font-size: 20px">&nbsp;Electronic Health Record System</span>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="nav-link" title="Account">
                            &nbsp; <i class="bi bi-person-circle"></i>
                        </a>
                    </div>
                </div>
                
            </nav>
        </header>
        <button class="sidenav-btn-toggle" title="SHOW MENU" onclick="sidenavBtn()">
            <i class="bi bi-list"></i>
        </button>
        <div class="sidenav" id="sidenav">
            <div class="sidenav-content">
                <div class="logo">
                    <img src="<?php echo asset('images/profile.jpg') ?>" width="80px" />
                </div>
                <hr>
                <h5 class="mb-3">Main</h5>
                <ul>
                    <li>
                        <a href="{{ route('admin-dashboard') }}" class="btn-sidenav" title="Dashboard">
                            <i class="bi bi-speedometer"></i>
                            <span>
                                &nbsp;Dashboard
                            </span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="{{ route('admin-list') }}" class="btn-sidenav" title="List of Users">
                            <i class="bi bi-people"></i>
                            <span>
                                &nbsp; Admin
                            </span>
                        </a>
                    </li> -->
                </ul>
                <hr>
                <h5 class="mb-3">Users</h5>
                <ul>
                    <li>
                        <a href="{{ route('student-list') }}" class="btn-sidenav" title="Student Nurses">
                            <i class="bi bi-mortarboard"></i>
                            <span>
                                &nbsp;Student Nurses
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('clinician-list') }}" class="btn-sidenav" title="Clinicians">
                            <i class="bi bi-thermometer-high"></i>
                            <span>
                                &nbsp;Clinicians
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('staff-list') }}" class="btn-sidenav" title="Dept. Staffs">
                            <i class="bi bi-pen"></i>
                            <span>
                                &nbsp;Dept. Staffs
                            </span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="{{ route('admin-list') }}" class="btn-sidenav" title="List of Users">
                            <i class="bi bi-people"></i>
                            <span>
                                &nbsp; Admin
                            </span>
                        </a>
                    </li> -->
                </ul>
                <hr>
                <h5 class="mb-3">Settings</h5>
                <ul>
                    <li>
                        <a href="#" class="btn-sidenav" title="Account">
                            <i class="bi bi-person-circle"></i>
                            <span>
                                &nbsp;Account
                            </span>
                        </a>
                    </li>
                </ul>
                <hr>
                <h6>Login as: Admin</h6>

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
