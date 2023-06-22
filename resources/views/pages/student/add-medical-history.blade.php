@extends('includes/student-sidenav')

@section('page-content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Add Medical History</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Medical Record</li>
                <li class="breadcrumb-item">Add Medical Records</li>
                <li class="breadcrumb-item active">Add Medical History</li>
            </ol>
        </nav>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success text-center alert-dismissible fade show" role="alert" id="alertbox">
        {{ Session::get('success') }}
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
                                <form method="POST" action="{{ route('save-medical-history') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6" style="display: none;">
                                            <label for="student_id">Student ID</label>
                                            <input type='text' name='student_id' id="student_id" value="{{ $student[0]['id'] }}" class="form-control mb-3" readonly />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="created_at">Date:</label>
                                            <input type='date' name='created_at' id="created_at" value="" class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="first_name">First Name</label>
                                            <input type='text' name='first_name' id="first_name" value="{{ $student[0]['first_name'] }}" class="form-control mb-3 readonly" readonly />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="last_name">Last Name</label>
                                            <input type='text' name='last_name' id="last_name" value="{{ $student[0]['last_name'] }}" class="form-control mb-3 readonly" readonly />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="middle_name">Middle Name</label>
                                            <input type='text' name='middle_name' id="middle_name" value="{{ $student[0]['middle_name'] }}" class="form-control mb-3 readonly" readonly />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="course">Course</label>
                                            <input type='text' name='course' id="course" value="Bachelor of Science in Nursing" class="form-control mb-3 readonly" readonly />
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
                                            <label for="phone">Phone</label>
                                            <input type='number' name='phone' id="phone" value="{{ $student[0]['phone'] }}" class="form-control mb-3 readonly" readonly />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="age">Age</label>
                                            <input type='number' name='age' id="age" value="" class="form-control mb-3" required />
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <label for="gender">Gender</label>
                                            <select id="gender" name="gender" class="form-control mb-3">
                                                <option selected>-select-</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>

                                        <!--Select conditions checkbox start-->
                                        <fieldset>
                                            <p class="mt-3">Select the conditions that apply to you or any of your close family members:</p>
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="anemia" value="Anemia" />
                                                    <label for="anemia">Anemia</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="asthma" value="Asthma" />
                                                    <label for="asthma">Asthma</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="arthritis" value="Arthritis" />
                                                    <label for="arthritis">Arthritis</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="cancer" value="Cancer" />
                                                    <label for="cancer">Cancer</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="gout" value="Gout" />
                                                    <label for="gout">Gout</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="diabetes" value="Diabetes" />
                                                    <label for="diabetes">Diabetes</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="emotional_disorder" value="Emotional Disorder" />
                                                    <label for="emotional_disorder">Emotional Disorder</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="epilepsy_seizures" value="Epilepsy Seizures" />
                                                    <label for="epilepsy_seizures">Epilepsy Seizures</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="fainting_spells" value="Fainting Spells" />
                                                    <label for="fainting_spells">Fainting Spells</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="gallstones" value="Gallstones" />
                                                    <label for="gallstones">Gallstones</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditionss[]' id="heart_disease" value="Heart Disease" />
                                                    <label for="heart_disease">Heart Disease</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="heart_attack" value="Heart Attack" />
                                                    <label for="heart_attack">Heart Attack</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="rheumatic_fever" value="Rheumatic Fever" />
                                                    <label for="rheumatic_fever">Rheumatic Fever</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditionss[]' id="high_blood_pressure" value="High Blood Pressure" />
                                                    <label for="high_blood_pressure">High Blood Pressure</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="digestive_problems" value="Digestive Problems" />
                                                    <label for="digestive_problems">Digestive Problems</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="ulcerative_colitis" value="Ulcerative Colitis" />
                                                    <label for="ulcerative_colitis">Ulcerative Colitis</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="ulcer_disease" value="Ulcer Disease" />
                                                    <label for="ulcer_disease">Ulcer Disease</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="hepatitis" value="Hepatitis" />
                                                    <label for="hepatitis">Hepatitis</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="kidney_disease" value="Kidney Disease" />
                                                    <label for="kidney_disease">Kidney Disease</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="liver_disease" value="Liver Disease" />
                                                    <label for="liver_disease">Liver Disease</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="sleep_apnea" value="Sleep Apnea" />
                                                    <label for="sleep_apnea">Sleep Apnea</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="use_machine" value="Use a C-PAP Machine" />
                                                    <label for="use_machine">Use a C-PAP Machine</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="thyroid_problems" value="Thyroid Problems" />
                                                    <label for="thyroid_problems">Thyroid Problems</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="tuberculosis" value="Tuberculosis" />
                                                    <label for="tuberculosis">Tuberculosis</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="venereal_disease" value="Venereal Disease" />
                                                    <label for="venereal_disease">Venereal Disease</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="neurological_disorders" value="Neurological Disorders" />
                                                    <label for="neurological_disorders">Neurological Disorders</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="lung_disease" value="Lung Disease" />
                                                    <label for="lung_disease">Lung Disease</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-4">
                                                    <input type='checkbox' name='conditions[]' id="emphysema" value="Emphysema" />
                                                    <label for="emphysema">Emphysema</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-4">
                                                <input type='checkbox' name='conditions[]' id="other1" value="other" />
                                                <label for="other1">Others: <i>Please specify</i></label>
                                                <input type="text" class="form-control" name="other_condition_option">
                                            </div>
                                        </fieldset>
                                        <!--Select conditions checkbox end-->

                                        <!--Select symtoms checkbox start-->
                                        <fieldset>
                                            <p class="mt-3">Select the symptoms that you're currently experiencing:</p>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <input type='checkbox' name='symptoms[]' id="chest_pain" value="Chest pain" />
                                                <label for="chest_pain">Chest pain</label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <input type='checkbox' name='symptoms[]' id="respiratory" value="Respiratory" />
                                                <label for="respiratory">Respiratory</label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <input type='checkbox' name='symptoms[]' id="cardiac_disease" value="Cardiac disease" />
                                                <label for="cardiac_disease">Cardiac disease</label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <input type='checkbox' name='symptoms[]' id="cardiovascular" value="Cardiovascular" />
                                                <label for="cardiovascular">Cardiovascular</label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <input type='checkbox' name='symptoms[]' id="hematological" value="Hematological" />
                                                <label for="hematological">Hematological</label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <input type='checkbox' name='symptoms[]' id="lymphatic" value="Lymphatic" />
                                                <label for="lymphatic">Lymphatic</label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <input type='checkbox' name='symptoms[]' id="neurological" value="Neurological" />
                                                <label for="neurological">Neurological</label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <input type='checkbox' name='symptoms[]' id="psychiatric" value="Psychiatric" />
                                                <label for="psychiatric">Psychiatric</label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <input type='checkbox' name='symptoms[]' id="gastrointestinal" value="Gastrointestinal" />
                                                <label for="gastrointestinal">Gastrointestinal</label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <input type='checkbox' name='symptoms[]' id="genitourinary" value="Genitourinary" />
                                                <label for="genitourinary">Genitourinary</label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <input type='checkbox' name='symptoms[]' id="weight_gain" value="Weight gain" />
                                                <label for="weight_gain">Weight gain</label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <input type='checkbox' name='symptoms[]' id="weight_loss" value="Weight loss" />
                                                <label for="weight_loss">Weight loss</label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <input type='checkbox' name='symptoms[]' id="musculoskeletal" value="Musculoskeletal" />
                                                <label for="musculoskeletal">Musculoskeletal</label>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <input type='checkbox' name='symptoms[]' id="other2" value="other" />
                                                <label for="other2">Others: <i>Please specify</i></label>
                                                <input type="text" class="form-control" name="other_symptoms_option">
                                            </div>
                                            <!--Select symtoms checkbox end-->

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <p class="mt-5">Currently taking any medication?</p>
                                                    <input type="radio" id="medication_yes" name="medication" value="yes">
                                                    <label for="medication_yes">Yes</label><br>

                                                    <input type="radio" id="medication_no" name="medication" value="no">
                                                    <label for="medication_no">No</label><br>
                                                </div>

                                                <div class="col-lg-6">
                                                    <p class="mt-5">Do you have any medication allergies?</p>
                                                    <input type="radio" id="allergies_yes" name="allergies" value="yes">
                                                    <label for="allergies_yes">Yes</label><br>

                                                    <input type="radio" id="allergies_no" name="allergies" value="no">
                                                    <label for="allergies_no">No</label><br>

                                                    <input type="radio" id="allergies_unsure" name="allergies" value="unsure">
                                                    <label for="allergies_unsure">Unsure</label><br>
                                                </div>

                                                <div class="col-lg-6">
                                                    <p class="mt-5">Do you use or do you have history of using tobacco?</p>
                                                    <input type="radio" id="using_tobacco_yes" name="using_tobacco" value="yes">
                                                    <label for="using_tobacco_yes">Yes</label><br>

                                                    <input type="radio" id="using_tobacco_no" name="using_tobacco" value="no">
                                                    <label for="using_tobacco_no">No</label><br>
                                                </div>

                                                <div class="col-lg-6">
                                                    <p class="mt-5">Do you use or do you have history of using illegal drugs?</p>
                                                    <input type="radio" id="using_illegal_drug_yes" name="using_illegal_drug" value="yes">
                                                    <label for="using_illegal_drug_yes">Yes</label><br>

                                                    <input type="radio" id="using_illegal_drug_no" name="using_illegal_drug" value="no">
                                                    <label for="using_illegal_drug_no">No</label><br>
                                                </div>

                                                <div class="col-lg-6">
                                                    <p class="mt-5">How often do you consume alcohol?</p>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <input type='radio' name='consume_alcohol' id="daily" value="Daily" />
                                                        <label for="daily">Daily</label>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <input type='radio' name='consume_alcohol' id="weekly" value="Weekly" />
                                                        <label for="weekly">Weekly</label>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <input type='radio' name='consume_alcohol' id="monthly" value="Monthly" />
                                                        <label for="monthly">Monthly</label>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <input type='radio' name='consume_alcohol' id="occasionally" value="Occasionally" />
                                                        <label for="occasionally">Occasionally</label>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <input type='radio' name='consume_alcohol' id="never" value="Never" />
                                                        <label for="never">Never</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="mt-5 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-outline-primary btn-md">Submit
                                            &nbsp;<i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="col-lg-4">
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
            </div> -->
        </div>
    </section>

</main><!-- End #main -->
@endsection