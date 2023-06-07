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
    <script src="<?php echo asset('main.js') ?>"></script>
</head>

<body>
    <main>
        <div class="login">
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="container logo-container">
                            <img src="<?php echo asset('images/login-img.svg') ?>" alt="Health Image"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 mb-5">
                        <div class="container login-container border rounded">
                            <div class="form-ni">
                                <a href="{{ route('student-login') }}">
                                    <button class="btn-submit mb-2">Nursing Student</button>
                                </a>
                                <a href="{{ route('clinician-login') }}">
                                    <button class="btn-submit mb-2">Clinician</button>
                                </a>
                                <a href="{{ route('educator-login') }}">
                                    <button class="btn-submit mb-2">Department Staff</button>
                                </a>
                                <a href="{{ route('admin-login') }}">
                                    <button class="btn-submit mb-2">Admin</button>
                                </a>
                            </div>
                            <p class="text-center mb-4">Don't have an account? <span><a href="#">Request
                                        here</a></span>.</p>
                            <div class="split mb-4">
                                <a href="#" class="ms-5">Forgot password?</a>
                                <a href="#" class="me-5">Help?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>