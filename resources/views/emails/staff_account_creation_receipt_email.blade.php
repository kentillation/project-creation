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
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex flex-column justify-content-start pt-4 pb-2">
                        <!-- <img src="<?php echo asset('assets/img/ehr_logo_v2.png') ?>" width="70" alt="Logo"/> -->
                        <p>Good day! <br /><br />
                        You just created a new account for Department Staff.<br /><br />
                        Username: {{ $username }}<br />
                        Email: {{ $email }}<br />
                        Password: {{ $password }}<br />
                        <br />
                        <p>Want to add another user? Click/tap the button bellow to start.</p>
                        <span>
                            <a href="https://ehr-team-1-app.fly.dev/">
                            <button style="border: none; border-radius: 5px; background-color: #005c81; color: white; padding: 8px; font-size: 14px;">
                                Login now! &nbsp; <i class="bi bi-arrow-right"></i>
                            </button>
                            </a>
                        </span><br /><br />
                        <i>Note:</i>Please make sure that you will consider this as confidential and private. Thank you!
                        </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

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