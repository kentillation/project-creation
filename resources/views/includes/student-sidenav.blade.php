<!DOCTYPE html>
<html lang="en">
<head>
    <title>Electronic Health Records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset('bootstrap-icons/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?php echo asset('bootstrap/js/bootstrap.min.js') ?>" />
    <link rel="icon" href="<?php echo asset('images/logo1.png') ?>" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="<?php echo asset('main.js') ?>"></script>
    <script src="<?php echo asset('saveAsExcel.js') ?>"></script>

    <!-- for Data Tables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
</head>
<body onload="loaderFunction()">
    <main>
        <header>
            <nav class="topnav">
                <div class="tab">
                    <div class="logo">
                        <a href="#">
                            <img src="<?php echo asset('images/ehr_logo_v1.png') ?>" />
                        </a>
                    </div>
                    <div>
                        <a href="#" class="nav-link" title="Account">
                            &nbsp; <i class="bi bi-person-circle"></i>
                        </a>
                    </div>
                </div>
                
            </nav>
        </header>
        <button class="sidenav-btn-toggle" title="SHOW MENU" onclick="sidenavBtn()">
            <i class="bi bi-list"></i>
        </button>
        <div class="sidenav" id="sidenav">
            <div class="sidenav-content">
                <div class="logo">
                    <img src="<?php echo asset('images/profile.jpg') ?>" width="80px" />
                </div>
                <hr>
                <ul>
                    <li>
                        <a href="{{ route('student-dashboard') }}" class="btn-sidenav" title="Account">
                            <i class="bi bi-house"></i>
                            <span>
                                &nbsp; Home
                            </span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class=" mt-4">
                    <form action="{{ route('staff-logout') }}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-signout" type="submit" title="SIGN OUT">
                            <i class="bi bi-box-arrow-left"></i>
                            <span>
                                &nbsp; SIGN OUT
                            </span>
                        </button>
                    </form>
                </div>
            </div>
            <button class="btn-sidenav-hide" onclick="sidenavHide()" title="HIDE">
                <i class="bi bi-chevron-double-left"></i>
            </button>
        </div> <!-- end of sidenav -->

        @yield('page-content')
    </main>
</body>

</html>
