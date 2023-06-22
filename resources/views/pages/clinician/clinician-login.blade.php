<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Christian School Electronic Health Records System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo asset ('assets/img/ehr_logo_v2.png') ?>" rel="icon">
  <link href="<?php echo asset ('assets/img/ehr_logo_v2.png') ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

</head>

<body>
  <main>
    <div class="container">
      <section class="section starter min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <div class="container">
          <h3 class="mb-4 d-flex text-center justify-content-center">Christian School Electronic Health Records System</h3>
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-row align-items-center justify-content-center">
              <div class="card mb-2 p-3">
                <div class="card-body">
                    <a href="{{ route('index') }}" class="back-arrow" title="Back">
                        <i class="bi bi-arrow-left fs-5"></i>
                    </a>
                    <div class="d-flex justify-content-center mb-2 p-2">
                        <img src="<?php echo asset('images/ehr_logo_v2.png') ?>" width="70" alt="Logo"/>
                    </div>
                    <div class="container text-center">
                      <h4>School Nurse</h4>
                    </div>
                    @if(Session::has('error'))
                        <!-- <div class="alert alert-danger text-center" role="alert" id="alertbox"> -->
                        <div class="alert alert-danger text-center alert-dismissible fade show m-4" role="alert">
                            <i class="bi bi-exclamation-triangle"></i>&nbsp;
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" title="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('clinician-login') }}" method="post" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <div class="col-12">
                            <label for="yourUsername" class="form-label mt-2">Username</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend1">
                                    <i class="bi bi-file-person"></i>
                                </span>
                                <input type="text" name="username" class="form-control" id="yourUsername" required>
                                <div class="invalid-feedback">Enter your username.</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Password</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend2">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control" id="yourPassword" required>
                                <div class="invalid-feedback">Enter your password.</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn-custom w-100 mt-2" type="submit">Login</button>
                        </div>
                        <div class="col-12">
                            <p class="small mb-0"><a href="#" data-bs-toggle="modal" data-bs-target="#forgotModal">Forgot password?</a></p>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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