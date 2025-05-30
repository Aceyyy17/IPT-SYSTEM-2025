<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnose;

class DiagnoseController extends Controller
{
     public function getDiagnosis(){
        $diagnosis = Diagnose::get();
        return response()->json(['diagnosis' => $diagnosis]);
    }  

    public function addDiagnose(Request $request){
        $request->validate([
           'name' => ['required', 'string', 'max:255'],
           
        ]);

        $diagnose = Diagnose::create([
            'name' => $request->name,

        ]);

        return response()->json(['message' => 'Diagnose added successfully', 'diagnose' => $diagnose]);
    }

    public function editDiagnose(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            
           
        ]);

        $diagnose = Diagnose::find($id);

        if(!$diagnose){
            return response()->json(['message' => 'Diagnose not found'], 404);
        }

        $diagnose->update([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Diagnose updated successfully', 'diagnose' => $diagnose ]);
    }   

    public function deleteDiagnose($id){
        $diagnose = Diagnose::find($id);

        if(!$diagnose){            return response()->json(['message' => 'Diagnose not found'], 404);
        }

        $diagnose->delete();

        return response()->json(['message' => 'Diagnose deleted successfully']);
    }
}
