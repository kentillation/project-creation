<!DOCTYPE html>
<html lang="en">

<head>
    <title>Electronic Health Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>" />
    <link rel="stylesheet" href="<?php echo asset('bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo asset('bootstrap-icons/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?php echo asset('bootstrap/js/bootstrap.min.js') ?>" />
    <link rel="icon" href="<?php echo asset('images/ehr_logo_v2.png') ?>" />
    <script src="<?php echo asset('main.js') ?>"></script>
</head>

<body>
    <main>
        <div class="login">
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="container logo-container">
                            <img src="<?php echo asset('images/ehr_logo_v2.png') ?>" alt="Health Image"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 mb-5">
                        <div class="container login-container border rounded mt-5">
                            <h2 class="text-center mt-5 mb-3">Christian School Electronic Health Record</h2>
                            <div class="form-ni">
                                <a href="{{ route('student-login') }}">
                                    <button class="btn-submit mb-2">Nursing Student</button>
                                </a>
                                <a href="{{ route('clinician-login') }}">
                                    <button class="btn-submit mb-2">Clinician</button>
                                </a>
                                <a href="{{ route('staff-login') }}">
                                    <button class="btn-submit mb-2">Department Staff</button>
                                </a>
                                <a href="{{ route('admin-login') }}">
                                    <button class="btn-submit mb-2">Admin</button>
                                </a>
                            </div>
                            <div class="split mb-4">
                                <a href="#" class="ms-5"></a>
                                <a href="#" class="me-5">Need help?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>