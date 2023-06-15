<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistoryModel;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    public function save_medical_history(Request $request) {

        $medical_history_record = new MedicalHistoryModel;
        $medical_history_record = $request->input('condition_option', []); // Retrieve the checked condition options as an array
        $medical_history_record = $request->input('other_condition_option'); // Retrieve the value of the "Other" condition  option
        $medical_history_record = $request->input('symptoms_option', []); // Retrieve the checked symptoms options as an array
        $medical_history_record = $request->input('other_symptoms_option'); // Retrieve the value of the "Other" symptoms option
        $medical_history_record = $request->input('consume_alcohol', []); // Retrieve the checked symptoms options as an array
        $medical_history_record = $request->input('medication'); //Store the selected option in the 'medical history' table
        $medical_history_record = $request->input('allergies'); //Store the selected option in the 'medical history' table
        $medical_history_record = $request->input('using_tobacco'); //Store the selected option in the 'medical history' table
        $medical_history_record = $request->input('using_illegal_drug'); //Store the selected option in the 'medical history' table
        $medical_history_record->save();

    // Perform any necessary operations with the selected option

    // Store the selected option in the 'selected_radio_data' table
    //     MedicalHistoryModel::create([
    //      'selected_option' => $selectedOption,
    // ]);


    // Perform any necessary operations with the checked data
    // For example, you can iterate through the checked options:
    // foreach ($checkedOptions as $option) {
    //     // Perform any desired logic with $option
    // }

    // // If the "Other" option is selected, handle its value separately
    // if (in_array('other', $checkedOptions) && $otherOption) {
    //     // Perform logic specific to the "Other" option and its value
    // }

    // // You can also pass the checked options and other option value to a view for display or further processing
    // return view('result')
    //     ->with('checkedOptions', $checkedOptions)
    //     ->with('otherOption', $otherOption);
    }
}
