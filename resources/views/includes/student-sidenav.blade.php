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
              <span>Nursing Student</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('student-profile') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('student-account-settings') }}">
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
            <a class="nav-link collapsed" href="{{ route('student-dashboard') }}">
            <i class="bi bi-speedometer"></i>
            <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#medical-records" data-bs-toggle="collapse" href="#">
            <i class="bi bi-filter-square"></i><span>Medical Records</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="medical-records" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('add-medical-record') }}">
                <i class="bi bi-plus-lg fs-6"></i><span>Add Record</span>
                </a>
            </li>
            <li>
                <a href="{{ route('view-medical-records') }}">
                <i class="bi bi-search fs-6"></i><span>View Medical Records</span>
                </a>
            </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#appointment" data-bs-toggle="collapse" href="#">
            <i class="bi bi-calendar-event"></i><span>Lab Test Appointments</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="appointment" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li> 
                <a href="{{ route('pending-appointments') }}">
                    <i class="bi bi-calendar-minus fs-6"></i><span>Pending Appointments</span>
                </a>
            </li>
            <li>
                <a href="{{ route('approved-appointments') }}">
                    <i class="bi bi-calendar2-check fs-6"></i><span>Approved Appointments</span>
                </a>
            </li>
            </ul>
        </li>

        <li class="nav-heading">Settings</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('student-profile') }}">
            <i class="bi bi-person"></i>
            <span>Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('student-account-settings') }}">
            <i class="bi bi-gear"></i>
            <span>Account</span>
            </a>
        </li>

        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn nav-link collapsed" type="submit">
                <i class="bi bi-box-arrow-left"></i>
                <span>Sign out</span>
            </button>
            </form>
        </li>
    </ul>
  </aside>

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