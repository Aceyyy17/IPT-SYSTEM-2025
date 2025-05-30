<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialist;

class SpecialistController extends Controller
{
    public function getSpecialists(){
        $specialists = specialist::get();

        return response()->json(['specialists' => $specialists]);
    }  

    public function addSpecialist(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'specialization' => ['required', 'string', 'max:255'],
           
           
        ]);

        $specialist = Specialist::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'specialization' => $request->specialization,
           

        ]);

        return response()->json(['message' => 'Specialist added successfully', 'specialist' => $specialist]);
    }

    public function editSpecialist(Request $request, $id){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'specialization' => ['required', 'string', 'max:255'],
           
        ]);

        $specialist = Specialist::find($id);

        if(!$specialist){
            return response()->json(['message' => 'Specialist not found'], 404);
        }

        $patient->update([
           'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'specialization' => $request->specialization,
        ]);

        return response()->json(['message' => 'Specialist updated successfully', 'specialist' => $specialist ]);
    }   

    public function deleteSpecialist($id){
        $specialist = Specialist::find($id);

        if(!$specialist){            return response()->json(['message' => 'specialist not found'], 404);
        }

        $specialist->delete();

        return response()->json(['message' => 'specialist deleted successfully']);
    }
}
