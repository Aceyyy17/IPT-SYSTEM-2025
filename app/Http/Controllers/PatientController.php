<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function getPatients(){
        $patients = patient::with('diagnose', 'specialist')->get();

        return response()->json(['patients' => $patients]);
    }  

    public function addPatient(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'diagnose_id' => ['required', 'exists:diagnoses,id'],
            'specialist_id' => ['required', 'exists:specialists,id'],
           
        ]);

        $patient = patient::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'gender' => $request ->gender,
            'diagnose_id' => $request->diagnose_id,
            'specialist_id' => $request->specialist_id,

        ]);

        return response()->json(['message' => 'Patient added successfully', 'patient' => $patient]);
    }

    public function editPatient(Request $request, $id){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'diagnose_id' => ['required', 'exists:diagnoses,id'],
            'specialist_id' => ['required', 'exists:specialists,id'],
           
        ]);

        $patient = Patient::find($id);

        if(!$patient){
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $patient->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,    
            'age' => $request->age,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'diagnose_id' => $request->diagnose_id,
            'specialist_id' => $request->specialist_id,
        ]);

        return response()->json(['message' => 'Patient updated successfully', 'patient' => $patient ]);
    }   

    public function deletePatient($id){
        $patient = Patient::find($id);

        if(!$patient){            return response()->json(['message' => 'Patient not found'], 404);
        }

        $patient->delete();

        return response()->json(['message' => 'Patient deleted successfully']);
    }
}
