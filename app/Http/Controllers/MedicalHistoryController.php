<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistoryModel;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{


    public function save_medical_history(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'conditions' => 'nullable|array',
            'symptoms' => 'nullable|array',
            'consume_alcohol' => 'nu
            
            llable|array',
            'other_condition_option' => 'nullable|required_if:conditions.*,other',
            'other_symptoms_option' => 'nullable|required_if:symptoms.*,other',
            'medication' => 'required|in:yes,no',
            'allergies' => 'required|in:yes,no,unsure',
            'using_tobacco' => 'required|in:yes,no',
            'using_illegal_drug' => 'required|in:yes,no'
        ]);

        // Create a new MedicalHistory instance
        $medicalHistory = new MedicalHistoryModel();
        
        // Save the conditions
        if ($request->has('conditions')) {
            $medicalHistory->conditions = $request->input('conditions');
            
            // Remove "other" from conditions array
            $conditions = array_diff(['other']);
            
            // Check if "other" input is provided and add it to conditions
            if ($request->filled('other_condition_option')) {
                $conditionOther = $request->input('other_condition_option');
                $conditions[] = $conditionOther;
            }
            
            $medicalHistory->conditions = $conditions;
        }

        // Save the symptoms
        if ($request->has('symptoms')) {
            $medicalHistory->symptoms = $request->input('symptoms');
            $symptoms = array_diff(['other']);

            if ($request->filled('other_symptoms_option')) {
                $symptomsOther = $request->input('other_symptoms_option');
                $symptoms[] = $symptomsOther;
            }
            $medicalHistory->symptoms = $symptoms;
        }

        // Save the consume_alcohol
        if ($request->has('consume_alcohol')) {
            $medicalHistory->symptoms = $request->input('consume_alcohol');
        }
        
        // Save the medication status
        $medicalHistory->medication = $request->input('medication');
        $medicalHistory->allergies = $request->input('allergies');
        $medicalHistory->using_tobacco = $request->input('using_tobacco');
        $medicalHistory->using_illegal_drug = $request->input('using_illegal_drug');
        
        // Save the medical history record
        $medicalHistory->save();
        
        // Redirect to a success page or perform any other desired actions
        
        return redirect()->back()->with('success', 'Medical history saved successfully.');
    }
    
}
