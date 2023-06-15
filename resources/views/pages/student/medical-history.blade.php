@extends('includes/student-sidenav')

@section('page-content')
        <div id="loader"></div>
        <div id="forLoader" style="display:none;">
            <div class="container mb-5 add-med-rec">
                @if(Session::has('success'))
                    <div class="alert alert-success text-center" role="alert" id="alertbox">
                        {{ Session::get('success') }}
                        <button class="btn-close" onclick="closeFn()"></button>
                    </div>
                @endif
                @if(Session::has('removal'))
                    <div class="alert alert-danger text-center" role="alert" id="alertbox">
                        {{ Session::get('removal') }}
                        <button class="btn-close" onclick="closeFn()"></button>
                    </div>
                @endif
                <div class="container">
                    <p class="page-title">Home / Add Medical History Record</p>
                    <div class="container header rounded shadow-sm mb-4">
                        <div class="header-content">
                            <i class="bi bi-pencil-square"></i> 
                            <span>
                                &nbsp;  Add Medical History Record
                            </span>
                        </div>
                    </div>
                    <div class="container"></div>
                    <div class="container border rounded p-5">
                        <form method="POST" action="{{ route('save-medical-history-record') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6" style="display: none;">
                                    <label for="student_id">Student ID</label>
                                    <input type='text' name='student_id' id="student_id" value="{{ $student[0]['id'] }}" class="form-control mb-3" readonly/>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label for="created_at">Date:</label>
                                    <input type='date' name='created_at' id="created_at" value="" class="form-control mb-3 readonly" required />
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
                                    <p>Select the conditions that apply to you or any of your close family members:</p>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="anemia" value="Anemia" />
                                        <label for="anemia">Anemia</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="asthma" value="Asthma" />
                                        <label for="asthma">Asthma</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="arthritis" value="Arthritis" />
                                        <label for="arthritis">Arthritis</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="cancer" value="Cancer" />
                                        <label for="cancer">Cancer</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="gout" value="Gout" />
                                        <label for="gout">Gout</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="diabetes" value="Diabetes" />
                                        <label for="diabetes">Diabetes</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="emotional_disorder" value="Emotional Disorder" />
                                        <label for="emotional_disorder">Emotional Disorder</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="epilepsy_seizures" value="Epilepsy Seizures" />
                                        <label for="epilepsy_seizures">Epilepsy Seizures</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="fainting_spells" value="Fainting Spells" />
                                        <label for="fainting_spells">Fainting Spells</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="gallstones" value="Gallstones" />
                                        <label for="gallstones">Gallstones</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="heart_disease" value="Heart Disease" />
                                        <label for="heart_disease">Heart Disease</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="heart_attack" value="Heart Attack" />
                                        <label for="heart_attack">Heart Attack</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="rheumatic_fever" value="Rheumatic Fever" />
                                        <label for="rheumatic_fever">Rheumatic Fever</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="high_blood_pressure" value="High Blood Pressure" />
                                        <label for="high_blood_pressure">High Blood Pressure</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="digestive_problems" value="Digestive Problems" />
                                        <label for="digestive_problems">Digestive Problems</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="ulcerative_colitis" value="Ulcerative Colitis" />
                                        <label for="ulcerative_colitis">Ulcerative Colitis</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="ulcer_disease" value="Ulcer Disease" />
                                        <label for="ulcer_disease">Ulcer Disease</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="hepatitis" value="Hepatitis" />
                                        <label for="hepatitis">Hepatitis</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="kidney_disease" value="Kidney Disease" />
                                        <label for="kidney_disease">Kidney Disease</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="liver_disease" value="Liver Disease" />
                                        <label for="liver_disease">Liver Disease</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="sleep_apnea" value="Sleep Apnea" />
                                        <label for="sleep_apnea">Sleep Apnea</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="use_machine" value="Use a C-PAP Machine" />
                                        <label for="use_machine">Use a C-PAP Machine</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="thyroid_problems" value="Thyroid Problems" />
                                        <label for="thyroid_problems">Thyroid Problems</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="tuberculosis" value="Tuberculosis" />
                                        <label for="tuberculosis">Tuberculosis</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="venereal_disease" value="Venereal Disease" />
                                        <label for="venereal_disease">Venereal Disease</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="neurological_disorders" value="Neurological Disorders" />
                                        <label for="neurological_disorders">Neurological Disorders</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="lung_disease" value="Lung Disease" />
                                        <label for="lung_disease">Lung Disease</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="emphysema" value="Emphysema" />
                                        <label for="emphysema">Emphysema</label>

                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='condition_option[]' id="other1" value="Others: Please specify" />
                                        <label for="other1">Others: Please specify</label>
                                        <input type="text" name="other_condition_option">
                                    </div>
                                </fieldset>
                                <!--Select conditions checkbox end-->

                                <!--Select symtoms checkbox start-->
                                <fieldset>
                                    <p>Select the symptoms that you're currently experiencing:</p>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='symptoms_option[]' id="chest_pain" value="Chest pain" />
                                        <label for="chest_pain">Chest pain</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='symptoms_option[]' id="respiratory" value="Respiratory" />
                                        <label for="respiratory">Respiratory</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='symptoms_option[]' id="cardiac_disease" value="Cardiac disease" />
                                        <label for="cardiac_disease">Cardiac disease</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='symptoms_option[]' id="cardiovascular" value="Cardiovascular" />
                                        <label for="cardiovascular">Cardiovascular</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='symptoms_option[]' id="hematological" value="Hematological" />
                                        <label for="hematological">Hematological</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='symptoms_option[]' id="lymphatic" value="Lymphatic" />
                                        <label for="lymphatic">Lymphatic</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='symptoms_option[]' id="neurological" value="Neurological" />
                                        <label for="neurological">Neurological</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='symptoms_option[]' id="psychiatric" value="Psychiatric" />
                                        <label for="psychiatric">Psychiatric</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='symptoms_option[]' id="gastrointestinal" value="Gastrointestinal" />
                                        <label for="gastrointestinal">Gastrointestinal</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='symptoms_option[]' id="genitourinary" value="Genitourinary" />
                                        <label for="genitourinary">Genitourinary</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='symptoms_option[]' id="weight_gain" value="Weight gain" />
                                        <label for="weight_gain">Weight gain</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='symptoms_option[]' id="weight_loss" value="Weight loss" />
                                        <label for="weight_loss">Weight loss</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='symptoms_option[]' id="musculoskeletal" value="Musculoskeletal" />
                                        <label for="musculoskeletal">Musculoskeletal</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='symptoms_option[]' id="other2" value="Others: Please specify" />
                                        <label for="other2">Others: Please specify</label>
                                        <input type="text" name="other_symptoms_option">
                                        
                                    </div>
                                    <!--Select symtoms checkbox end-->

                                    <!--Medication radio button start-->
                                    <p>Currently taking any medication?</p>
                                    <input type="radio" id="yes" name="medication" value="Yes">
                                    <label for="yes">Yes</label><br>

                                    <input type="radio" id="no" name="medication" value="No">
                                    <label for="no">No</label><br>
                                    <!--Medication radio button end-->

                                    <!--Allergies radio button start-->
                                    <p>Do you have any medication allergies?</p>
                                    <input type="radio" id="yes" name="allergies" value="Yes">
                                    <label for="yes">Yes</label><br>

                                    <input type="radio" id="no" name="allergies" value="No">
                                    <label for="no">No</label><br>

                                    <input type="radio" id="unsure" name="allergies" value="Unsure">
                                    <label for="unsure">Unsure</label><br>
                                    <!--Allergies radio button end-->

                                    <!--Using tobacco radio button start-->
                                    <p>Do you use or do you have history of using tobacco?</p>
                                    <input type="radio" id="yes" name="using_tobacco" value="Yes">
                                    <label for="yes">Yes</label><br>

                                    <input type="radio" id="no" name="using_tobacco" value="No">
                                    <label for="no">No</label><br>
                                    <!--Using tobacco radio button end-->

                                    <!--Using illegal drugs radio button start-->
                                    <p>Do you use or do you have history of using illegal drugs?</p>
                                    <input type="radio" id="yes" name="using_illegal_drug" value="Yes">
                                    <label for="yes">Yes</label><br>

                                    <input type="radio" id="no" name="using_illegal_drug" value="No">
                                    <label for="no">No</label><br>
                                    <!--Medication radio button end-->

                                    <!--Consume alcohol checkbox start-->
                                    <p>How often do you consume alcohol?</p>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='consume_alcohol[]' id="daily" value="Daily" />
                                        <label for="daily">Daily</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='consume_alcohol[]' id="weekly" value="Weekly" />
                                        <label for="weekly">Weekly</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='consume_alcohol[]' id="monthly" value="Monthly" />
                                        <label for="monthly">Monthly</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='consume_alcohol[]' id="occasionally" value="Occasionally" />
                                        <label for="occasionally">Occasionally</label>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type='checkbox' name='consume_alcohol[]' id="never" value="Never" />
                                        <label for="never">Never</label>
                                    </div>
                                    <!--Consume alcohol checkbox end-->
                                </fieldset>
      

                            </div>
                            <div class="split mt-4">
                                <div>
                                    <a href="{{ route('student-dashboard') }}" class="btn-profile" title="BACK">
                                        <i class="bi bi-arrow-left"></i>
                                        &nbsp; Back
                                    </a>
                                </div>
                                <div>
                                    <a href="#!" class="btn-profile" data-bs-toggle="modal" data-bs-target="#doyouModal">
                                        Next

                                        &nbsp;<i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Modal-->
                            <div class="modal fade" id="doyouModal">
                                <div class="modal-dialog modal-md">
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
                                                <div class="modal-split">
                                                    <div class="">
                                                        <a href="#!" class="btn mb-2">
                                                            Yes
                                                        </a>
                                                    </div>
                                                    <div class="">
                                                        <button type="submit" class="btn mb-2">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- End of modal body-->
                                    </div> <!-- End of modal content-->
                                </div>
                            </div> <!-- End of Modal-->
                        </form>
                    </div>
                    
                </div>
            </div>

            

        </div>
@endsection
