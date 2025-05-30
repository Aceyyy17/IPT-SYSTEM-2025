<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserStatus;

class StatusController extends Controller
{
     public function getUserStatuses(){
        $userstatuses = Role::get();

        return response()->json(['userstatuses' => $userstatuses]);
    }  

    public function addUserStatus(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
           
           
           
        ]);

        $userstatus = Userstatus::create([
            'name' => $request->name,
            
           

        ]);

        return response()->json(['message' => 'UserStatus added successfully', 'userstatus' => $userstatus]);
    }

    public function editUserStatus(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            
           
        ]);

        $userstatus = Userstatus::find($id);

        if(!$userstatus){
            return response()->json(['message' => 'UserStatus not found'], 404);
        }

        $userstatus->update([
           'name' => $request->name,
            
        ]);

        return response()->json(['message' => 'UserStatus updated successfully', 'userstatus' => $userstatus ]);
    }   

    public function deleteUserStatus($id){
        $userstatus = Userstatus::find($id);

        if(!$userstatus){            return response()->json(['message' => 'UserStatus not found'], 404);
        }

        $userstatus->delete();

        return response()->json(['message' => 'UserStatus deleted successfully']);
    }
}
