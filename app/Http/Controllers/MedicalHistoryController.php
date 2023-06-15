<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistoryModel;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{


    public function save_medical_history(Request $request)
    {
        $medical_history = new MedicalHistoryModel;
        $medical_history->first_name = $request->first_name;
        $medical_history->last_name = $request->last_name;
        $medical_history->middle_name = $request->middle_name;
        $medical_history->year_level_id = $request->year_level;
        $medical_history->phone = $request->phone;
        $medical_history->age = $request->age;
        $medical_history->gender_id = $request->gender;
        $medical_history->condition_option = json_encode($request->conditions);
        $medical_history->symptoms_option = json_encode($request->symptoms);
        $medical_history->consume_alcohol = json_encode($request->consume_alcohol);
        $medical_history->medication = $request->medication;
        $medical_history->allergies = $request->allergies;
        $medical_history->using_tobacco = $request->using_tobacco;
        $medical_history->using_illegal_drug = $request->using_illegal_drug;
        $medical_history->other_condition_option = $request->other_condition_option;
        $medical_history->other_symptoms_option = $request->other_symptoms_option;
        $medical_history->save();
        return redirect()->back()->with('success', 'Medical history saved successfully.');
    }
    
}
