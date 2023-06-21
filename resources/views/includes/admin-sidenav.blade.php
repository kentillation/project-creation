<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Christian School Electronic Health Records System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="<?php echo asset ('assets/img/ehr_logo_v1.png') ?>" rel="icon">
  <link href="<?php echo asset ('assets/img/ehr_logo_v1.png') ?>" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="<?php echo asset ('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo asset ('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?php echo asset ('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?php echo asset ('assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
  <link href="<?php echo asset ('assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
  <link href="<?php echo asset ('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
  <link href="<?php echo asset ('assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?php echo asset ('assets/css/style.css') ?>" rel="stylesheet">
  <script src="<?php echo asset('saveAsExcel.js') ?>"></script>
  <!-- for Data Tables -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
</head>

<body onload="loaderFunction()">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn" title="Menu"></i>&nbsp;
      <a href="#" class="logo d-flex align-items-center">
        <img src="#" alt="">
        <span class="d-none d-lg-block">Christian School EHR</span>
      </a>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number"></span>
          </a><!-- End Notification Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Pending</h4>
                <p>You have a pending request</p>
                <p>30 min. ago</p>
              </div>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="notification-item">
              <i class="bi bi-bar-chart-steps text-primary"></i>
              <div>
                <h4>On-progress</h4>
                <p>You have on-progress request</p>
                <p>4 hrs. ago</p>
              </div>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Approved</h4>
                <p>You approved a request</p>
                <p>2 hrs. ago</p>
              </div>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Declined</h4>
                <p>You declined a request</p>
                <p>1 hr. ago</p>
              </div>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>
          </ul><!-- End Notification Dropdown Items -->
        </li><!-- End Notification Nav -->
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number"></span>
          </a><!-- End Messages Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="message-item">
              <a href="#">
                <img src="assets/img/message.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Toto</h4>
                  <p>T waay gid tada?</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="message-item">
              <a href="#">
                <img src="assets/img/message.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Antonio</h4>
                  <p>Ge meg ah</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="message-item">
              <a href="#">
                <img src="assets/img/message.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Tonyo</h4>
                  <p>Baskog part ah!</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>
          </ul><!-- End Messages Dropdown Items -->
        </li><!-- End Messages Nav -->
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo asset('assets/img/account-bg.png') ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">My account</span>
          </a><!-- End Profile Iamge Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kent Anthony C Engbino</h6>
              <span>Administrator</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin-profile') }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
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
            <a href="{{ route('a-declined-medical-records') }}">
              <i class="bi bi-exclamation-circle fs-6"></i><span>Declined Requests</span>
            </a>
          </li>
          <li>
            <a href="{{ route('a-approved-medical-records') }}">
              <i class="bi bi-check-circle fs-6"></i><span>Approved Requests</span>
            </a>
          </li>
        </ul>
      </li><!-- End Medical Records Request Nav -->

      <!-- Viewing Request Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#viewing-request-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-"></i><span>Viewing Record Requests</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="viewing-request-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-eye fs-6"></i><span>View All Requests</span>
            </a>
          </li>
        </ul>
      </li><!-- End Viewing Request Nav -->

      <li class="nav-heading">Users</li>

      <!-- Students Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#students-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-"></i><span>Nursing Students</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="students-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('student-list') }}">
              <i class="bi bi-people fs-6"></i><span>List of nursing students</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-plus-lg fs-6"></i><span>Add student user</span>
            </a>
          </li>
        </ul>
      </li><!-- End Students Nav -->

      <!-- Clinicians Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#clinicians-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-"></i><span>Clinicians</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="clinicians-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('clinician-list') }}">
              <i class="bi bi-people fs-6"></i><span>List of clinicians</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-plus-lg fs-6"></i><span>Add clinician user</span>
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
              <i class="bi bi-people fs-6"></i><span>List of department staff</span>
            </a>
          </li>
          <li>
            <a href="#">
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
            <a href="#">
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

  @yield('page-content')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
    </a>

  <!-- Vendor JS Files -->
  <script src="<?php echo asset ('assets/vendor/apexcharts/apexcharts.min.js') ?>"></script>
  <script src="<?php echo asset ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?php echo asset ('assets/vendor/chart.js/chart.umd.js') ?>"></script>
  <script src="<?php echo asset ('assets/vendor/echarts/echarts.min.js') ?>"></script>
  <script src="<?php echo asset ('assets/vendor/quill/quill.min.js') ?>"></script>
  <script src="<?php echo asset ('assets/vendor/simple-datatables/simple-datatables.js') ?>"></script>
  <script src="<?php echo asset ('assets/vendor/tinymce/tinymce.min.js') ?>"></script>
  <script src="<?php echo asset ('assets/vendor/php-email-form/validate.js') ?>"></script>
  <!-- Template Main JS File -->
  <script src="<?php echo asset ('assets/js/main.js') ?>"></script>

</body>

</html>