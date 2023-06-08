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

    <!-- Latest compiled and minified CSS4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <main>
        <br />
        <img src="<?php echo asset('images/ehr_logo_v2.png') ?>" class="print-logo-left">
        <img src="<?php echo asset('images/ehr_logo_v2.png') ?>" class="print-logo-right">
        
        <!-- Main -->
        <div>
            <!-- List of Users -->
            <div class="container">
                <center>
                    <br /><br />
                    <h6>Republic of the Philippines</h6>
                    <h6>Province of Negros Occidental</h6>
                    <h6>City of Bacolod</h6>
                    <br />
                    <h3>Office of the Christian School</h3>
                    <br /><br />
                    <h3><strong>List of Admin</strong></h3>
                </center>
                <br />
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tbl_admin as $admin)
                                <tr>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->username }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- <br /><br /><br /><br /><br /><br /><br /><br />

                <div class="prepared-by">
                    <h6>Prepared by:</h6>
                </div>

                <div class="approved-by">
                    <h6>Approved by:</h6>
                </div>

                <br /><br /><br />

                <div class="name-footer">
                    
                        <h6></h6>
                    
                </div>

                <div class="head-name">
                    <h6>name of head</h6>
                </div><br />

                <div class="incharge">
                    <h6>In-charge Personell</h6>
                </div>

                <div class="head-office">
                    <h6>Head of the Office</h6>
                </div> -->

            </div> <!-- End of List of Users -->
        </div> <!-- End of Main -->
    </main>
</body>
</html>
<script type="text/javascript">
//for Print
    function PrintPage() {
        window.print();
        }
        window.addEventListener('DOMContentLoaded', (event) => {
        PrintPage()
        setTimeout(function(){ window.close() },750)
    });
</script>