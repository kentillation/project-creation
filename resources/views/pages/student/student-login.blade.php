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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
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
                            <form action="{{ route('student-login') }}" method="post">
                                @csrf
                                <div class="form-ni">
                                    @if(Session::has('error'))
                                        <div class="alert alert-danger text-center" role="alert" id="alertbox">
                                            {{ Session::get('error') }}
                                            <button class="btn-close" onclick="closeFn()"></button>
                                        </div>
                                    @endif
                                    <div class="form-floating">
                                        <input type="text" name="student_id" id="student_id" class="form-control mt-3"
                                            placeholder="Student ID" required />
                                        <label for="Student ID">Student ID</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" name="password" class="form-control mt-3 mb-3"
                                            placeholder="Password" required />
                                        <label for="password">Password</label>
                                    </div>
                                    <button class="btn-submit mb-2" type="submit">SUBMIT</button>
                                </div>
                            </form>
                            <p class="text-center mb-4">Don't have an account? 
                                <span>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#requestModall">
                                        Request here
                                    </a>
                                </span>.
                            </p>
                            <div class="split mb-4">
                                <a href="#" class="ms-5">Forgot password?</a>
                                <a href="#" class="me-5">Help?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="requestModal">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h5 class="modal-title">Request Account</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
                        <div class="container">
                            <form method="POST" action="#">
                                @csrf
                                <div class="form-ni">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" id="student_id" name="student_id" class="form-control mt-2" placeholder="Student ID" required/>
                                                <label for="student_id">Student ID</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" id="name" name="name" class="form-control mt-2 mb-3" placeholder="Full Name" required/>
                                                <label for="name">Full Name</label>
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

    </main>
</body>

</html>