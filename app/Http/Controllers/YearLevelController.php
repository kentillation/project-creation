<?php

namespace App\Http\Controllers;

use App\Models\YearLevelModel;
use Illuminate\Http\Request;

class YearLevelController extends Controller
{
    //Create year level function
    public function create_year_level() {
        return view('info/year-level/year-level-list');
    }

    //Year level list function
    public function year_level_list() {
        $year_level = YearLevelModel::all();
        return view('info/year-level/year-level-list', ['tbl_year_level' => $year_level]);
    }

    //Save year level function
    public function save_year_level(Request $request) {
        $year_level = new YearLevelModel;
        $year_level->year_level = $request->input('year_level');
        $year_level->save();

        return redirect(route('year-level-list'))->with('success', 'Year level added successfully!');
    }

    //Update year level function
    public function update_year_levek(Request $request, $id) {
        $year_level = YearLevelModel::find($id);
        $response = [
            'tble_year_level' => $year_level
        ];

        return view('info/year-level/update-year-level', $response);
    }

    //Save update year level function
    public function saveUpdate_year_level(Request $request, $id) {
        $update_year_level =  YearLevelModel::findorfail($id);
        $data = [
            'year_level' => $request->input('year_level')
        ];
        $update_year_level->update($data);

        return redirect(route('year-level-list'))->with('success', 'Year level updated successfully!');
    }

    //Delete year level function
    public function delete_year_level(Request $request, $id) {
        try{
            $year_level = YearLevelModel::find($id);
            $year_level->delete();
            return redirect(route('year-level-list'))->with('success', 'Year level deleted successfully!');
        }
        catch (\Exception $e) {
            return redirect(route('year-level-list'))->with('error', 'Failed to delete year level!');
        }
    }
}
