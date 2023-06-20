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
          <h3 class="p-3 d-flex text-center justify-content-center">Christian School Electronic Health Records System</h3>
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-row align-items-center justify-content-center">
              <div class="card p-3">
                <div class="card-body">
                  <div class="d-flex justify-content-center mb-2 p-3">
                    <img src="<?php echo asset('assets/img/ehr_logo_v2.png') ?>" width="70" alt="Logo"/>
                  </div>
                  <h6 class="text-secondary mb-3">Login as:</h6>
                  <a href="{{ route('student-login') }}">
                    <button class="btn-custom mb-2">Nursing Student</button>
                  </a>
                  <a href="{{ route('clinician-login') }}">
                      <button class="btn-custom mb-2">Clinician</button>
                  </a>
                  <a href="{{ route('staff-login') }}">
                      <button class="btn-custom mb-2">Department Staff</button>
                  </a>
                  <a href="{{ route('admin-login') }}">
                      <button class="btn-custom">Admin</button>
                  </a>
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