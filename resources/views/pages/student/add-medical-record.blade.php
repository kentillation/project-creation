@extends('includes/student-sidenav')

@section('page-content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Add Medical Record</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Medical Record</li>
          <li class="breadcrumb-item active">Add Medical Record</li>
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
                    <form method="POST" action="{{ route('save-medical-record') }}">
                      @csrf
                      <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6" style="display: none;">
                            <label for="student_id">Student ID</label>
                            <input type='text' name='student_id' id="student_id" value="{{ $student[0]['id'] }}" class="form-control mb-3" readonly/>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="first_name">First Name</label>
                            <input type='text' name='first_name' id="first_name" value="{{ $student[0]['first_name'] }}" class="form-control mb-3 readonly" readonly />
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="middle_name">Middle Name</label>
                            <input type='text' name='middle_name' id="middle_name" value="{{ $student[0]['middle_name'] }}" class="form-control mb-3 readonly" readonly />
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="last_name">Last Name</label>
                            <input type='text' name='last_name' id="last_name" value="{{ $student[0]['last_name'] }}" class="form-control mb-3 readonly" readonly />
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="street_address">Street Address / Street Number</label>
                            <input type='text' name='street_address' id="street_address" value="" class="form-control mb-3" required />
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="barangay">Barangay</label>
                            <input type='text' name='barangay' id="barangay" value="" class="form-control mb-3" required />
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="muni_city">Municipality / City</label>
                            <input type='text' name='muni_city' id="muni_city" value="" class="form-control mb-3" required />
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type='date' name='date_of_birth' id="date_of_birth" value="" class="form-control mb-3" required />
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="age">Age</label>
                            <input type='number' name='age' id="age" value="" class="form-control mb-3" required />
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="phone">Phone</label>
                            <input type='number' name='phone' id="phone" value="{{ $student[0]['phone'] }}" class="form-control mb-3 readonly" readonly />
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="civil_status">Civil Status</label>
                            <input type='text' name='civil_status' id="civil_status" value="" class="form-control mb-3" required />
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="citizenship">Citizenship</label>
                            <input type='text' name='citizenship' id="citizenship" value="" class="form-control mb-3" required />
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="height">Height</label>
                            <input type='text' name='height' id="height" value="" class="form-control mb-3" required />
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="weight">Weight</label>
                            <input type='text' name='weight' id="weight" value="" class="form-control mb-3" required />
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="bmi">BMI</label>
                            <input type='text' name='bmi' id="bmi" value="" class="form-control mb-3" required />
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                          <label for="year_level">Year Level</label>
                          <select id="year_level" name="year_level" class="form-control mb-3">
                            <option value="0">-select-</option>
                            <option value="1">1st year</option>
                            <option value="2">2nd year</option>
                            <option value="3">3rd year</option>
                            <option value="4">4th year</option>
                          </select>                                
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                          <label for="section">Section</label>
                          <select id="section" name="section" class="form-control mb-3">
                            <option value="0">-select-</option>
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                          </select>                                
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                          <label for="gender">Gender</label>
                          <select id="gender" name="gender" class="form-control mb-3">
                            <option value="0">-select-</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                          </select>                                
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                          <label for="blood_type">Blood Type</label>
                          <select id="blood_type" name="blood_type" class="form-control mb-3">
                            <option value="0">-select-</option>
                            <option value="1">A+</option>
                            <option value="2">A-</option>
                            <option value="3">B+</option>
                            <option value="4">B-</option>
                            <option value="5">AB+</option>
                            <option value="6">AB-</option>
                            <option value="7">O+</option>
                            <option value="8">O-</option>
                          </select>                                
                        </div>
                      </div>
                      
                      <div class="d-flex justify-content-end">
                        <a href="#!" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#doyouModal" id="nextBtn">
                            Next &nbsp;<i class="bi bi-arrow-right"></i>
                        </a>
                      </div>

                      <!-- Modal-->
                      <div class="modal fade" id="doyouModal">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                          <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h5 class="modal-title">Confirmation</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                              <div class="container mt-3 mb-3">
                                <div class="text-center">
                                  <p class="mb-3">Do you have any medical history?</p>
                                </div>
                              </div>
                            </div> <!-- End of modal body-->
                            <!-- Modal Footer-->
                            <div class="modal-footer">
                                <a href="{{ route('add-medical-history') }}" class="btn mb-2">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yes</button>
                                </a>
                                <button type="submit" class="btn btn-primary">No, send my request</button>
                            </div>
                          </div> <!-- End of modal content-->
                        </div>
                      </div> <!-- End of Modal-->
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">

            <div class="card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
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

  </main><!-- End #main -->
@endsection