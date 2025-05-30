<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function getRoles(){
        $roles = Role::get();

        return response()->json(['roles' => $roles]);
    }  

    public function addRole(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
           
           
           
        ]);

        $role = Specialist::create([
            'name' => $request->name,
            
           

        ]);

        return response()->json(['message' => 'Roles added successfully', 'role' => $role]);
    }

    public function editRole(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            
           
        ]);

        $role = Role::find($id);

        if(!$role){
            return response()->json(['message' => 'Role not found'], 404);
        }

        $role->update([
           'name' => $request->name,
            
        ]);

        return response()->json(['message' => 'Role updated successfully', 'role' => $role ]);
    }   

    public function deleteRole($id){
        $role = Role::find($id);

        if(!$role){            return response()->json(['message' => 'Role not found'], 404);
        }

        $role->delete();

        return response()->json(['message' => 'Role deleted successfully']);
    }
}
