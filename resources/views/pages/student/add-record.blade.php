@extends('includes/student-sidenav')

@section('page-content')
        <div id="loader"></div>
        <div id="forLoader" style="display:none;">
            <div class="container mb-5 add-med-rec">
                <div class="container">
                    <div class="mb-5">
                        <a href="{{ route('student-dashboard') }}" class="back-arrow" title="BACK">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('save-medical-record') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6" style="">
                                <label for="student_id">Student ID</label>
                                <input type='text' name='student_id' id="student_id" value="" class="form-control mb-3" required />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="first_name">First Name</label>
                                <input type='text' name='first_name' id="first_name" class="form-control mb-3" required />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="middle_name">Middle Name</label>
                                <input type='text' name='middle_name' id="middle_name" class="form-control mb-3" required />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="last_name">Last Name</label>
                                <input type='text' name='last_name' id="last_name" class="form-control mb-3" required />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="street_address">Street Address / Street Number</label>
                                <input type='text' name='street_address' id="street_address" class="form-control mb-3" required />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="barangay">Barangay</label>
                                <input type='text' name='barangay' id="barangay" class="form-control mb-3" required />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="muni_city">Municipality / City</label>
                                <input type='text' name='muni_city' id="muni_city" class="form-control mb-3" required />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type='date' name='date_of_birth' id="date_of_birth" class="form-control mb-3" required />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="age">Age</label>
                                <input type='number' name='age' id="age" class="form-control mb-3 readonly" readonly />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="phone">Phone</label>
                                <input type='number' name='phone' id="phone" class="form-control mb-3" required />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="civil_status">Civil Status</label>
                                <input type='text' name='civil_status' id="civil_status" class="form-control mb-3" required />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="citizenship">Citizenship</label>
                                <input type='text' name='citizenship' id="citizenship" class="form-control mb-3" required />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="height">Height</label>
                                <input type='text' name='height' id="height" class="form-control mb-3" required />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="weight">Weight</label>
                                <input type='text' name='weight' id="weight" class="form-control mb-3" required />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="bmi">BMI</label>
                                <input type='text' name='bmi' id="bmi" class="form-control mb-3 readonly" readonly />
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="year_level">Year Level</label>
                                <select id="year_level" name="year_level" class="form-control mb-3">
                                    <option selected>-select-</option>
                                    <option value="1">1st year</option>
                                    <option value="2">2nd year</option>
                                    <option value="3">3rd year</option>
                                    <option value="4">4th year</option>
                                </select>                                
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="section">Section</label>
                                <select id="section" name="section" class="form-control mb-3">
                                    <option selected>-select-</option>
                                    <option value="1">A</option>
                                    <option value="2">B</option>
                                    <option value="3">C</option>
                                    <option value="4">D</option>
                                </select>                                
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-control mb-3">
                                    <option selected>-select-</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>                                
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label for="blood_type">Blood Type</label>
                                <select id="blood_type" name="blood_type" class="form-control mb-3">
                                    <option selected>-select-</option>
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
                        <div class="split mt-2">
                            <div></div>
                            <div>
                                <button class="btn-profile mt-3" type="submit">
                                    Next
                                    &nbsp;<i class="bi bi-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
