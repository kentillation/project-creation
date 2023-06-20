@extends('includes/student-sidenav')

@section('page-content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>View Record</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Medical Record</li>
                <li class="breadcrumb-item">View Medical Records</li>
                <li class="breadcrumb-item active">View Record</li>
            </ol>
        </nav>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success text-center alert-dismissible fade show" role="alert" id="alertbox">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(Session::has('removal'))
    <div class="alert alert-danger text-center alert-dismissible fade show" role="alert" id="alertbox">
        {{ Session::get('removal') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <section class="section dashboard">
        <div class="row">

            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body m-2">
                                <h5 class="card-title">Head Title</h5>
                                <div class="row">

                                    <div class="col-6">
                                        <div class="medical-record">
                                            <ul>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6>Full name</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6>{{ $student_record[0]['first_name'] }} {{
                                                                $student_record[0]['middle_name'] }} {{
                                                                $student_record[0]['last_name'] }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <hr />
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6>Age:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6>{{ $student_record[0]['age'] }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <hr />
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6>Date of birth:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6>{{ $student_record[0]['date_of_birth'] }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <hr />
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6>Phone:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6>{{ $student_record[0]['phone'] }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <hr />
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6>Address:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6>{{ $student_record[0]['street_address'] }} {{
                                                                $student_record[0]['barangay'] }}, {{
                                                                $student_record[0]['muni_city'] }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <hr />
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6>Civil Status:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6>{{ $student_record[0]['civil_status'] }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <hr />
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6>Citizenship:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6>{{ $student_record[0]['citizenship'] }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <hr />
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6>Height:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6>{{ $student_record[0]['height'] }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <hr />
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6>Weight:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6>{{ $student_record[0]['weight'] }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <hr />
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6>BMI:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6>{{ $student_record[0]['bmi'] }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <hr />
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6>Gender:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6>{{ $student_record[0]['gender_id'] }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <hr />
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6>Blood type:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6>{{ $student_record[0]['blood_type_id'] }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <hr />
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <p>Medical History</p>
                                        <div class="medical-record">
                                            @foreach ($medical_history as $med_history)
                                            <ul>
                                                <li>
                                                    <h6><strong>Checked conditions that apply to you or any of your
                                                            close family members:</strong></h6>
                                                    <h6>
                                                        <?php foreach(json_decode($med_history->condition_option) as $value) {
                                                    if($value != 'other'){
                                                        echo "$value, ";
                                                    }
                                                }?>{{ $med_history->other_condition_option }}
                                                    </h6>
                                                </li>
                                                <hr />
                                                <li>
                                                    <h6><strong>Checked symptoms that you're currently
                                                            experiencing:</strong></h6>
                                                    <h6>sample text</h6>
                                                </li>
                                                <hr />
                                                <li>
                                                    <h6><strong>Currently taking any medication?</strong></h6>
                                                    <h6>sample text</h6>
                                                </li>
                                                <hr />
                                                <li>
                                                    <h6><strong>Do you have any medication allergies?</strong></h6>
                                                    <h6>sample text</h6>
                                                </li>
                                                <hr />
                                                <li>
                                                    <h6><strong>Do you use or do you have history of using
                                                            tobacco?</strong></h6>
                                                    <h6>sample text</h6>
                                                </li>
                                                <hr />
                                                <li>
                                                    <h6><strong>Do you use or do you have history of using illegal
                                                            drugs?</strong></h6>
                                                    <h6>sample text</h6>
                                                </li>
                                                <hr />
                                                <li>
                                                    <h6><strong>How often do you consume alcohol?</strong></h6>
                                                    <h6>sample text</h6>
                                                </li>
                                            </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">

                <div class="card">
                    <div class="card-body pb-4">
                        <h5 class="card-title">Activity Logs</h5>
                        <div class="news">
                            <div class="post-item clearfix">
                                <img src="<?php echo asset('assets/img/news-5.jpg') ?>" alt="">
                                <h4><a href="#">Title</a></h4>
                                <p>This is just a sample paragraph</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="<?php echo asset('assets/img/news-5.jpg') ?>" alt="">
                                <h4><a href="#">Title</a></h4>
                                <p>This is just a sample paragraph</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="<?php echo asset('assets/img/news-5.jpg') ?>" alt="">
                                <h4><a href="#">Title</a></h4>
                                <p>This is just a sample paragraph</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="<?php echo asset('assets/img/news-5.jpg') ?>" alt="">
                                <h4><a href="#">Title</a></h4>
                                <p>This is just a sample paragraph</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="<?php echo asset('assets/img/news-5.jpg') ?>" alt="">
                                <h4><a href="#">Title</a></h4>
                                <p>This is just a sample paragraph</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="<?php echo asset('assets/img/news-5.jpg') ?>" alt="">
                                <h4><a href="#">Title</a></h4>
                                <p>This is just a sample paragraph</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- for Data Tables -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('table').DataTable();
        });
    </script>

</main><!-- End #main -->
@endsection