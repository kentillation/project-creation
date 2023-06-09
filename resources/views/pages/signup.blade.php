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
                            <img src="<?php echo asset('images/ehr_logo_v2.png') ?>" alt="Health Image"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 mb-5">
                        <div class="container login-container border rounded mt-5">

                            <a href="{{ route('index') }}" class="back-arrow" title="BACK">
                                <i class="bi bi-arrow-left"></i>
                            </a>

                            <h2 class="text-center mt-4 mb-3">Christian School Electronic Health Record</h2>
                            <form method="POST" action="{{ route('save-admin') }}">
                                @csrf
                                <div class="form-ni">
                                    @if(Session::has('success'))
                                        <div class="alert alert-success text-center" role="alert" id="alertbox">
                                            {{ Session::get('success') }}
                                            <button class="btn-close" onclick="closeFn()"></button>
                                        </div>
                                    @endif
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
                                                <input type="password" id="password" name="password" class="form-control mt-2 mb-3" placeholder="Password" required/>
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <button type="submit" class="btn-submit mb-2">CREATE</button> -->
                                    <button class="btn-submit mb-2">CREATE</button>
                                </div>
                            </form>
                            <p class="text-center mb-4">Have already an account? <span><a href="{{ route('index') }}">Sign-in
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