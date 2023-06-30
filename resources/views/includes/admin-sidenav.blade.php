<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Christian School Electronic Health Records System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="<?php echo asset('assets/img/ehr_logo_v1.png') ?>" rel="icon">
  <link href="<?php echo asset('assets/img/ehr_logo_v1.png') ?>" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="<?php echo asset('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?php echo asset('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?php echo asset('assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
  <link href="<?php echo asset('assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
  <link href="<?php echo asset('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
  <link href="<?php echo asset('assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?php echo asset('assets/css/style.css') ?>" rel="stylesheet">
  <script src="<?php echo asset('saveAsExcel.js') ?>"></script>
  <!-- for Data Tables -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
</head>

<body onload="loaderFunction()">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn" title="Menu"></i>&nbsp; &nbsp;
      <a href="#" class="logo d-flex align-items-center">
        <img src="<?php echo asset('assets/img/ehr_logo_v2.png') ?>" alt="Christian School Logo">
        <span class="d-none d-lg-block">Christian School</span>
      </a>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/profile-folder/{{ Session::get('image') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Account</span>
          </a><!-- End Profile Iamge Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Session::get('first_name') }} {{ Session::get('middle_name') }} {{ Session::get('last_name') }}</h6>
              <span>Administrator</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin-profile') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin-account-settings') }}">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="dropdown-item d-flex align-items-center btn btn-sm" type="submit">
                  <i class="bi bi-box-arrow-left"></i>
                  <span>Sign out</span>
                </button>
              </form>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-heading">Main</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin-dashboard') }}">
          <i class="bi bi-speedometer"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Students Area</li>

      <!-- Medical Records Request Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#med-records-request-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-"></i><span>Medical Record Requests</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="med-records-request-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('a-pending-medical-records') }}">
              <i class="bi bi-clock-history fs-6"></i><span>Pending Requests</span>
            </a>
          </li>
          <li>
            <a href="{{ route('a-approved-medical-records') }}">
              <i class="bi bi-check-circle fs-6"></i><span>Approved Requests</span>
            </a>
          </li>
          <li>
            <a href="{{ route('a-all-medical-records') }}">
              <i class="bi bi-card-list fs-6"></i><span>All Medical Requests</span>
            </a>
          </li>
        </ul>
      </li><!-- End Medical Records Request Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#appointment" data-bs-toggle="collapse" href="#">
          <i class="bi bi-"></i><span>Lab Test Appointments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="appointment" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin-pending-appointments') }}">
              <i class="bi bi-calendar-minus fs-6"></i><span>Pending Appointment</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin-approved-appointments') }}">
              <i class="bi bi-calendar2-check fs-6"></i><span>Approved Appointment</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-heading">Users</li>

      <!-- Students Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#students-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-"></i><span>Student Nurses</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="students-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('student-list') }}">
              <i class="bi bi-people fs-6"></i><span>List of student nurses</span>
            </a>
          </li>
          <li>
            <a href="add-student-user" data-bs-toggle="modal" data-bs-target="#addStudentUserModal">
              <i class="bi bi-plus-lg fs-6"></i><span>Add student nurse user</span>
            </a>
          </li>
        </ul>
      </li><!-- End Students Nav -->

      <!-- Clinicians Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#clinicians-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-"></i><span>School Nurse</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="clinicians-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('clinician-list') }}">
              <i class="bi bi-people fs-6"></i><span>List of school nurse</span>
            </a>
          </li>
          <li>
            <a href="add-clinic-nurse-user" data-bs-toggle="modal" data-bs-target="#addClinicianUserModal">
              <i class="bi bi-plus-lg fs-6"></i><span>Add school nurse user</span>
            </a>
          </li>
        </ul>
      </li><!-- End Clinicians Nav -->

      <!-- Department Staff Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#staff-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-"></i><span>Department Staffs</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="staff-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('staff-list') }}">
              <i class="bi bi-people fs-6"></i><span>List of dept. staff</span>
            </a>
          </li>
          <li>
            <a href="add-dept-staff-user" data-bs-toggle="modal" data-bs-target="#addStaffUserModal">
              <i class="bi bi-plus-lg fs-6"></i><span>Add dept. staff user</span>
            </a>
          </li>
        </ul>
      </li><!-- End Department Staff Nav -->

      <!-- Admin Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#admin-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-"></i><span>System Admins</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="admin-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admin-list') }}">
              <i class="bi bi-people fs-6"></i><span>List of system admins</span>
            </a>
          </li>
          <li>
            <a href="add-system-admin-user" data-bs-toggle="modal" data-bs-target="#addAdminUserModal">
              <i class="bi bi-plus-lg fs-6"></i><span>Add system admin user</span>
            </a>
          </li>
        </ul>
      </li><!-- End Admin Nav -->

      <li class="nav-heading">Settings</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin-profile') }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin-account-settings') }}">
          <i class="bi bi-gear"></i>
          <span>Account</span>
        </a>
      </li><!-- End Account Nav -->

      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn nav-link collapsed" type="submit">
            <i class="bi bi-box-arrow-left"></i>
            <span>Sign out</span>
          </button>
        </form>
      </li><!-- End Login Page Nav -->
    </ul>
  </aside><!-- End Sidebar-->

  <!-- Add Student User Modal -->
  <div class="modal fade" id="addStudentUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New Student Nurse User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form action="{{ route('save-student') }}" method="post" class="row g-3 needs-validation" novalidate>
            @csrf

            <div class="col-12" style="display: none;">
              <label for="admin_email" class="form-label mt-2">System Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-lock"></i>
                </span>
                <input type="email" name="admin_email" id="admin_email" class="form-control" value="christianschool.main@gmail.com" required>
                <div class="invalid-feedback">Enter your admin email.</div>
              </div>
            </div>

            <div class="col-12">
              <label for="student_id" class="form-label mt-2">Student ID</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-file-person"></i>
                </span>
                <input type="text" name="student_id" id="student_id" class="form-control" required>
                <div class="invalid-feedback">Empty student id.</div>
              </div>
            </div>

            <!-- <div class="col-6">
              <label for="first_name" class="form-label mt-2">First Name</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-file-person"></i>
                </span>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
                <div class="invalid-feedback">Empty first name.</div>
              </div>
            </div>

            <div class="col-6">
              <label for="middle_name" class="form-label mt-2">Middle Name</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-file-person"></i>
                </span>
                <input type="text" name="middle_name" id="middle_name" class="form-control" required>
                <div class="invalid-feedback">Empty middle name.</div>
              </div>
            </div>

            <div class="col-6">
              <label for="last_name" class="form-label mt-2">Last Name</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-file-person"></i>
                </span>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
                <div class="invalid-feedback">Empty last name.</div>
              </div>
            </div>

            <div class="col-6">
              <label for="phone" class="form-label mt-2">Phone number</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-telephone"></i>
                </span>
                <input type="text" name="phone" id="phone" class="form-control" required>
                <div class="invalid-feedback">Empty phone number.</div>
              </div>
            </div> -->

            <div class="col-12">
              <label for="yourEmail" class="form-label mt-2">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-at"></i>
                </span>
                <input type="email" name="email" class="form-control" required>
                <div class="invalid-feedback">Empty email.</div>
              </div>
            </div>

            <div class="col-12">
              <label for="yourPassword" class="form-label mt-2">Password</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-lock"></i>
                </span>
                <input type="password" name="password" class="form-control" required>
                <div class="invalid-feedback">Empty password.</div>
              </div>
            </div>

            <div class="col-12">
              <button class="btn btn-outline-success w-100 mt-2" type="submit">Create account</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Clinician User Modal -->
  <div class="modal fade" id="addClinicianUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createUserModalLabel">New School Nurse User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form action="{{ route('save-clinician') }}" method="post" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-12" style="display: none;">
              <label for="admin_email" class="form-label mt-2">System Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-lock"></i>
                </span>
                <input type="email" name="admin_email" id="admin_email" class="form-control" value="christianschool.main@gmail.com" required>
                <div class="invalid-feedback">Enter your admin email.</div>
              </div>
            </div>
            <div class="col-12">
              <label for="yourEmail" class="form-label mt-2">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend1">
                  <i class="bi bi-at"></i>
                </span>
                <input type="email" name="email" class="form-control" id="yourEmail" required>
                <div class="invalid-feedback">Enter your email.</div>
              </div>
            </div>
            <div class="col-12">
              <label for="yourUsername" class="form-label mt-2">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend2">
                  <i class="bi bi-file-person"></i>
                </span>
                <input type="text" name="username" class="form-control" id="yourUsername" required>
                <div class="invalid-feedback">Enter your username.</div>
              </div>
            </div>
            <div class="col-12">
              <label for="yourPassword" class="form-label">Password</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend3">
                  <i class="bi bi-lock"></i>
                </span>
                <input type="password" name="password" class="form-control" id="yourPassword" required>
                <div class="invalid-feedback">Enter your password.</div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-outline-success w-100 mt-2" type="submit">Create account</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Dept. Staff User Modal -->
  <div class="modal fade" id="addStaffUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New Department Staff User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form action="{{ route('save-staff') }}" method="post" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-12" style="display: none;">
              <label for="admin_email" class="form-label mt-2">System Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-lock"></i>
                </span>
                <input type="email" name="admin_email" id="admin_email" class="form-control" value="christianschool.main@gmail.com" required>
                <div class="invalid-feedback">Enter your admin email.</div>
              </div>
            </div>
            <div class="col-12">
              <label for="yourEmail" class="form-label mt-2">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-at"></i>
                </span>
                <input type="email" name="email" class="form-control" required>
                <div class="invalid-feedback">Enter your email.</div>
              </div>
            </div>
            <div class="col-12">
              <label for="username" class="form-label mt-2">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-file-person"></i>
                </span>
                <input type="text" name="username" id="username" class="form-control" required>
                <div class="invalid-feedback">Enter your user.</div>
              </div>
            </div>
            <div class="col-12">
              <label for="yourPassword" class="form-label mt-2">Password</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-lock"></i>
                </span>
                <input type="password" name="password" class="form-control" required>
                <div class="invalid-feedback">Enter your password.</div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-outline-success w-100 mt-2" type="submit">Create account</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Add System Admin Modal -->
  <div class="modal fade" id="addAdminUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New System Admin User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form action="{{ route('save-admin') }}" method="post" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-12" style="display: none;">
              <label for="admin_email" class="form-label mt-2">System Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-lock"></i>
                </span>
                <input type="email" name="admin_email" id="admin_email" class="form-control" value="christianschool.main@gmail.com" required>
                <div class="invalid-feedback">Enter your admin email.</div>
              </div>
            </div>
            <div class="col-12">
              <label for="yourEmail" class="form-label mt-2">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-at"></i>
                </span>
                <input type="email" name="email" class="form-control" required>
                <div class="invalid-feedback">Enter your email.</div>
              </div>
            </div>
            <div class="col-12">
              <label for="username" class="form-label mt-2">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-file-person"></i>
                </span>
                <input type="text" name="username" id="username" class="form-control" required>
                <div class="invalid-feedback">Enter your user.</div>
              </div>
            </div>
            <div class="col-12">
              <label for="yourPassword" class="form-label mt-2">Password</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-lock"></i>
                </span>
                <input type="password" name="password" class="form-control" required>
                <div class="invalid-feedback">Enter your password.</div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-outline-success w-100 mt-2" type="submit">Create account</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  @yield('page-content')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="<?php echo asset('assets/vendor/apexcharts/apexcharts.min.js') ?>"></script>
  <script src="<?php echo asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?php echo asset('assets/vendor/chart.js/chart.umd.js') ?>"></script>
  <script src="<?php echo asset('assets/vendor/echarts/echarts.min.js') ?>"></script>
  <script src="<?php echo asset('assets/vendor/quill/quill.min.js') ?>"></script>
  <script src="<?php echo asset('assets/vendor/simple-datatables/simple-datatables.js') ?>"></script>
  <script src="<?php echo asset('assets/vendor/tinymce/tinymce.min.js') ?>"></script>
  <script src="<?php echo asset('assets/vendor/php-email-form/validate.js') ?>"></script>
  <!-- Template Main JS File -->
  <script src="<?php echo asset('assets/js/main.js') ?>"></script>

</body>

</html>